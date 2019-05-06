@extends('layouts.app')

@section('content')
<form action="{{ url('criar')}}" method="post"  enctype="multipart/form-data">
  {!! csrf_field() !!}

  @if (session('erro'))
      <div class="alert alert-danger">
          {{ session('erro') }}
      </div>
    @endif
    
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo">
  </div>
  <div class="form-group">
    <label for="imagem">Imagem</label>
    <input type="file" id="imagem" name="imagem">
  </div>
  <button type="submit" class="btn btn-default">Salvar</button>
</form>
@endsection
