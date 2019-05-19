<?php

namespace App\Http\Controllers;

use Auth;
use App\Test;
use App\Question;
use App\TestAnswer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;

class ResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Test::all()->load('user');
        $questions = Question::all();

        if (!Auth::user()->isAdmin()) {
            $results = $results->where('user_id', '=', Auth::id());
        }

        return view('results.index', compact('results', 'questions'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        return view('results.show', compact('test', 'results'));
    }

    public function print_results()
    {
        $results = Test::all()->load('user');
        $questions = Question::all();

        if (!Auth::user()->isAdmin()) {
            $results = $results->where('user_id', '=', Auth::id());
        }

        $pdf = PDF::loadView('results.print-results',
            [
                'results' => $results,
                'questions' => $questions
            ]
        )
            ->setPaper('a4', 'landscape');
        return $pdf->stream('Results list.pdf');
    }
}
