@extends('layouts.app')

@section('content')
<p>
  Galeria de Imagens
</p>
<p>
<a href="{!! url('criar/') !!}" class="btn btn-success" role="button">Novo</a>
</p>
<div class="row">
  @foreach ($galery as $key => $value)
    <div class="col-md-4">
      <div class="thumbnail col-md-6">
        <img src="{!! url($value->imagem) !!}" alt="" />
        <div class="caption">
          <h3>{!! $value->titulo !!}</h3>
          <span class="pull-right"> {!! $value->created_at->diffForHumans() !!}</span>
          <p>
            
            <a href="{!! url('deletar/'.$value->id) !!}" class="btn btn-danger" role="button">Deletar</a>
          </p>          
        </div>
      </div>
    </div>
  @endforeach;
</div>
@endsection