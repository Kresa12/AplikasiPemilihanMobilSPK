<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Menampilkan halaman landing page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fungsi ini hanya bertugas untuk menampilkan view 'landing.blade.php'
        return view('landing');
    }
}