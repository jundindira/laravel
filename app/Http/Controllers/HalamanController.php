<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index() {
        return view("halaman.index");
    }
    function tentang() {
        return view("halaman.tentang");
    }
    function kontak() {
        // $judul = 'This is Halaman Kontak';
        // return view("halaman/kontak")->with('halaman_judul', $judul);

        $data = [
            'judul' => 'Ini adalah Halaman Kontak',
            'kontak' => [
                'no_telp' => '082135396569',
                'email' => 'jundiahindirasch@gmail.com'
                ]
            ];
        return view("halaman/kontak")->with($data);
    }
}
