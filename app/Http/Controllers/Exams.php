<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;

class Exams extends Controller
{
    public function index(){

        $questions = Question::all();

        return view('exams.index',['questions'=>$questions]);
    }
}
