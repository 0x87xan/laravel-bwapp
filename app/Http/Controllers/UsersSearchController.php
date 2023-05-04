<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersSearchRequest;

class UsersSearchController extends Controller
{
    public function index()
    {
        return view('users');
    }

    public function search(UsersSearchRequest $request)
    {
        $xml = simplexml_load_file(database_path('users.xml'));
        $user = $xml->xpath("//user[email='{$request->email}']");
        return view('users', ['data' => $user]);
    }
}
