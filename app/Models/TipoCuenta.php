<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreTipoCuenta'
    ];

    public function Cuenta(){
        return $this->hasMany(Cuenta::class);
    }
}
