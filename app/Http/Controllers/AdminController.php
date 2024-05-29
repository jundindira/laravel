<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = admin::orderBy('id', 'asc')->paginate(5);
        return view('admin/index')->with('data',  $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'foto' => 'mimes:jpeg, jpg, png, gif'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'foto.mimes' => 'Foto yang diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF'
        ]);
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $hashedPassword = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'foto' => $foto_nama
        ];
        admin::create($data);
        
        $adminName = $request->input('nama'); // Ambil nama admin yang ditambah
        return redirect('admin')->with('success', 'Admin ' . $adminName . ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = admin::where('id', $id)->first();
        return view('admin/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = admin::where('id', $id)->first();
        return view('admin.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = admin::find($id);

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
        $hashedPassword = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $data = [
            'email' => $request->input('email'),
            'password' => $hashedPassword,
        ];
        if($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg, jpg, png, gif'
            ], [
                'foto.mimes' => 'Foto yang diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama); // foto sudah terupload ke direktori

            $data_foto = admin::where('id', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);

            $data = [
                'foto' => $foto_nama
            ];
        }
        admin::where('id', $id)->update($data);

        $adminName = $admin->nama; // Ambil nama admin yang diupdate
        return redirect('/admin')->with('success', 'Berhasil melakukan update admin ' . $adminName);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = admin::find($id);

        $data = admin::where('id', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        admin::where('id', $id)->delete();

        $adminName = $admin->nama; // Ambil nama admin yang dihapus
        return redirect('/admin')->with('success', 'Admin ' . $adminName . ' berhasil dihapus');
    }
}
