<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;

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
    public function create()
    {
        return view('Clients/create');
    }
    public function store(ClientStoreRequest $request)
    {
        $data = $request->all();

        $clientModel = app(Client::class);
        $cpf = str_replace(".", "", $data['cpf']);
        $cpf = str_replace("-", "", $cpf);
        
        $client = $clientModel->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $cpf,
            'endereco' => $data['endereco'],
            'active_flag' => isset($data['active_flag']) ? true : false,
        ]);
        return redirect('/client')->with('success', 'Contact saved!');
    }
    public function edit($id){
        $clientModel = app(Client::class);
        $client = $clientModel->find($id);
        
        return view('Clients/edit', compact('client'));
    }
    public function update(ClientUpdateRequest $request,$id){
        $data = $request->all();
        $clientModel = app(Client::class);
        $client = $clientModel->find($id);
        $client->update([
            'name'=> $data['name'],
            'cpf'=>preg_replace("/[^A-Za-z0-9]/", "",$data['cpf']) ,
            'email'=>$data['email'],
            'endereco'=>$data['endereco'] ?? null,
           'active_flag'=> (($data['active_flag'] ?? ' ') == null),
        ]);
        return redirect()->route('client.index');
    }

    public function destroy($id)
    {
        if (!empty($id)) {
            $clientModel = app(Client::class);
            $client = $clientModel->find($id);
            if (!empty($client)) {
                $client->delete();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Cliente deletado com sucesso.',
                    'reload'  => true,
                ]);
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Cliente não encontrado.',
                    'reload'  => true,
                ]);
            }
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'ID não está na requisição',
                'reload'  => true,
            ]);
        }
    }

}
