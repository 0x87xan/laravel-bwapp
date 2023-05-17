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
        $file_path = storage_path("app\\public\\images\\").$request->input('file_name');
        return response()->download($file_path);
    }
}
