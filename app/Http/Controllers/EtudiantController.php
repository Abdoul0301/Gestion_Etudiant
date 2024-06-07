<?php

namespace App\Http\Controllers;

use App\Imports\EtudiantImport;
use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\EtudiantExport;
use App\Models\User;
use App\Notifications\SendEmailEtudiantRegistrationNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*User::create([
            'name' => 'abdoul',
            'email' => 'abdoul@gmail.com',
            'password' => Hash::make('1234')
        ]);*/

        try {
            $etudiants = Etudiant::paginate(10);
            //if (request()->wantsJson()) {
                return response()->json([
                    "status" => 200,
                    "message" => "Liste des étudiants",
                    "etudiants" => $etudiants
                ]);
           // }

           // return view('etudiant', ['uu' => $etudiants]);
        } catch (Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 500,
                    "message" => $e->getMessage()
                ]);
            }
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uu = new Etudiant();
        $classes = Classe::all();

        //if (request()->wantsJson()) {
            return response()->json([
                "status" => 200,
                "message" => "Formulaire de création d'étudiant",
                "etudiant" => $uu,
                "classes" => $classes
            ]);
        //}

        //return view('addetudiant', ['uu' => $uu, 'cc' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);

            $etudiant = new Etudiant();
            $etudiant->nom = $request["nom"];
            $etudiant->prenom = $request["prenom"];
            $etudiant->age = $request["age"];
            $etudiant->email = $request["email"];
            $etudiant->classe_id = $request["classe_id"];
            $etudiant->image = $fileName;
            $etudiant->save();

            if ($etudiant) {
                $etudiant->notify(new SendEmailEtudiantRegistrationNotification());
            }

            //if (request()->wantsJson()) {
                return response()->json([
                    "status" => 200,
                    "message" => "Étudiant créé avec succès!",
                    "etudiant" => $etudiant
                ]);
           // }

           // return to_route('etudiant.index');
        } catch (Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 500,
                    "message" => $e->getMessage()
                ]);
            }
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $etudiant = Etudiant::find($id);
            //if (!$etudiant) {
                //if (request()->wantsJson()) {
                    return response()->json([
                        "status" => 404,
                        "message" => "Étudiant non trouvé"
                    ]);
               // }
                //return back()->withErrors(['message' => 'Étudiant non trouvé']);
           // }

          //  if (request()->wantsJson()) {
                return response()->json([
                    "status" => 200,
                    "message" => "Détails de l'étudiant",
                    "etudiant" => $etudiant
                ]);
          //  }

           // return view('detail', compact('etudiant'));
        } catch (Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 500,
                    "message" => $e->getMessage()
                ]);
            }
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $etudiant = Etudiant::find($id);
            //if (!$etudiant) {
               // if (request()->wantsJson()) {
                    return response()->json([
                        "status" => 404,
                        "message" => "Étudiant non trouvé"
                    ]);
               // }
                //return back()->withErrors(['message' => 'Étudiant non trouvé']);
            //}

            $classes = Classe::all();

            //if (request()->wantsJson()) {
                return response()->json([
                    "status" => 200,
                    "message" => "Formulaire de modification d'étudiant",
                    "etudiant" => $etudiant,
                    "classes" => $classes
                ]);
           // }

           // return view('addetudiant', ['uu' => $etudiant, 'cc' => $classes]);
        } catch (Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 500,
                    "message" => $e->getMessage()
                ]);
            }
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required'
            ]);

            $etudiant = Etudiant::find($id);
           // if (!$etudiant) {
                if (request()->wantsJson()) {
                    return response()->json([
                        "status" => 404,
                        "message" => "Étudiant non trouvé"
                    ]);
                }
              //  return back()->withErrors(['message' => 'Étudiant non trouvé']);
           // }

            $etudiant->nom = $request["nom"];
            $etudiant->prenom = $request["prenom"];
            $etudiant->age = $request["age"];
            $etudiant->email = $request["email"];
            $etudiant->classe_id = $request["classe_id"];
            $etudiant->save();

           // if (request()->wantsJson()) {
                return response()->json([
                    "status" => 200,
                    "message" => "Étudiant mis à jour avec succès!",
                    "etudiant" => $etudiant
                ]);
           // }

            //return to_route('etudiant.index');
        } catch (Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 500,
                    "message" => $e->getMessage()
                ]);
            }
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $etudiant = Etudiant::find($id);
           // if (!$etudiant) {
               // if (request()->wantsJson()) {
                    return response()->json([
                        "status" => 404,
                        "message" => "Étudiant non trouvé"
                    ]);
               // }
               // return back()->withErrors(['message' => 'Étudiant non trouvé']);
           // }

            $etudiant->delete();

           // if (request()->wantsJson()) {
                return response()->json([
                    "status" => 200,
                    "message" => "Étudiant supprimé avec succès!"
                ]);
            //}

           // return to_route('etudiant.index');
        } catch (Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 500,
                    "message" => $e->getMessage()
                ]);
            }
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function downloadExcel()
    {
        try {
            return Excel::download(new EtudiantExport(), 'listetudiant.xlsx');
        } catch (Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 500,
                    "message" => $e->getMessage()
                ]);
            }
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function search(Request $request)
    {
        try {
            $name = $request->search;

            if ($name == "") {
                $result = Etudiant::paginate(10);
            } else {
                $result = Etudiant::where("nom", "like", '%' . $name . '%')->paginate(10);
            }

            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 200,
                    "message" => "Résultats de la recherche",
                    "etudiants" => $result
                ]);
            }

            return view('etudiant', ['uu' => $result]);
        } catch (Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    "status" => 500,
                    "message" => $e->getMessage()
                ]);
            }
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
