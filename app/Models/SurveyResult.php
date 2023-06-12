<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SurveyResult extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'data_perguruan_tinggi';
    protected $fillable = [
        'google_id', 'question_id', 'answer', 'conclusion', 'recommendation', 'question', 'name'
    ];
}
