<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Cache;
use App\Galery;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator;
use File;
use \Auth;


class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function fazerLogin()
    {   
        return view('user.login');
    }

    public function index(Request $request)
    {
      //dd($request->all());
      $data = [
        'email'    => $request->get('username'),
        'password' => $request->get('password')
      ];

      //dd($data);

      try
      {
        if(Auth::attempt($data, true))
        {
          $imagens = Galery::all();
          return view('galery.index')->with('galery',$imagens);
        }
        
      }
      catch (\Exception $e)
      {
        return $e->getMessage();
      }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      return view('galery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $mensagens = [
          'titulo.required' => 'Você não colocou o título no texto.',
          'imagem.required' => 'Você não colocou a imagem no texto.',
          'imagem.mimes' => 'Somente imagem no formato de jpeg e png.',
      ];

      $validator = Validator::make(Input::all(),[
        'titulo'=>'required',
        'imagem'=>'required|mimes:jpeg,png',
      ]);

      if($validator->fails()){
        return back()->withErrors($validator);
      }

      if(Input::file('imagem'))
      {
        $imagem = Input::file('imagem');
        $extensao = $imagem->getClientOriginalExtension();
        if($extensao != 'jpg' && $extensao != 'png')
        {
          return back()->with('erro','Erro: Este arquivo não é imagem');
        }
      }
      $galery = new Galery;
      $galery->titulo = Input::get('titulo');
      $galery->imagem = "";
      $galery->save();
      if(Input::file('imagem'))
      {
        File::move($imagem,public_path().'/img/galery-id_'.$galery->id.'.'.$extensao);
        $galery->imagem = '/img/galery-id_'.$galery->id.'.'.$extensao;
        $galery->save();
      }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $galery = Galery::find($id);
      File::delete(public_path().$galery->imagem);
      $galery->delete();
      return view('galery.index');
    }

    

}