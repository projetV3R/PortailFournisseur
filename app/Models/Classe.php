<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Family;
use App\Models\Commodity;

class Classe extends Model
{
    protected $table = "classes";
    protected $fillable = [
        'class',
        'classTitleFr',
    ];

    public function getClasses()
    {
        return $this->belongsTo(Family::class);
    }

    public function commodities() {
        return $this->hasMany(Commodity::class);
    }
}
