<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Segment;
use App\Models\Classe;

class Family extends Model
{
    protected $table = "familys";
    protected $fillable = [
        'family',
        'familyTitleFr',
    ];

    public function getFamilies()
    {
        return $this->belongsTo(Segment::class);
    }

    public function classes() {
        return $this->hasMany(Classe::class);
    }
}
