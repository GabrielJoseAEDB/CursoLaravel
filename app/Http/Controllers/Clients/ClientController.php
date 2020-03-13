<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientStoreRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clientModel = app(Client::class);
        $clients = $clientModel->all();
        //$clients = $clientModel->find(1);//Pesquisar com id
        //$clients = $clientModel->where('cpf',11111111112)->get();//Pesquisar de acordo com o que você selecionar
        //dd($clients);

        return view('Clients/index', compact('clients'));
    }
    public function store(ClientStoreRequest $request){
        $data = $request->all();
            
        $clientModel = app(Client::class);
        $cpf = str_replace(".", "", $data['cpf']);
        $cpf = str_replace("-", "", $cpf);
        
        $client = $clientModel->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $cpf,
            'endereco' => $data['endereco'],
            'active_flag' => isset($data['active_flag'])?true:false
        ]);
        return redirect('/client')->with('success', 'Contact saved!');
    }
    public function edit($id){
        
    }
    public function create(){
        return view('Clients/create');
    }
}
