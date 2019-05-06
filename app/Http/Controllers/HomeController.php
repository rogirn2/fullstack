<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\Cliente;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        /*$user = User::all();

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cliente = Cliente::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cliente = Cliente::latest()->paginate($perPage);
        }

        return view('user.auth.home', compact('cliente', 'user'));*/
        //return view('user.auth.home');
        $user = User::all();


        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cliente = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cliente = User::where('admin',0)->latest()->paginate($perPage);
        }

        return view('cliente.index', compact('cliente', 'user'));
    }
}
