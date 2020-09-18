<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionesAdmin extends Model
{
    protected $table = 'funciones_admin';
    protected $fillable = ['movieId','time','location'];

    public function movie()
    {
        return $this->belongsTo(Movie::class,'movieId');
    }
}
