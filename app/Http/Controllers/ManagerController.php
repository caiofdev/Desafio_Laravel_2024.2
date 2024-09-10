<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Admin;
use App\Models\Address;
use App\Models\Account;
use Hash;


class ManagerController extends Controller
{
    public function index(){

        $managers = Manager::all();
        $managers = Manager::paginate(5);
        
        return view('manager.manager', compact('managers'));
    }

    public function dashboard(){

        $user = Auth::guard('manager')->user();

        return view('manager.dashboard', compact('user'));
    }

    public function create(){

        return view('manager.manager-create');
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

        Manager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'photo' => $path,

            'address_id' => $address->id,
            'admin_id' => Auth::guard('admin')->user()->id,
            'account_id' => $account->id,
        ]);

        return redirect()->route('admin.manager');
    }

    public function view(int $id){

        $manager = Manager::where('id', $id)->first();
        
        return view('manager.manager-view', compact('manager'));
    }

    public function edit(int $id){

        $manager = Manager::where('id', $id)->first();

        return view('manager.manager-update', compact('manager'));
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
            $path = $manager->photo;

        $manager = Manager::where('id', $id)->first();
        if(!$manager) {
            return redirect()->back()->withErrors('Manager not found.');
        }

        $address = Address::find($manager->address_id);
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

        $manager->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $manager->password,
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'photo' => $path,
        ]);    

        return redirect()->route('admin.manager');
    }

    public function destroy(int $id){

        $manager = Manager::where('id', $id)->first();
    
        $address = $manager->address()->first();

        $account = $manager->account()->first();
    
        $manager->users()->get()->each(function ($storeUsers){
            $storeUsers->manager_id = chooseNewManager($storeUsers->manager_id);
            $storeUsers->save();
        });
    
        $manager->delete();
        $address->delete();
        $account->delete();
    
        return redirect()->back();
    }
}
