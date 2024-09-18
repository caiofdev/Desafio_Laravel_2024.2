<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Address;
use Hash;

class AdminController extends Controller
{
    public function index(){

        $admins = Admin::all();
        $admins = Admin::paginate(5);

        return view('admin.admin', compact('admins'));
    }

    public function create(){
        
        return view('admin.admin-create');
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

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'photo' => $path,

            'address_id' => $address->id,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.admin');
    }

    public function view(int $id){

        $admin = Admin::where('id', $id)->first();
        
        return view('admin.admin-view', compact('admin'));
    }

    public function edit(int $id){

        $admin = Admin::where('id', $id)->first();

        return view('admin.admin-update', compact('admin'));
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
            $path = $admin->photo;

        $admin = Admin::where('id', $id)->first();

        if(!$admin) {
            return redirect()->back()->withErrors('Admin not found.');
        }

        $address = Address::find($admin->address_id);
        
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

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'photo' => $path,
        ]);    

        return redirect()->route('admin.admin');
    }

    public function destroy(int $id){
        
        $admin = Admin::where('id', $id)->first();

        $address = $admin->address()->first();

        $admin->admins()->get()->each(function ($storeAdmin){
            $storeAdmin->admin_id = chooseNewAdmin($storeAdmin->admin_id);
            $storeAdmin->save();
        });

        $admin->managers()->get()->each(function ($storeManager){
            $storeManager->admin_id = chooseNewAdmin($storeManager->admin_id);
            $storeManager->save();
        });

        $admin->delete();
        $address->delete();

        return redirect()->back();
    }
}