<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classe = Classe::paginate(10);
        return view('classe',['cc'=>$classe]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cc = new classe();
        return view('addclasse',['cc'=>$cc]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required'
        ]);



        $cc = new classe();
        $cc-> libelle =$request["libelle"];
        $cc-> save();

        return to_route('classe.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cc = new classe();
        return view('addclasse',['cc'=>$cc->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle' => 'required'
        ]);


        $cc = Classe::find($id);
        $cc-> libelle =$request["libelle"];
        $cc-> save();


        return to_route('classe.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classe::destroy($id);
        return to_route('classe.index');
    }
}
