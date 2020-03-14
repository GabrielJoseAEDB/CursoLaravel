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
        <h1>Edição de Cliente</h1>
        <form method="POST" action="{{ route('client.update',[ $client->id]) }}" class="form-horizontal form-validate">
            {{csrf_field()}}
            @method('PUT')
            <div class="form-group">
                <label>Nome:</label>
            <input id="name" class="form-control" name="name" type="text" placeholder="Digite seu nome" value="{{old("name","$client->name")}}" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input id="email" class="form-control" name="email" type="text" placeholder="Digite seu email" value="{{old("email","$client->email")}}" required/> 
            </div>
            <div class="form-group">
                <label>CPF:</label>
                <input id="cpf" class="form-control" name="cpf" type="text" placeholder="Digite seu CPF" value="{{old("cpf","$client->cpf")}}" required/>
            </div>
            <div class="form-group">
                <label>Endereço:</label>
                <input id="endereco" class="form-control" name="endereco" type="text" placeholder="Digite seu endereço" value="{{old("endereco","$client->endereco")}}"/>
            </div>
            <div class="box">
                {{-- Se o for check, utilizar if(old) then check else vazio --}}
                <label>Ativo:</label>
                <input id="active_flag" name="active_flag" type="checkbox" 
                    @if($client->active_flag) checked='checked' @endif
                />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" style="float:right"><i class="fas fa-check-circle"></i> Salvar</button>
            </div>
        </form>
    <a class="btn btn-primary btn-sm" href="{{ route('client.index') }}" role="button"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
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