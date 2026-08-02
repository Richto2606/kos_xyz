<?php

namespace App\Http\Controllers;

use App\Models\Kamar;

class PublicController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('public.index', compact('kamars'));
    }
}