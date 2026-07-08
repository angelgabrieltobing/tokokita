<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
      public function index() 
     { 
         return "Ini adalah halaman Daftar Semua Mahasiswa 
(dari Controller)."; 
     }
  public function show($nim) 
     { 
         return "Ini adalah halaman Profil Mahasiswa dengan 
    NIM: " . $nim; 
     } 
 public function data() 
     { 
         $data = [ 
             'nama' => 'Budi Santoso', 
             'nim' => '10293847', 
             'jurusan' => 'Teknik Informatika' 
         ]; 
         return response()->json($data); 
     } 
} 

