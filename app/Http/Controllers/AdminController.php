<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        
        return view('admin.index', $data);
    }

    public function question()
    {
        // Store current route name, since after Route::dispatch, route name is not accessible
        $currentRoute = Route::currentRouteName();

        // Accessing REST API
        $response = Request::create('/api/questions');

        // Decode the json into and make it into array
        $questions = json_decode(Route::dispatch($response)->getContent(), true);

        $data = [
            'title' => 'Question',
            'currentRoute' => $currentRoute,
            'questions' => $questions
        ];
        
        return view('admin.question.question', $data);
    }
}

