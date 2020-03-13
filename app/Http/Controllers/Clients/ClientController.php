<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $clientModel = app(Client::class);

        $clients = $clientModel->all();

        //$clients = $clientModel->find(1);

        //$clients = $clientModel->where('cpf',1234567869)->get();




        return view('Clients/index', compact('clients'));
    }

    public function create(){
        return view('Clients/create');
       
        //$clientModel = app(Client::class);
        //$client = $clientModel->create([
          //  'name'=> 'name teste2',
          //  'CPF'=> 1234567869,
          // 'Email'=> 'teste2@gmail.com',
          //  'active_flag'=> false,
        //]);
        //return view('Painel.Products.ProductCrud', compact('productCategories', ))
        //dd($client);
    }

    public function store(ClientStoreRequest $request){
        $data = $request->all();


        $clientModel = app(Client::class);
        $client = $clientModel->create([
          'name'=> $data['name'],
          'CPF'=>preg_replace ("/[^A-Za-z0-9]/", "",$data['cpf']),
          'Email'=> $data['email'],
          'Endereco'=> $data['endereco'] ?? null        
          ]);
        return redirect()->route('clients.index');
        //dd($data['cpf']);
    }

}
