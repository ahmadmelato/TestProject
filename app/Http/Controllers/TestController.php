<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{

    public function create()
    {
        return view('createTest'); // Return the create view
    }

    public function createquestion($id)
    {
        return view('createQuestion', compact('id')); // Return the create view
    }

    public function createAnswer($id,$question_id)
    {
        return view('createAnswer', compact('id','question_id')); // Return the create view
    }

    // Method to get tests by teacher ID
    public function indexByTeacher()
    {
        $teacherId = Auth::id(); // Get the currently authenticated user's ID
        $tests = Test::where('teacher_id', $teacherId)->get(); // Fetch tests for this teacher
        return view('dashboardTeacher', compact('tests', 'teacherId')); // Pass both variables to the view
    }

    public function index()
    {
        $tests = Test::all();
        return view('dashboardStudent', compact('tests')); // Pass both variables to the view
    }

    public function showQuestions($id)
    {
        $questions = Question::where('test_id', $id)->get(); // Get the questions related to this test
        return view('testQuestions', [
            'id' => $id,
            'questions' => $questions ?? [] // Ensure questions is an array
        ]);
    }

    public function showTestQuestions($id)
    {
        $questions = Question::where('test_id', $id)->get(); // Get the questions related to this test
        $answers = Answer::whereIn('question_id', $questions->pluck('id'))->get();
        return view('testForm', [
            'id' => $id,
            'questions' => $questions ?? [], // Ensure questions is an array
            'answers'=> $answers
        ]);
    }

    public function showAnswer($id,$question_id)
    {
        $answers = Answer::where('question_id', $question_id)->get(); // Get the questions related to this test
        return view('answer', [
            'id' => $id,
            'question_id' => $question_id,
            'answers' => $answers// Ensure questions is an array
        ]);
    }

    public function destroyAnswer($id,$question_id,$answer_id)
    {   
        $answers = Answer::findOrFail($answer_id);
        $answers->delete();
        return redirect()->route('questions.answer',['id' => $id,'question_id' => $question_id])->with('success', 'successfully!');
    }

    public function store(Request $request)
    {
        $validatedData['teacher_id'] = Auth::id();
        $validatedData['name'] = $request['name'];
        
        Test::create($validatedData); // Save the new test

        return redirect()->route('dashboard.teacher')->with('success', 'Test Add successfully!');
    }

    public function storeQuestion(Request $request)
    {
        $validatedData['test_id'] = $request['test_id'];
        $validatedData['content'] = $request['content'];
        
        Question::create($validatedData); // Save the new test

        //$teacherId = Auth::id(); // Get the currently authenticated user's ID
        //$tests = Test::where('teacher_id', $teacherId)->get(); // Fetch tests for this teacher
        //return view('dashboardTeacher', compact('tests', 'teacherId')); // Pass both variables to the view

        return redirect()->route('tests.questions',$request->test_id)->with('success', 'Test Add successfully!');
    }

    public function storeAnswer(Request $request)
    {
        $validatedData['question_id'] = $request['question_id'];
        $validatedData['answer'] = $request['answer'];
        $validatedData['is_correct'] = $request['is_correct'] ?? 0;
        
        Answer::create($validatedData); // Save the new test

        return redirect()->route('questions.answer',['id' => $request['id'],'question_id' => $request['question_id']])->with('success', 'successfully!');
    }

    public function destroyQuestion($id,$test_id)
    {   
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('tests.questions',$test_id)->with('success', 'Test Add successfully!');
    }

    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
        return redirect()->route('dashboard.teacher')->with('success', 'Test deleted successfully!');
    }

    public function edit($id)
    {
        $test = Test::findOrFail($id); // Fetch the test by ID
        return view('tests.edit', compact('test')); // Pass the test to the new view
    }
}

