<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;

class Exams extends Controller
{
    public function index(){

        $questions = Question::all();

        return view('exams.index',['questions'=>$questions]);
    }

    public function store(Request $request){
        DB::transaction(function () use ($request) {
       
            // Salve as respostas associadas ao exame
            Exam::insert([
                ['exam_id' => 1, 'answer_id' => $request->input('question1')],
                ['exam_id' => 2, 'answer_id' => $request->input('question2')],
                ['exam_id' => 3, 'answer_id' => $request->input('question3')],
                ['exam_id' => 4, 'answer_id' => $request->input('question4')],
                ['exam_id' => 5, 'answer_id' => $request->input('question5')],
                ['exam_id' => 6, 'answer_id' => $request->input('question6')],
                ['exam_id' => 7, 'answer_id' => $request->input('question7')],
                ['exam_id' => 8, 'answer_id' => $request->input('question8')],
                ['exam_id' => 9, 'answer_id' => $request->input('question9')],
                ['exam_id' => 10, 'answer_id' => $request->input('question10')],
            ]);
        
        });

        return response()->json(['mensagem' => 'Salvo com sucesso']);
    }
}
