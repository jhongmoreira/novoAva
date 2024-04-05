<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Answer;

class Questions extends Controller
{
    public function index(){
        return view('questions.create');
    }

    public function store(Request $request)
    {
        // Iniciar a transação
        DB::transaction(function () use ($request) {
            // Criar a pergunta
            $question = Question::create([
                'description' => $request->question,
            ]);

            // Criar as respostas associadas à pergunta
            $question->answers()->createMany([
                ['question_id'=>$question->id, 'description_answer' => $request->alternativa1],
                ['question_id'=>$question->id, 'description_answer' => $request->alternativa2],
                ['question_id'=>$question->id, 'description_answer' => $request->alternativa3],
                ['question_id'=>$question->id, 'description_answer' => $request->alternativa4]
            ]);
        });

        return response()->json(['message' => 'Pergunta cadastrada com sucesso'], 201);
    }
}
