@extends('Layouts.LayoutFull')
@push('css')
@endpush
@if(session()->get('success'))
    <!-- <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif -->
@section('conteudo')
<a class="btn btn-success" href="{{route('emprestimo.create')}}" role="button" style="margin:10px;float:right"><i class="fas fa-plus-circle"></i> Adicionar</a>
<table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Data Emprestimo</th>
            <th scope="col">Qtd.dias</th>
            <th scope="col">Cliente</th>
            <th scope="col">Livro</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($emprestimos as $emprestimo)
        <tr>
            <td scope="row">{{$emprestimo->id}}</th>
            <td>{{$emprestimo->data_emprestimo}}</td>
            <td>{{$emprestimo->qtd_dias}}</td>
            <td class="cpf">{{$emprestimo->id_book}}</td>
            <td>{{$emprestimo->id_client}}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('emprestimo.edit',[$emprestimo->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                <!-- <span data-url="{{ route('emprestimo.destroy',[$emprestimo->id]) }}" data-idemprestimo='{{$emprestimo->id}}'>
                    <span class="btn btn-danger btn-sm text-white deleteButton">
                        <i class="fas fa-trash-alt"></i>
                        <span class="d-nome d-md inline"> Deletar</span>
                    </span>
                </span> -->
                <span data-url="{{ route('emprestimo.destroy',[ $emprestimo->id]) }}" data-idemprestimo='{{ $emprestimo->id}}' class="btn btn-danger btn-sm text-white deleteButton">
                    <i class="fal fa-trash"></i>
                    <span class='d-none d-md-inline'> Deletar</span>
                </span>

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

    $('.deleteButton').on('click', function (e) { 
        result = confirm('Tem certeza?');
        
        if(result==false){
            return;
        }
        var url = $(this).data('url');
        var idemprestimo = $(this).data('idemprestimo');
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            method: 'DELETE',
            url: url
        });
        $.ajax({
            data: {
                'idemprestimo': idemprestimo,
            },
            success: function (data) {
                console.log(data);
                if (data['status'] ?? '' == 'success') {
                    if (data['reload'] ?? '') {
                        location.reload();
                    }
                } else {
                   console.log('error');
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
    
            
</script>
@endpush