<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

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
    public function store(Request $request){
        $clientModel = app(Client::class);
        $client = $clientModel->create([
            'name' => 'novo teste 2',
            'cpf' => 11111111112,
            'email' => 'testeusuario@email.com',
            'active_flag' => false
        ]);
        $clientModel = app(Client::class);
        $clients = $clientModel->all();
        return redirect('/clients')->with('success', 'Contact saved!');
    }
    public function create(){
        return view('Clients/create');
    }
}
