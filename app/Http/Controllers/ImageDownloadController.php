<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageDownloadController extends Controller
{
    public function index()
    {
        return view('image-download');
    }

    public function downloadImage(Request $request)
    {
        $filename = basename($request->input('file_name'));
        if (Storage::exists('public/images/' . $filename)){
            return response()->download(storage_path('app\\public\\images\\') . $filename);
        }
        return redirect()->back()->with('error', "File doesn't exists");

    }
}
