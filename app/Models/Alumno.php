<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
// Se indican los atributos que seran llenables(ver migraciones)
//desde la interface
    protected $fillable = [
            'name',
            'lastname',
            'email',
            'state',
            'peruvian',
            'assistance',
            'phone',
            'idCompany'
        ];
    public function company(){
          // pertenece a 
        return $this->belongsTo(Empresa::class,'idCompany');
    }
}
