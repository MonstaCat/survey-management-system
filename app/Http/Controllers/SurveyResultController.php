<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        $data = $request->validate([
            'google_id' => 'required|varchar',
            'question_id' => 'required|varchar',
            'answer' => 'required|varchar',
            'concolusion' => 'required|varchar',
            'question' => 'required|varchar',
            'recommendation' => 'required|varchar',
            'name' => 'required|varchar',
        ]);

        SurveyResult::create($data);

        return response()->json(['message' => 'Survey result created successfully.']);
    }
}
