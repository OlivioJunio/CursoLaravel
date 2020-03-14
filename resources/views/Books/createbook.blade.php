@extends('Layouts.LayoutFull')

@push('css')

@endpush
@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('clients.store')}}"
                  class="form-horizontal form-validate">
                {{csrf_field() }}  
            <div class="form-group">
                <label>
                    Formulario
                    <br>    
                    <br>
                    Nome:
                </label>
                    <input id='nome' name='nome' type='text' value='{{old("nome")}}' >
            </div>
            <div class="form-group">
                <label>
                    Writer:
                </label>
                    <input id='writer' name='writer' type='text' value='{{old("writer")}}' class='cpf-mask'>
                    <br>
            </div>
            <div class="form-group">
                <label>
                    Page Number:
                </label>
                    <input id='page number' name='page number' type='text'value='{{old("page number")}}' >
            </div>
            <div> 
                <Button type="Submit" class="btn btn-primary">Send</Button>
                <Button type="Submit" class="btn btn-primary">Clear</button>  
            </div>
    </form>    
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

