<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_cuenta_id',
        'empresa_id',
        'cuenta_equivalente_id',
        'nombreCuenta'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function cuentaEquivalente()
    {
        return $this->belongsTo(CuentaEquivalente::class);
    }
    public function TipoCuenta()
    {
        return $this->belongsTo(TipoCuenta::class);
    }

}
