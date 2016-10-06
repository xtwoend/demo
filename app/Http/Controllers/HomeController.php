<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * [activeUser description]
     * @return [type] [description]
     */
    public function activeUser()
    {   
        $row = \Auth::user();
        $user = [
            'uniqid'    => $row->id,
            'username'  => $row->username,
            'email'     => $row->email,
            'fullname'  => $row->name,
        ];

        $buildResponse = (new \App\Connection(config('kuis88.client_id'), config('kuis88.client_secret')))->getUser($user);

        return response()->json($buildResponse, 200)->withCallback($request->input('callback'));
    }
}
