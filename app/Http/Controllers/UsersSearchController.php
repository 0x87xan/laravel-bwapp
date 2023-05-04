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
        if ($user) {
            return view('users', ['data' => $user]);
        }
        return redirect()->back()->with('failure', "User with this email doesn't exist");
    }
}
