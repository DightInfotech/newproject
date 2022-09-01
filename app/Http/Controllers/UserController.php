<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(15);
        $roles = Role::all();
        return view('backend.users.index', compact('users', 'roles'));
    }

    public function create(){
        $roles = Role::all();
        return view('backend.users.create', compact('roles'));
    }
    
    public function store(Request $request){
        $this->validator($request->all())->validate();
        if( $request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageName = time().'_'.$imageName;

            $path = Storage::disk('public')->putFileAs(
                'avatar', $request->file('image'), $imageName
            );
        }else{
            $imageName = null;
        }
        $user = User::create([
           'first_name' => $request->first_name,
           'last_name'  => $request->last_name,
           'user_name'  => $request->user_name,
           'email'      => $request->email,
           'password'   => $request->password,
           'telephone'  => $request->phone,
            'status'    => 'active',
            'avatar'    => $imageName
        ]);
        //add role
        $user->roles()->attach($request->role);
        return redirect()->route('users.index')->with('success', 'User has been added successfully.');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        if( $request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageName = time().'_'.$imageName;

            $path = Storage::disk('public')->putFileAs(
                'avatar', $request->file('image'), $imageName
            );
        }else{
            $imageName = $user->avatar;
        }
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'telephone' => $request->phone,
            'status' => 'active',
            'avatar' => $imageName
        ]);
        $user->roles()->sync($request->role);
        return redirect()->back()->with('success', 'User has been updated successfully.');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        $user->roles()->delete();
        return redirect()->route('users.index')->with('success', 'User and their role has been deleted successfully.');
    }

    public function validator(array $data){
        return Validator::make($data, [
           'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','string','min:6','confirmed'],
            'role' => ['required','integer'],
            'phone' => ['required'],
            'avatar' => ['mimes:png,jpg,jpeg,gif']
        ],[
            'phone.required' => 'You are missing a phone number.',
        ]);
    }
}
