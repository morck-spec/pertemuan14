<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function tentangSaya()
    {
        return view('tentang-saya');
    }

    public function hubungiSaya()
    {
        return view('hubungi-saya');
 
        }
        public function hobiSaya()
{
    return view('hobi-saya');
}
}
