<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    
    public function index($page = 0)
    {   
        $mahasiswa = Mahasiswa::select('name','nim','email')
                    ->skip(($page-1)*3)
                    ->take(3)
                    ->get();

        return response(['Mahasiswa' => $mahasiswa], 200);
    }

    public function total()
    {
        return response(['total_mahasiswa' => Mahasiswa::count()], 200);
    }

    public function show(Mahasiswa $Mahasiswa)
    {
        return response(['detail_mahasiswa' => $Mahasiswa]);
    }
}
