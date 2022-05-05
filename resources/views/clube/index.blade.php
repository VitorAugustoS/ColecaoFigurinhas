@extends("templates.main")

@section("titulo", "Clubes")

@section("formulario")

    <br />
    <h1>Cadastro de Clubes</h1>
    <br />

    <form method="POST" action="/clube" class="row" enctype="multipart/form-data">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control"/>

        <label for="escudo">Escudo:</label>
        <input type="file" id="escudo" name="escudo" class="form-control"/>

        @csrf
        <div class="form-group">
            
        </div>
        <input type="hidden" id="id" name="id" value="{{ $clube->id }}" />
        <a href="/clube" class="btn-primary">
            <i class="bi bi-plus-square">Novo</i>
        </a>

        <button type="submit" class="btn btn-success">Salvar</button>
        
    </form>

@endsection

@section("tabela")
    
    <br />
    <h1>Lista de Clubes</h1>
    <br />

    <table class="table table-striped">

        <colgroup>
            <col width="25%">
            <col width="25%">
            <col width="25%">
            <col width="25%">
        </colgroup>

        <thead>
            <tr>
                <th>Nome</th>
                <th>Escudo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

@endsection