<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_token(Request $request)
    {
        $token = $request->session()->token();
        return response()->json($token);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $kode = 200;
        $result = [];

        $login = Auth::Attempt($request->all());

        if ($login) {

            $user = Auth::user();
            $user->save();

            $users = new User;
            $users = $users->where('email',$request->username);
            $users = $users->select('name','email','phone','address');
            $users = $users->get();
            $users = $users->first();
            $result['data'] = $users;

        }else{
            $kode = 404;
        }

        return response()->json($result,$kode);
    }

}
