<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data['title'] = 'Users';

        $users = new User;
        $users = $users->get();

        $data['users'] = $users;
        return view('pages.user.show',$data);
    }

    public function add(){
        $data['title'] = 'Add Users';
        return view('pages.user.add',$data);
    }

    public function add_form(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ]);

        $user = new User([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'bio' => $request->bio,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('user')->with('success', 'User has been registered.');
    }

    public function edit($id){
        $data['title'] = 'Users Edit';
        $users = new User;
        $users = $users->where('id',$id);
        $users = $users->get()->first();
        $data['user'] = $users;
        return view('pages.user.edit',$data);
    }

    public function edit_form(Request $request){
        $request->validate([
            'id'=>'required',
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = new User;
        $user = $user->where('id',$request->id)->first();
        $user->username = $request->username;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->address  = $request->address;
        $user->bio      = $request->bio;

        if(!empty($request->password)){
            $request->validate([
                'repassword' => 'required|same:password',
            ]);
            $user->password  = Hash::make($request->password);
        }

        $user->update();

        return redirect()->route('user')->with('success', 'User has been updated.');
    }

    public function delete($id){
        $user = new User;
        $user = $user->where('id',$id)->first()->delete();
        return redirect()->route('user')->with('success', 'User has been deleted.');
    }
}
