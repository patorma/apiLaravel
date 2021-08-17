<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable =[
        'idStudent',
        'idCost'
    ];

    public function student(){
        return $this->belongsTo(Alumno::class,'idStudent');
    }

    public function cost(){
        return $this->belongsTo(Precio::class,'idCost');
    }
}
