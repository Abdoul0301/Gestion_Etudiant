<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $note = Note::paginate(10);
        return view('note',['pp'=>$note]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pp = new note();
        return view('addnote',['pp'=>$pp,'uu'=>Etudiant::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'math' => 'required',
            'algo' => 'required',
            'droit' => 'required'
        ]);



        $pp = new note();
        $pp-> etudiant_id = $request["etudiant_id"];
        $pp-> math = $request["math"];
        $pp-> algo = $request["algo"];
        $pp-> droit = $request["droit"];
        $pp-> save();

        return to_route('note.index');
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
        $pp = new note();
        return view('addnote',['pp'=>$pp->find($id),'uu'=>Etudiant::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'math' => 'required',
            'algo' => 'required',
            'droit' => 'required'

        ]);


        $pp = Note::find($id);
        $pp-> etudiant_id = $request["etudiant_id"];
        $pp-> math = $request["math"];
        $pp-> algo = $request["algo"];
        $pp-> droit = $request["droit"];
        $pp-> save();


        return to_route('note.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::destroy($id);
        return to_route('note.index');
    }
}
