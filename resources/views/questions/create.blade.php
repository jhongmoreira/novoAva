@extends('layouts.main')
@section('title','Nova Questão')
@section('content')
<form action="{{ route('save-question') }}" method="post">
    @csrf
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="form-group">
            <label for="question">Questão</label>
                <textarea name="question" id="question" class="form-control" rows="5"></textarea>
            </div>
        </div>
    </div>  

    <div class="row mb-1">
        <div class="col-md-12">
            <div class="form-group">
            <label for="alternativa1">Alternativa 01</label>
            <input type="text" name="alternativa1" id="alternativa1" class="form-control">
            </div>
        </div>
    </div>    

    <div class="row mb-1">
        <div class="col-md-12">
            <div class="form-group">
            <label for="alternativa1">Alternativa 02</label>
            <input type="text" name="alternativa2" id="alternativa2" class="form-control">
            </div>
        </div>
    </div>    

    <div class="row mb-1">
        <div class="col-md-12">
            <div class="form-group">
            <label for="alternativa3">Alternativa 03</label>
            <input type="text" name="alternativa3" id="alternativa3" class="form-control">
            </div>
        </div>
    </div>    

    <div class="row mb-1">
        <div class="col-md-12">
            <div class="form-group">
            <label for="alternativa3">Alternativa 04</label>
            <input type="text" name="alternativa4" id="alternativa4" class="form-control">
            </div>
        </div>
    </div>    

        <div class="row mt-2">
            <div class="col-md-3">
                <button class="form-control btn btn-primary" type="submit">Cadastrar</button>
            </div>
        </div>
    </div>
</form>
@endsection