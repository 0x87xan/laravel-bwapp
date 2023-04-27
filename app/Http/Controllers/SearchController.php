<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Films;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function index()
    {

        return view('search');

    }

    public function search(SearchRequest $request)
    {

        $input = $request['query'];
        $query = "SELECT * FROM films WHERE name = '$input'";
        $films = DB::select($query);
        return view('search', ['data' => $films]);

    }
}
