@extends("templates.main")

@section("titulo", "Jogador")

@section("formulario")

    <br />
    <h1>Cadastro de Jogadores</h1>
    <br />

    <form method="POST" action="/jogador" class="row" enctype="multipart/form-data">
		
		<div class="form-group col-8">
		
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" @class([ "form-control", "is-invalid" => ($errors->first("nome") != "") ]) value="{{ $jogador->nome }}" />

			<div class="invalid-feedback">
				{{ $errors->first("nome") }}
			</div>

            <label for="dataNascimento">Data de Nascimento:</label>
			<input type="date" id="dataNascimento" name="dataNascimento" @class([ "form-control", "is-invalid" => ($errors->first("nome") != "") ]) value="{{ $jogador->dataNascimento }}" />

			<div class="invalid-feedback">
				{{ $errors->first("dataNascimento") }}
			</div>
			
		</div>

        <div class="form-group col-8">
			<label for="clube_id">Clube:</label>
			<select id="clube_id" name="clube_id" class="form-control" required>
				<option value=""></option>
				@foreach ($clubes as $clube)
					<option value="{{ $clube->id }}" @if ($clube->id == $jogador->clube_id) selected @endif>{{ $clube->nome }}</option>
				@endforeach
			</select>
		</div>

        <div class="form-group col-8">
			<label for="posicao_id">Posição:</label>
			<select id="posicao_id" name="posicao_id" class="form-control" required>
				<option value=""></option>
				@foreach ($posicaos as $posicao)
					<option value="{{ $posicao->id }}" @if ($posicao->id == $jogador->posicao_id) selected @endif>{{ $posicao->nome }}</option>
				@endforeach
			</select>
		</div>
		
        <div class="form-group col-4">
			@csrf
			
			<input type="hidden" id="id" name="id" value="{{ $jogador->id }}" />
			<a href="/jogador" class="btn btn-primary" style="margin-top: 23px; margin-left: 25%;">
				<i class="bi bi-plus-square"></i> Novo
			</a>

			<button type="submit" class="btn btn-success" style="margin-top: 23px;">
				<i class="bi bi-save"></i> Salvar
			</button>
        </div>
        
    </form>

@endsection

@section("tabela")
    
    <br />
    <h1>Lista de Posições</h1>
    <br />

    <table class="table table-striped">

        <colgroup>
            <col width="17.5%">
            <col width="17.5%">
            <col width="17.5%">
            <col width="17.5%">
            <col width="15%">
            <col width="15%">
        </colgroup>

        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Clube</th>
                <th>Posição</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $jogadors as $jogador )
                    <tr>
                        <td>{{ $jogador->nome }}</td>
                        <td>{{ $jogador->dataNascimento }}</td>
                        <td>{{ $jogador->nome_clube }}</td>
                        <td>{{ $jogador->nome_posicao }}</td>
                        
                        <td>
                            <a href="/jogador/{{ $jogador->id }}/edit" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="/jogador/{{ $jogador->id }}">

                                @csrf

                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="button" class="btn btn-danger" onclick="excluir(this);">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>

                            </form>
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