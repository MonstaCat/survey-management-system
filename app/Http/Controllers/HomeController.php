<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Question;
use App\Models\SurveyResult;
use App\Models\Category;

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
    // public function index()
    // {
    //     $user_id = Auth::user()->google_id; 

    //     $questions = Question::orderBy('question_order')->get();
    //     $results = SurveyResult::where('google_id', $user_id)->get();

    //     // Check if the user has taken the survey
    //     $userHasTakenSurvey = SurveyResult::where('google_id', $user_id)->exists();

    //     if ($userHasTakenSurvey) {
    //         $data = [
    //             'results' => $results,
    //             'userHasTakenSurvey' => $userHasTakenSurvey
    //         ];
    //         return view('home', $data);
    //     } else {
    //         $data = [
    //             'questions' => $questions,
    //             'userHasTakenSurvey' => $userHasTakenSurvey
    //         ];
    //         return view('home', $data);
    //     }
    // }

    public function index()
    {
        $currentRoute = Route::currentRouteName();

        $data = [
            'title' => 'Home',
            'currentRoute' => $currentRoute
        ];

        return view('user.panel.home', $data);
    }

    public function profile()
    {
        $currentRoute = Route::currentRouteName();

        $data = [
            'title' => 'Profile',
            'currentRoute' => $currentRoute
        ];

        return view('user.panel.profile', $data);
    }

    public function survey()
    {
        $user_id = Auth::user()->google_id;
        $currentRoute = Route::currentRouteName();
        $response = Request::create('/api/questions');
        $questions = json_decode(Route::dispatch($response)->getContent(), true);
        $categories = Category::all();
        $results = SurveyResult::where('google_id', $user_id)->get();

        // Check if the user has taken the survey
        $userHasTakenSurvey = SurveyResult::where('google_id', $user_id)->exists();

        if ($userHasTakenSurvey) {
            $data = [
                'title' => 'Survey',
                'currentRoute' => $currentRoute,
                'results' => $results,
                'userHasTakenSurvey' => $userHasTakenSurvey
            ];

            return view('user.panel.survey', $data);
        } else {
            $data = [
                'title' => 'Survey',
                'currentRoute' => $currentRoute,
                'questions' => $questions,
                'categories' => $categories,
                'userHasTakenSurvey' => $userHasTakenSurvey
            ];

            return view('user.panel.survey', $data);
        }
    }

    public function submit(Request $request)
    {
        $currentRoute = Route::currentRouteName();

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
}