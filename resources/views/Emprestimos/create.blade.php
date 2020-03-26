@extends('Layouts.LayoutFull')
@push('css')

@endpush
@section('conteudo')


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <h1>Cadastro de Emprestimos</h1>
        <form method="post" action="{{ route('emprestimo.store') }}" class="form-horizontal form-validate">
            {{csrf_field()}}
            <div class="form-group">
                <label>Data de Emprestimo:</label>
            <input id="data_emprestimo" class="form-control" name="data_emprestimo" type="date" placeholder="Digite a data de emprestmo" value="{{old("data_emprestimo")}}" required>
            </div>
            <div class="form-group">
                <label>Quantidade de dias:</label>
                <input id="qtd_dias" class="form-control" name="qtd_dias" type="number" placeholder="Digite a quantidade de dias" value="{{old("qtd_dias")}}" required/> 
            </div>
            <div class="form-group">
                <label>IDLIVRO:</label>
                <input id="id_book" class="form-control" name="id_book" type="number" placeholder="Digite o id do livro" value="{{old("id_book")}}" required/>
            </div>
            <div class="form-group">
                <label>IDCLIENTE:</label>
                <input id="id_client" class="form-control" name="id_client" type="number" placeholder="Digite o cliente" value="{{old("id_client")}}"/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" style="float:right"><i class="fas fa-check-circle"></i> Cadastrar</button>
            </div>
        </form>
        <a class="btn btn-primary btn-sm" href="./" role="button"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
    </div>

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