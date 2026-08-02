<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $kamars = Kamar::where('nama', 'like', "%{$search}%")->get();
        } else {
            $kamars = Kamar::all();
        }
        return view('public.index', compact('kamars'));
    }

    // ===== TAMBAHKAN METHOD INI UNTUK DETAIL KAMAR =====
    public function detailKamar($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('public.detail', compact('kamar'));
    }
    // ===== END METHOD DETAIL KAMAR =====
}