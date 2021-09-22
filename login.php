<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>LOGIN E CADASTRO DE USUÁRIOS</title>
	</head>
	<body>
		<h2>LOGIN</h2>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			if(isset($_SESSION['msgcad'])){
				echo $_SESSION['msgcad'];
				unset($_SESSION['msgcad']);
			}
		?>
		<form method="POST" action="valida.php">
			<label>Usuário</label>
			<input type="text" name="usuario" placeholder="Digite o seu usuário"><br><br>
			
			<label>Senha</label>
			<input type="password" name="senha" placeholder="Digite a sua senha"><br><br>
			
			<input type="submit" name="btnLogin" value="Acessar">
			
			<h4>Ainda não é cadastrado?</h4>
			<a href="cadastrar.php">Cadastre-se</a>
		
		</form>
	</body>
</html>