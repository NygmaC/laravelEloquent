<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inserir/{nome}','Categorias@setCadastro');
Route::get('/getCategorias','Categorias@getCategorias');
Route::get('/getCategoriasById/{id}','Categorias@getCategoriaById');