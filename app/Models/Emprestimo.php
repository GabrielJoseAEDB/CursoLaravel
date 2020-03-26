<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = [
        'data_emprestimo', 'qtd_dias', 'id_book', 'id_client', 
    ];
    public function livro(){
        return $this->hasOne('App\Models\Book');
    }
}
