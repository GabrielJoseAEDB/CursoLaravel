@extends('Layouts.LayoutFull')
@push('css')
@endpush
@if(Session::has('seccess'))
    toastr["success"]("<b>Sucesso</b>)<br>
    {{Session::get('sucess')}}";
@endif
@section('conteudo')
    <a class="btn btn-success" href="{{route('client.create')}}" role="button" style="margin:10px;float:right"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">CPF</th>
            <th scope="col">Endereço</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td scope="row">{{$client->id}}</th>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td class="cpf">{{$client->cpf}}</td>
                    <td>{{$client->endereco}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="" role="button"><i class="fas fa-edit"></i> Editar</a>
                        <a class="btn btn-danger btn-sm" href="{{route('client.create')}}" role="button"><i class="fas fa-trash-alt"></i> Excluir</a>
                    </td>
                </tr>
            @endforeach        
        </tbody>
      </table>

@endsection

@push('scripts')
    {{-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $(".cpf").mask('000.000.000-00')
    </script>
@endpush