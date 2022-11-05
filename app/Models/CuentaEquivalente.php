<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaEquivalente extends Model
{
    use HasFactory;
    protected $fillable = [
        'idCuentaEquivalente',
        'nombreCuentaEq'
    ];

    public function Cuenta(){
        return $this->hasMany(Cuenta::class);
    }
}
