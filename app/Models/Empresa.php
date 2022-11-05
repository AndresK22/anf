<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'sector_id',
        'nombreEmpresa'
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
