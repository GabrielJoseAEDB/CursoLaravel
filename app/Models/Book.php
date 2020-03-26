<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'writer', 'page_number', 
    ];
    public function emprestado(){
        return $this->belongsTo('App\Models\Emprestimo');
    }
}
