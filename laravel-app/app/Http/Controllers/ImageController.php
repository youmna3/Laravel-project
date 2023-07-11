<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;


class ImageController extends Controller
{
    //
    public function show($filename)
    {
        return Storage::download('images/' . $filename);
    }
}