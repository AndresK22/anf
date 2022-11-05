<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaPorPeriodo extends Model
{
    use HasFactory;
    protected $fillable = [
        'cuenta_periodo_id',
        'periodo_contable_id',
        'cuenta_id',
        'saldo'
    ];

    public function Cuenta(){
        return $this->belongsTo(Cuenta::class);
    }
    public function PeriodoContable(){
        return $this->belongsTo(PeriodoContable::class);
    }
}
