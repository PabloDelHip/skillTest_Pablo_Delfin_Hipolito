<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionesUser extends Model
{
    protected $table = 'funciones_user';
    protected $fillable = ['userId','movieId','seatId'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function funciones_admin()
    {
        return $this->belongsTo(FuncionesAdmin::class, 'movieId');
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seatId');
    }

    
}
