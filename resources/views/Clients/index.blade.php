@extends('Layouts.LayoutFull')
@push('css')
@endpush
@section('conteudo')
<body>
    <a class="btn btn-success" href="client/create" role="button" style="margin:10px;float:right">Adicionar</a>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">CPF</th>
            <th scope="col">Endereço</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td class="cpf">{{$client->cpf}}</td>
                    <td>{{$client->endereco}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="client/create" role="button" style="margin:10px;float:right">Editar</a>
                        <a class="btn btn-danger btn-sm" href="client/create" role="button" style="margin:10px;float:right">Excluir</a>
                    </td>
                </tr>
            @endforeach        
        </tbody>
      </table>
</body>
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