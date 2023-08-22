<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Validator;

class cadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $dadosCadastro = Cadastro::all();
        $contador = $dadosCadastro->count();

        return 'A quantidade de Contas Cadastradas foi de '. $contador . ' - ' . $dadosCadastro;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dadosCadastro = $request->all();
        $validador = Validator::make($dadosCadastro, [
            'nome' => 'required',
            'email' => 'required',
            'nasc' => 'required',
            'celular' => 'required',
            'senha' => 'required'
        ]);

        if($validador->fails()){
            return 'Registro Inválido!'. $validador->erros(true) . 500;
        }

        $registroCadastro = Cadastro::create($dadosCadastro);
        if ($registroCadastro){
            return 'Cadastro Realizado' . $registroCadastro . 201;
        }
        else{
            return 'Erro ao cadastrar o Registro' . 500;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
