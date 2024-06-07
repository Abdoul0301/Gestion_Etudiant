<?php

namespace App\Imports;

use App\Models\Etudiant;
use App\Models\Classe;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Ramsey\Collection\Collection;

class EtudiantImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function array(array $data)
    {

       /* foreach ($data as $d){
            Etudiant::create([
                'nom' => $d['nom'],
                'prenom' => $d['prenom'],
                'age' => $d['age'],
                'classe_id' => $d['classe'],

            ]);

        }*/

    }

    public function model(array $row)
    {
        // TODO: Implement model() method.
        $etudiant = new Etudiant();
        $etudiant->nom = $row['nom'];
        $etudiant->prenom = $row['prenom'];
        $etudiant->age = $row['age'];
        $etudiant->classe_id = $row['classe'];
        $etudiant->save();

    }
}
