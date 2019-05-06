@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'login', 'method' => 'post', 'enctype' => 'multpart/form-data']) !!}
    <div class="form-group">
        <p>Título</p>
        <label>
        {!! Form::text('titulo', null, ['class' => 'input', 'placeholder' => 'Insira um título para a imagem']) !!}
        </label>
    </div>

    <div class="form-group">
        <p>Imagem</p>
        <label>
        {!! Form::file('imagem') !!}
        </label>
    </div>

    {!! Form::submit('Entrar') !!}

{!! Form::close() !!}
@endsection