<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Question;
use App\Models\SurveyResult;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->google_id; 

        $questions = Question::orderBy('question_order')->get();
        $results = SurveyResult::where('google_id', $user_id)->get();

        // Check if the user has taken the survey
        $userHasTakenSurvey = SurveyResult::where('google_id', $user_id)->exists();

        if ($userHasTakenSurvey) {
            $data = [
                'results' => $results,
                'userHasTakenSurvey' => $userHasTakenSurvey
            ];
            return view('home', $data);
        } else {
            $data = [
                'questions' => $questions,
                'userHasTakenSurvey' => $userHasTakenSurvey
            ];
            return view('home', $data);
        }
    }
}
