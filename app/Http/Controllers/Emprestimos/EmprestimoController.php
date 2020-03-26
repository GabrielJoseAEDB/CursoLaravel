<?php

namespace App\Http\Controllers\Emprestimos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Emprestimo;

class EmprestimoController extends Controller
{
    public function index()
    {
        $EmprestimoModel = app(Emprestimo::class);
        $emprestimos = $EmprestimoModel->all();
        //$Emprestimos = $EmprestimoModel->find(1);//Pesquisar com id
        //$Emprestimos = $EmprestimoModel->where('cpf',11111111112)->get();//Pesquisar de acordo com o que você selecionar
        //dd($Emprestimos);
        $teste = $EmprestimoModel->find(1);
        //dd($teste);
        $teste = $teste->livro();
        dd($teste);
        return view('Emprestimos/index', compact('emprestimos'));
    }
    public function create()
    {
        return view('Emprestimos/create');
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $EmprestimoModel = app(Emprestimo::class);
        
        $Emprestimo = $EmprestimoModel->create([
            'data_emprestimo' => $data['data_emprestimo'],
            'qtd_dias' => $data['qtd_dias'],
            'id_book' => $data['id_book'],
            'id_client' => $data['id_client'],
        ]);
        return redirect('/emprestimo')->with('success', 'Contact saved!');
    }
}
