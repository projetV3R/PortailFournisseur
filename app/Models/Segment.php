<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Family;

class Segment extends Model
{
    protected $table = "segments";
    protected $fillable = [
        'segment',
        'segmentTitleFr',
    ];

    public function families(){
        return $this->hasMany(Family::class);
    }
}
