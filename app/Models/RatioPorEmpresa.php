<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatioPorEmpresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'ratio_id',
        'empresa_id',
        'periodo_contable_id',
        'valor'
    ];

    public function Ratio(){
        return $this->belongsTo(Ratio::class);
    }
    public function PeriodoContable(){
        return $this->belongsTo(PeriodoContable::class);
    }
    public function Empresa(){
        return $this->belongsTo(Empresa::class);
    }
}
