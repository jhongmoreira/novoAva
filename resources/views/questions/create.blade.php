@extends('layouts.main')
@section('title','Nova Questão')
@section('content')
<!-- <form action="{{ route('save-question') }}" method="post"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<form id="formQuestion">
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
                <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Cadastrar</button>
            </div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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