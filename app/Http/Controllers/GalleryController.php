<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        return view('gallery');
    }

   
}