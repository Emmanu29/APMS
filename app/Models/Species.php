<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $table = 'species';

    protected $guarded = [];

    // protected $fillable = [
    //     'name',
    //     'breed',
    //     'heartRateLowAlarm',
    //     'heartRateHighAlarm',
    //     'respiratoryRateLowAlarm',
    //     'respiratoryRateHighAlarm',
    //     'coreTempLowAlarm',
    //     'coreTempHighAlarm',
    // ];

    
}
