<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Question;
use App\Models\SurveyResult;

class SurveyResultController extends Controller
{
    public function index()
    {
        $result = SurveyResult::all();

        // Store current route name, since after Route::dispatch, route name is not accessible
        $currentRoute = Route::currentRouteName();

        $data = [
            'title' => 'Survey Result',
            'currentRoute' => $currentRoute,
            'result' => $result
        ];
        
        return view('admin.respondents.respondents', $data);
    }

    public function store(Request $request)
    {
        $answers = $_POST['answer'];
        $user_id = Auth::user()->google_id; 
        $name = Auth::user()->name;

        // Loop through the answers and store each one in the survey_result collection
        foreach ($answers as $question_id => $answer_index) {
            $question = Question::find($question_id);
            $conclusion = $question->answers[$answer_index]['conclusion'];
            $recommendation = $question->answers[$answer_index]['recommendation'];

            $survey_result = new SurveyResult;
            $survey_result->google_id = $user_id;
            $survey_result->question_id = $question_id;
            $survey_result->question = $question->question;
            $survey_result->answer = $question->answers[$answer_index]['answer'];
            $survey_result->conclusion = $conclusion;
            $survey_result->recommendation = $recommendation;
            $survey_result->name = $name;

            $survey_result->save();
        }

        // Redirect the user to the result page
        return redirect('/home');
    }

    public function result_delete(Request $request, $id)
    {
        $result = SurveyResult::findOrFail($id);
        
        $result->delete();

        return redirect('admin/respondents');
    }
}
