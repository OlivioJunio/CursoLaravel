@extends('Layouts.LayoutFull')

@push('css')

@endpush

@if(Session::has('Success'))
        toastr["success"]("<b>SUCESSO: </b><br> 
        {{ Session::get('success') }}");
@endif
@section('conteudo')

<table class="table table-sm">
  <thead>
  <a type="button" class="btn btn-success" href="{{route('clients.create')}}">Add +</a>
    <br>
    <br>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Email</th>
      <th scope="col">endereco</th>
      <th scope="col">Acoes</th>
    </tr>
  </thead>
  <tbody>
        @foreach($clients as $client)
        
            <tr>
              <th scope="row">{{$client->id}}</th>
                <td>{{$client->name}}</td>
                <td>{{$client->CPF}}</td>
                <td>{{$client->Email}}</td>
                <td>{{$client->endereco}}</td>
                <td>
                
              <span data-url="{{ route('clients.destroy',[ $client->id]) }}" data-idCleint= '{{ $client->id}}'
                class="btn btn-danger btn-sm deleteButton">
                <i class="fal fa-trash"></i>
                <span class='d-nome d-md-inline'> Delete</span>
              </span>
                
              <a href="{{ route('clients.edit', [ $client->id]) }}" 
                class="btn btn-primary btn-sm text-white">
                <i class="fal fa-pencil"></i>
                <span class='d-nome d-md-inline'>Edit</span>
              </a>
           
              </td>
          </tr>
        @endforeach
  </tbody>
</table>
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script>
        $('.cpf-mask').mask('000.000.000-00');

        $('.deleteButton').on('click', function (e) {
        var url = $(this).data('url');
        var idClient = $(this).data('idClient');
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            method: 'DELETE',
            url: url
        });
        $.ajax({
            data: {
                'idClient': idClient,
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

