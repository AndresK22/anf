<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoContable extends Model
{
    use HasFactory;
    protected $fillable = [
        'anio',
        'desde',
        'hasta',
    ];

    public function CuentaPorPeriodo(){
        return $this->hasMany(CuentaPorPeriodo::class);
    }
    public function RatioPorEmpresa(){
        return $this->hasMany(RatioPorEmpresa::class);
    }
    public function RatioPorSector(){
        return $this->hasMany(RatioPorSector::class);
    }
}
