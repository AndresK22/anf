<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'sector_id',
        'nombreEmpresa'
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
    public function Cuenta()
    {
        return $this->hasMany(Cuenta::class);
    }
    public function RatioPorEmpresa()
    {
        return $this->hasMany(RatioPorEmpresa::class);
    }
}
