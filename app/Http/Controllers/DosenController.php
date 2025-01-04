<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    
    public function index()
    {
        // Data jadwal bimbingan
        return view('admin.contents.dosen.dashboard');
    }

    
}
