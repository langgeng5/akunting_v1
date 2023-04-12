<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\View\View;

class JurnalController extends Controller
{
    public function index()
    {
        $data_jurnal = Jurnal::all();
        return view('jurnal.index', ['data_jurnal' => $data_jurnal]);
    }
}
