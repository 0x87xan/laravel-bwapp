<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Films;


class SearchController extends Controller
{
    public function index()
    {

        return view('search');

    }

    public function search(SearchRequest $request)
    {

        $films = Films::where('name', 'LIKE', '%' . $request['query'] . '%')->get();
        return view('search', ['data' => $films]);

    }
}
