<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class Categorias extends Controller
{
    public function setCadastro($nome) {
    	$cat = new Categoria();
    	$cat->insert($nome);
    	return redirect('/getCategorias');
    }

    public function getCategorias() {
    	$cat = new Categoria();
    	$categorias = $cat->getCategorias();

    	foreach ($categorias as $cat) {
    		echo "Id: " . $cat->id. "<br>";
    		echo "Nome: " . $cat->nome. "<br><br>";
    	}
    }

    public function getCategoriaById($id) {
    	$cat = new Categoria();
    	$categoria = $cat->getCategoriaById($id); 
    	echo "Id: " . $categoria->id. "<br>";
    		echo "Nome: " . $categoria->nome. "<br><br>";
    }
}
