@extends('layouts.main')
@section('title','Nova Questão')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<h1>Nova Prova</h1>

@foreach($questions as $questions)
<div class="row">
    {{ $questions->description }}
</div>
    @foreach($questions->answers as $answers)
        <input type="radio" name="{{ 'question'.$questions->id }}" id="{{ $answers->id }}" value="{{ $answers->description_answer }}">
        <label for="{{ $answers->id }}">{{ $answers->description_answer }}</label> <br>
    @endforeach
    <hr>
@endforeach


<script>

    function limparCampos() {
        $('#formQuestion')[0].reset(); // Limpa todos os campos do formulário
    }

    $(document).ready(function () {
        $('#formQuestion').submit(function (e) {
            e.preventDefault();

            var $form = $(this);
            var $btnSubmit = $form.find('#btnSubmit');

            $.ajax({
                type: 'POST',
                url: '{{ route("save-question") }}',
                data: $(this).serialize(),
                beforeSend: function () {
                    // Desativar o botão de submit antes de enviar a requisição
                    $btnSubmit.prop('disabled', true);
                },
                success: function (response) {
                    toastr.success(response.mensagem);
                    limparCampos(); // Chama a função para limpar os campos
                    $btnSubmit.prop('disabled', false);

                },
                error: function (error) {
                    toastr.error('Erro ao enviar formulário.', error);
                    console.error('Erro ao salvar o post:', error);
                },
                complete: function () {
                    // Reativar o botão de submit após a conclusão da requisição
                    $btnSubmit.prop('disabled', false);
                }
                
            });
        });
    });
</script>
@endsection