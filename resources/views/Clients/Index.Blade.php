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
                <td>
                <a type="Submit" class="btn btn-primary">Edit</a>
                <a type="Submit" class="btn btn-danger">Delete</a>
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
</script>
@endpush

