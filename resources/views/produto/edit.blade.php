@extends('layouts.estilo')

@section('conteudo')
    


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-2">
                {{-- custom-bg - PARA PODERMOS MODIFICAR PARA A COR DE NOSSA PREFERÊNCIA, PRECISAMOS CRIAR UMA CLASSE NO CSS CHAMADA .custom-bg, FIZEMOS ISSO NO ARQUIVO estilo.blade --}}
                <div class="card-header custom-bg">
                    Editar dados do produto
                </div>
                {{-- FORM DE CADASTRO --}}
                <form method="post" action="{{ route('produto.update', $produto->id) }}">
                    @csrf
                    @method('PUT') 
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do produto</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome do produto" maxlength="100" value="{{ $produto->nome }}">
                        </div>

                        
                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Número" value="{{ $produto->quantidade }}" >
                        </div>

                        <div class="mb-3">
                            {{-- ABAIXO, TEMOS UM INPUT QUE ACEITARÁ OS VALORES EM REAL --}}
                            <label for="valor_compra" class="form-label">Valor de compra unitário</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="valor_compra" name="valor_compra" placeholder="0.00" value="{{ $produto->valor_compra }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            {{-- MESMO PROCEDIMENTO FEITO ACIMA --}}
                            <label for="valor_venda" class="form-label">Valor de venda unitário</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="valor_venda" name="valor_venda" placeholder="0.00" value="{{ $produto->valor_venda }}">
                            </div>
                        </div>

                        {{-- LIMITAMOS O USO DE CARACTERES --}}
                        <div class="mb-3">
                            <label for="fornecedor" class="form-label">Nome do fornecedor</label>
                            <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Insira o nome do fornecedor" maxlength="100" value="{{ $produto->fornecedor }}">
                        </div>

                        {{-- ESTA DIV SERVE PARA POSICIONARMOS OS BOTÕES A DIREITA DO CARD. --}}
                        <div class="card-body d-flex justify-content-between">
                            
                            {{-- BOTÃO PARA VOLTAR --}}                            
                            <a href="{{ url()->previous() }}" class="btn btn-primary "> Voltar </a>                            
                            {{-- BOTÃO DE CADASTRO --}}
                            <button type="submit" class="btn btn-primary ml-auto"> Atualizar </button>                                                        
                        </div>


                    </form>

               </div>
            </div>
        </div>
    </div>
</div>


@endsection