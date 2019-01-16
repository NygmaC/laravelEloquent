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

    public function removeCategoriaById($id) {
        $categoria = Categoria::find($id);
        if(isset($categoria)) {
            $categoria->delete();
            return redirect('');
        }else {
            echo "<h1>Não encontrado</h1>";
        }

    }

    public function getCategoriasByNome($nome) {
        $categorias = Categoria::where('nome',$nome)->get();
        foreach ($categorias as $cat) {
            echo "Id: " . $cat->id;
            echo "Nome" . $cat->nome;

            echo "<br>";
        }
    }

    public function getCategoriasIdMaior($id) {
        $categorias = Categoria::where('id', '>',$id)->get();
        foreach ($categorias as $cat) {
            echo "Id: " . $cat->id;
            echo "Nome" . $cat->nome;

            echo "<br>";
        }   
    }

    public function getTodasCategorias() {
        $categorias = new Categoria();
        $cat = $categorias->getCategoriasIncluindoDeletadas();
        foreach ($cat as $cat) {
            echo "Id: " . $cat->id;
            echo "Nome" . $cat->nome;

            echo "<br>";
        }   
    }

    public function getTodasCategoriasById($id) {
        $categorias = new Categoria();
        $cat = $categorias->getCategoriasIncluindoDeletadas($id);
        if(isset($cat)) {
            $cat->restore();
            echo "Id: " . $cat->id;
            echo "Nome" . $cat->nome; 
            echo "<br>";
        }   
    }

    // => Deleta de forma permanente
    public function getTodasCategoriasByIdForceDelete($id) {
        $categorias = new Categoria();
        $cat = $categorias->getCategoriasIncluindoDeletadas($id);
        if(isset($cat)) {
            $cat->forceDelete();
            echo "Id: " . $cat->id;
            echo "Nome" . $cat->nome; 
            echo "<br>";
        }   
    }
}
