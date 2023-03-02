<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;

use App\Models\Question;
use App\Models\SurveyResult;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $currentRoute = Route::currentRouteName();

        $survey_result = SurveyResult::all();
        $questions = Question::all();
        $users = User::all();
        $total_completed_survey_users = SurveyResult::distinct('google_id')->get()->count();

        if (count($users) == 0) {
            $total_respondents = 0;
        } else {
            $total_respondents = ($total_completed_survey_users / count($users)) * 100;
        }

        $data = [
            'title' => 'Dashboard',
            'survey_result' => $survey_result,
            'questions' => $questions,
            'users' => $users,
            'total_completed_survey' => $total_completed_survey_users,
            'total_respondents' => $total_respondents,
            'currentRoute' => $currentRoute
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

    public function question_add()
    {
        // Store current route name, since after Route::dispatch, route name is not accessible
        $currentRoute = Route::currentRouteName();

        $data = [
            'title' => 'Question Add',
            'currentRoute' => $currentRoute,
        ];
        
        return view('admin.question.question_add', $data);
    }

    public function question_store(Request $request)
    {    
        // Get the input data from the form
        $input = request()->all();

        // Manually generate the answer array with null values
        $answerArray = [];
        for ($i = 0; $i < 1; $i++) {
            $answerArray[] = [
                'answer' => null,
                'conclusion' => null,
                'recommendation' => null,
            ];
        }

        // Create a new question instance
        $question = new Question([
            'question' => $input['question'],
            'question_order' => $input['question_order'],
            'answers' => $answerArray,
        ]);

        // Set the properties of the question from the input data
        $question->question = $input['question'];
        $question->question_order = $input['question_order'];

        // Save the question
        $question->save();

        return redirect('admin/question');        
    }

    public function question_update($id)
    {
        // Store current route name, since after Route::dispatch, route name is not accessible
        $currentRoute = Route::currentRouteName();

        // Accessing REST API
        $response = Request::create('/api/questions/'.$id);

        // Decode the json into and make it into array
        $question = json_decode(Route::dispatch($response)->getContent(), true);

        $data = [
            'title' => 'Question Update',
            'currentRoute' => $currentRoute,
            'question' => $question
        ];
        
        return view('admin.question.question_update', $data);
    }

    public function question_put(Request $request, $id)
    {
        $question = Question::findOrFail($id);
    
        $question->update(request()->all());

        return redirect('admin/question');
    }

    public function question_delete(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        
        $question->delete();

        return redirect('admin/question');
    }

    public function answer_delete(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        
        // Exclude the answer to be deleted from the request data
        $requestData = $request->except(['answers.' . $request->input('answer_index')]);
        
        // Update the question with the modified request data
        $question->update($requestData);

        // Redirect to the question edit page
        return redirect()->route('question.update', $id)->with('success', 'Question updated successfully');
    }

    public function answer_update($questionId, Request $request)
    {
        // Get the index of the answer that needs to be edited.
        $index = $request->input('answer_index');

        // Get the question that needs to be updated.
        $question = Question::find($questionId);

        // Update the answer in the question's answers array using the index.
        $answers = $question->answers;
        $answers[$index]['answer'] = $request->input('answer');
        $answers[$index]['conclusion'] = $request->input('conclusion');
        $answers[$index]['recommendation'] = $request->input('recommendation');
        $question->answers = $answers;

        // Save the updated question to the database.
        $question->save();

        // Redirect back to the question edit page with a success message.
        return redirect()->route('question.update', $questionId)->with('success', 'Question updated successfully');
    }

    public function answer_add(Request $request)
    {
        $question_id = $request->input('_id');
        $question = Question::find($question_id);
        $answers = $question->answers;

        $answer = [
            'answer' => $request->input('answer'),
            'conclusion' => $request->input('conclusion'),
            'recommendation' => $request->input('recommendation'),
        ];

        array_push($answers, $answer); // add the new answer to the answers array

        $question->answers = $answers; // set the updated answers array to the answers property of the question

        $question->save(); // save the updated question to the database

        // Redirect back to the question edit page with a success message.
        return redirect()->route('question.update', $question_id)->with('success', 'Question updated successfully');

    }

    public function users()
    {
        $users = User::all();

        $currentRoute = Route::currentRouteName();

        $data = [
            'title' => 'Registered Users',
            'currentRoute' => $currentRoute,
            'users' => $users
        ];
        
        return view('admin.registered_users.users', $data);
    }

    public function user_delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();

        return redirect('admin/users');
    }
}

