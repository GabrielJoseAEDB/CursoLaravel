@extends('Layouts.LayoutFull')
@push('css')
@endpush
@section('conteudo')
    <body>
        
        <div class="container">
            <h1>Cadastro de Cliente</h1>
            <form method="post" action="{{ route('client.store') }}">
                <div class="form-group">
                    <label>Nome:</label>
                    <input class="form-control" name="inputNome" type="text" placeholder="Digite seu nome">
                </div>
                <div class="form-group">
                    <label>CPF:</label>
                    <input id="cpf" type="text" name="cpf" class="form-control" placeholder="Digite seu CPF"/>
                </div>
                <div class="form-group">
                    <label>Endereço:</label>
                    <input class="form-control" name="inputEndereco" type="text" placeholder="Digite seu endereço">
                </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success" style="float:right">Cadastrar</button>
                    <a class="btn btn-primary btn-sm" href="./" role="button">Voltar</a>
                </div>
            </form>
        </div>
    </body>
@endsection

@push('scripts')
    {{-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $("#cpf").mask('000.000.000-00')
    </script>
@endpush