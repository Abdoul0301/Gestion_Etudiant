<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Etudiant extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['nom' , 'prenom' , 'age' , 'email' , 'classe_id'];

    public function classe(){
        return $this->belongsTo(Classe::class);
    }
}
