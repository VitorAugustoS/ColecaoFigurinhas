@extends("templates.main")

@section("titulo", "Clubes")

@section("formulario")

    <br />
    <h1>Cadastro de Clubes</h1>
    <br />

    <form method="POST" action="/clube" class="row" enctype="multipart/form-data">
		
		<div class="form-group col-8">
		
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" @class([ "form-control", "is-invalid" => ($errors->first("nome") != "") ])/>

			<div class="invalid-feedback">
				{{ $errors->first("nome") }}
			</div>
			
			<label for="escudo">Escudo:</label>
			<input type="file" id="escudo" name="escudo" @class([ "form-control", "is-invalid" => ($errors->first("escudo") != "") ])/>
		
			<div class="invalid-feedback">
				{{ $errors->first("escudo") }}
			</div>
		</div>
		
        <div class="form-group col-4">
			@csrf
			
			<input type="hidden" id="id" name="id" value="{{ $clube->id }}" />
			<a href="/clube" class="btn btn-primary" style="margin-top: 55px; margin-left: 25%;">
				<i class="bi bi-plus-square"></i> Novo
			</a>

			<button type="submit" class="btn btn-success" style="margin-top: 55px;">
				<i class="bi bi-save"></i> Salvar
			</button>
        </div>
        
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