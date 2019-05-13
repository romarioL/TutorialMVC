<form name="formCadastro"action="<?php echo DIRPAGE . 'cadastro/cadastrar'; ?>" id="formCadastro" method="post">
	Nome: <input type="text" name="nome" id="nome"><br>
	Sexo: <select  name="sexo" id="sexo">
		<option value="Feminino">Feminino</option>
		<option value="Masculino">Masculino</option>
	</select><br>
	Cidade: <input type="text" name="cidade" id="cidade"><br>

	<input type="submit" value="Enviar">
</form>


<hr>

<br>
<br>
<br>

<h1> Seleção de dados:</h1>

<form name="formSelect"action="<?php echo DIRPAGE . 'cadastro/seleciona'; ?>" id="formSelect" method="post">
	Nome: <input type="text" name="nome" id="nome"><br>
	Sexo: <select  name="sexo" id="sexo">
		<option value="Feminino">Feminino</option>
		<option value="Masculino">Masculino</option>
	</select><br>
	Cidade: <input type="text" name="cidade" id="cidade"><br>

	<input type="submit" value="Pesquisar">
</form>

<div class="resultado"></div>