<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreRatio',
    ];

    public function Cuenta(){
        return $this->hasMany(RatioPorEmpresa::class);
    }
    public function PeriodoContable(){
        return $this->hasMany(RatioPorSector::class);
    }
}
