<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Films;
use App\Models\User;


class SearchController extends Controller
{
    public function index()
    {

        return view('search');

    }

    public function search(SearchRequest $request)
    {

        $username = $request['query'];
        $films = User::where('username', 'LIKE' , "%{$username}%")->get();
        return view('search', ['data' => $films]);

    }
}
