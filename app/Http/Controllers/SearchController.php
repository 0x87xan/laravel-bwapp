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

        $films = User::where('username', '=' , $request['query'])->get();
        return view('search', ['data' => $films]);

    }
}
