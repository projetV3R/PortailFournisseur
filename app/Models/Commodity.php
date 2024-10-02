<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;

class Commodity extends Model
{
    protected $table = "commoditys";
    protected $fillable = [
        'commodity',
        'commodityTitleFr',
    ];

    public function getCommodities()
    {
        return $this->belongsTo(Classe::class);
    }
}
