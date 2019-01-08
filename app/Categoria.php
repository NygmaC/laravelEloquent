<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function insert($nome) {
    	$cat = new Categoria();
    	$cat->nome = $nome;
    	$cat->save();
    }

    public function getCategorias() {
    	return Categoria::all();
    }

    public function getCategoriaById($id) {
    	return Categoria::findorFail($id);
    }
}
 