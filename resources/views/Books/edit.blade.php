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
        <h1>Edição de Livro</h1>
        <form method="POST" action="{{ route('book.update',[ $book->id]) }}" class="form-horizontal form-validate">
            {{csrf_field()}}
            @method('PUT')
            <div class="form-group">
                <label>Nome:</label>
            <input id="name" class="form-control" name="name" type="text" placeholder="Digite o nome do livro" value="{{old("name","$book->name")}}" required>
            </div>
            <div class="form-group">
                <label>Escritor:</label>
                <input id="writer" class="form-control" name="writer" type="text" placeholder="Digite o escritor" value="{{old("writer","$book->writer")}}" required/> 
            </div>
            <div class="form-group">
                <label>Quantidade de páginas</label>
                <input id="page_number" class="form-control" name="page_number" type="number" placeholder="Digite a quantidade de páginas" value="{{old("page_number","$book->page_number")}}"/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" style="float:right"><i class="fas fa-check-circle"></i> Salvar</button>
            </div>
        </form>
        <a class="btn btn-primary btn-sm" href="{{ route('book.index') }}" role="button"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
    </div>

@endsection

@push('scripts')
{{-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script>
</script>
@endpush