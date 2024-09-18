<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Account;
use Hash;

class UserController extends Controller
{

    public function index(){
        
        $users = User::all();
        $users = User::paginate(5);

        return view('user', compact('users'));
    }

    public function dashboard(){

        $user = Auth::guard('web')->user();

        return view('dashboard', compact('user'));
    }

    public function create(){

        return view('user-create');
    }

    public function store(Request $request){

        $path = "storage/" . $request->file('photo')->store('images', 'public');

        $address = Address::create([
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'building_number' => $request->building_number,
            'postcode' => $request->postcode,
        ]);

        $account = Account::create([
            'agency_number' => "0001",
            'account_number' => generateUnicAccountNumber(),
            'account_balance' => 0,
            'transfer_limit' => generateTransferLimit(),
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'photo' => "photo.jpeg",

            'address_id' => $address->id,
            'manager_id' => Auth::guard('manager')->user()->id,
            'account_id' => $account->id,
        ]);

        return redirect()->route('manager.user');
    }

    public function view(int $id){

        $user = User::where('id', $id)->first();

        return view('user-view', compact('user'));
    }

    public function edit(int $id){

        $user = User::where('id', $id)->first();

        return view('user-update', compact('user'));
    }

    public function update(Request $request, int $id){

        $request->validate([
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'building_number' => 'required|string',
            'postcode' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string',
            'cpf' => 'required|string',
            'birth_date' => 'required|date',
            'phone' => 'required|string',
        ]);

        if($request->file('photo'))
            $path = "storage/" . $request->file('photo')->store('images', 'public');
        else
            $path = $user->photo;

        $user = User::where('id', $id)->first();
        
        if(!$user) {
            return redirect()->back()->withErrors('User not found.');
        }

        $address = Address::find($user->address_id);

        if(!$address) {
            return redirect()->back()->withErrors('Address not found.');
        }

        $address->update([
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'building_number' => $request->building_number,
            'postcode' => $request->postcode,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'photo' => "photo.jpeg",
        ]);    

        return redirect()->route('manager.user');
    }

    public function destroy (int $id){
        
        $user = User::where('id', $id)->first();

        $address = $user->address()->first();
        $account = $user->account()->first();
    
        $user->delete();
        $address->delete();
        $account->delete();
    
        return redirect()->back();
    }
}
