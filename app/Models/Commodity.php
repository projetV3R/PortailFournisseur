<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = "commoditys";
    protected $fillable = [
        'commodity',
        'commodityTitleFr',
    ];
}
