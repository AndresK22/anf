<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreSector'
    ];

    public function Empresa(){
        return $this->hasMany(Empresa::class);
    }
    public function RatioPorSector(){
        return $this->hasMany(RatioPorSector::class);
    }
    
}
