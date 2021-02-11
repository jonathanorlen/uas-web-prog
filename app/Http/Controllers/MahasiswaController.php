<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    
    public function index($page = 0)
    {   
        return Mahasiswa::select('name','nim','email')
                        ->skip(($page-1)*3)
                        ->take(3)
                        ->get();
    }

    public function total()
    {
        return ['total_mahasiswa' => Mahasiswa::count()];
    }

    public function show(Mahasiswa $Mahasiswa)
    {
        return $Mahasiswa;
    }
}
