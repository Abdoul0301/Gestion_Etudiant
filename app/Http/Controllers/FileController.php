<?php

namespace App\Http\Controllers;

use App\Imports\EtudiantImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    public function showForm()
    {
        return view('import');
    }
    public function import()
    {
        Excel::import(new EtudiantImport(),request()->file('file'));

        return redirect('etudiant');
    }
}
