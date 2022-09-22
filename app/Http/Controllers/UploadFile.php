<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class UploadFile extends Controller
{
    public function index()
    {
        return view('upload.save');
    }

    public function save(Request $request)
    {
        
    }
}
