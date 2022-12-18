<?php

namespace App\Modules\Models\TodayShare;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodayShare extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'price'
    ];
}
