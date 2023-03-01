<?php

namespace App\Http\Controllers;

use App\Models\SurveyResult;
use Illuminate\Http\Request;

class SurveyResultController extends Controller
{
    public function index()
    {
        $result = SurveyResult::all();

        $data = [
            'title' => 'Survey Result',
            'result' => $result
        ];
        
        return view('admin.result', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'google_id' => 'required|varchar',
            'question_id' => 'required|varchar',
            'answer_index' => 'required|varchar',
        ]);

        SurveyResult::create($data);

        return response()->json(['message' => 'Survey result created successfully.']);
    }
}
