<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SurveyResult extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'survey_result';
    protected $fillable = [
        'google_id', 'question_id', 'answer_index'
    ];
}
