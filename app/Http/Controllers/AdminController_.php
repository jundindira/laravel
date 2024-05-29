<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        // $data = admin::all();
        $data = admin::orderBy('id', 'asc')->paginate(1);
        return view('admin/index')->with('data',  $data);
    }

    function detail($id) {
        // return "<h1>Saya admin dari Controller dengan id $id</h1>";
        $data = admin::where('id', $id)->first();
        return view('admin/show')->with('data', $data);
    }
}
