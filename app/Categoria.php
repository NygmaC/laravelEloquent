<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 

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

    public function getCategoriasIncluindoDeletadas() {
        return Categoria::withTrashed()->get();
    }

     public function getCategoriasIncluindoDeletadasById($id) {
        return Categoria::withTrashed()->find($id);
    }
}
 