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
                'questions' => $questions,
                'categories' => $categories,
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
}