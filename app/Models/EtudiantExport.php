<?php
namespace App\Models;


use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class EtudiantExport implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings():array{
        return[
            'id',
            'nom',
            'prenom',
            'age',
            'classe',

        ];
    }
    public function collection()
    {
        return Etudiant::all();
    }
}


