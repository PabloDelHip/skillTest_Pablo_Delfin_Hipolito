<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // protected $primaryKey = 'id';
    protected $table = 'movie';
    protected $fillable = ['name','img'];

    public function funcionesAdmin()
    {
        return $this->hasMany(FuncionesAdmin::class, 'id');
    }
}
