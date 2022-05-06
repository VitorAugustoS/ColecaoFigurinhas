@extends("templates.main")

@section("titulo", "Clubes")

@section("formulario")

    <br />
    <h1>Cadastro de Clubes</h1>
    <br />

    <form method="POST" action="/clube" class="row" enctype="multipart/form-data">
		
		<div class="form-group col-8">
		
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" @class([ "form-control", "is-invalid" => ($errors->first("nome") != "") ]) value="{{ $clube->nome }}" />

			<div class="invalid-feedback">
				{{ $errors->first("nome") }}
			</div>
			
			<label for="escudo">Escudo:</label>
			<input type="file" id="escudo" name="escudo" @class([ "form-control", "is-invalid" => ($errors->first("escudo") != "") ]) />
		
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
            <col width="35%">
            <col width="35%">
            <col width="15%">
            <col width="15%">
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
            @foreach ( $clubes as $clube )
                <tr>
                    <td>{{ $clube->nome }}</td>
                    <td> <img src="{{ str_replace("public/", "storage/", $clube->escudo) }}" style="width: 100px;" /> </td>
                    <td>
                        <a href="/clube/{{ $clube->id }}/edit" class="btn btn-warning">
							<i class="bi bi-pencil-square"></i> Editar
						</a>
                    </td>
                    <td>
                        <input type="hidden" name="_method" value="DELETE" />
						<button type="button" class="btn btn-danger" onclick="excluir(this);">
							<i class="bi bi-trash"></i> Excluir
						</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

<script>
	function excluir(btn) {
		Swal.fire({
			"title": "Deseja realmente excluir?",
			"icon": "warning",
			"showCancelButton": true,
			"confirmButtonColor": "#3085d6",
			"cancelButtonColor": "#d33",
			"cancelButtonText": "Cancelar",
			"confirmButtonText": "Confirmar"
		}).then(function(result){
			if (result.isConfirmed) {
				$(btn).parents("form").submit();
			}
		});
	}
</script>