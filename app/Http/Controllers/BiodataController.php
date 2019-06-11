<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    //
    public function index()
    {
        $biodata = \App\Biodata::all();
        $data = [
            'biodata' => $biodata
        ];
        return view('admin/biodata/index')->with($data);
    }
}
