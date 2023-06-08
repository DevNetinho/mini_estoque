<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::paginate(5); //Apresentar todos os dados paginados
        $contagem = Produto::count(); //TOTAL DE DADOS CADASTRADOS

        return view('home', ['produtos' => $produtos, 'contagem' => $contagem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //VALIDAÇÃO DE DADOS
        $regras = [
            'nome' => 'required|min:2|max:100',
            'quantidade' => 'required|max:15|numeric',
            'valor_compra' => 'required|numeric',
            'valor_venda' => 'required|numeric',
            'fornecedor' => 'required|min:2|max:100'
        ];

        $feedback = [
            'nome.required' => 'Obrigatório inserir nome',
            'nome.min' => 'Insira valor de no mínimo 2 caracteres',
            'quantidade.required' => 'Obrigatório inserir a quantidade',
            'quantidade.numeric' => 'Este campo aceita apenas valores numéricos',
            'valor_compra.required' => 'Obrigatório inserir o valor de compra',
            'valor_compra.numeric' => 'Este campo aceita apenas valores numéricos',
            'valor_venda.required' => 'Obrigatório inserir o valor de venda',
            'valor_venda.numeric' => 'Este campo aceita apenas valores numéricos',
            'fornecedor.required' => 'Obrigatório inserir um fornecedor',
            'fornecedor.min' => 'Insira o valor de no mínimo 2 caracteres'

        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all()); //CRIAR REGISTRO NO BANCO DE DADOS.

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto) //RETORNA A VIEW DE EDIÇÃO QUE ENVIARÁ UMA REQ. POST PARA update()
    {        

        return view('produto.edit', [ 'produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto) //ENCARREGADO DE ATUALIZAR O REGISTRO E VALIDAR OS DADOS
    {
        $produto->update($request->all()); //QUERY PARA ATUALIZAÇÃO COM BASE NA REQUEST ENVIADA.

        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        
        $produto->delete(); //DELETAR REGISTRO DO BD, TODOS OS DADOS DESTE REGISTRO JÁ FORAM ENVIADOS PELO FORM PARA $produto

        
        return redirect()->route('produto.index');
    }
}
