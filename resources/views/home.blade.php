@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header custom-bg">
                    Produtos cadastrados: {{ $contagem }}                    

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome do Produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor compra por unidade</th>
                                <th scope="col">Valor venda por unidade</th>
                                <th scope="col">Fornecedor</th>
                            </tr>
                        </thead>
                          {{-- APRESENTAR TODOS OS DADOS DA TABELA produtos --}}
                          
                                                   
                          <tbody>
                            @foreach ($produtos as $produto)
                              <tr>
                                <th scope="row">{{ $produto->id }}</th>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->quantidade }}</td>
                                <td>{{ $produto->valor_compra }}</td>
                                <td>{{ $produto->valor_venda }}</td>
                                <td>{{ $produto->fornecedor }}</td>
                                <td><a class="text-decoration-none" href="{{ route('produto.edit', $produto->id) }}"> EDITAR </a></td>
                                {{-- BOTÃO PARA APRESENTAR O MODAL DE REMOÇÃO --}}
                                <td> <a href="#" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $produto->id }}" onclick="document.getElementById('removeForm')" > REMOVER </a></td>
                                                                
                              </tr> 
                            @endforeach
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Remover registro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            Tem certeza que deseja remover o registro de ID: <span id="productId" ></span> ?
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            
                                            {{-- FORM DE REMOÇÃO --}}
                                            <form id="removeForm" action="{{ route('produto.destroy', $produto->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Remover</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- SCRIPT PARA CAPTURARMOS O ID QUE APRESENTAREMOS NO MODAL --}}
                            <script>
                                var myModal = document.getElementById('exampleModal');
                                myModal.addEventListener('show.bs.modal', function (event) {
                                    var button = event.relatedTarget;
                                    var productId = button.getAttribute('data-id');
                                    var modalProductId = myModal.querySelector('#productId');
                                    modalProductId.textContent = productId;
                                });
                            </script>
                            


                          </tbody>


                    </table>

                    {{-- PAGINATION ABAIXO --}}
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            <li class="page-item">

                                <a class="page-link" href="{{ $produtos->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                                                        
                            @for ($i = 1; $i <= $produtos->lastPage(); $i++)
                                                   
                            <li class="page-item {{$produtos->currentPage() == $i ? 'active' : ''}}">
                                <a class="page-link" href="{{ $produtos->url($i) }}">{{ $i }}</a>
                            </li>
                            
                            @endfor

                            <li class="page-item">
                                <a class="page-link" href="{{ $produtos->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            </ul>
                    </nav>

                    <div class="card-body d-flex justify-content-end">
                        <a class="btn btn-primary" href="{{ route('produto.create') }}"> Cadastrar </a>
                    </div>
                    
                    

               </div>
            </div>
        </div>
    </div>
</div>


@endsection
