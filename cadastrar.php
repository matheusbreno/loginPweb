<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
					'" .$dados['nome']. "',
					'" .$dados['email']. "',
					'" .$dados['usuario']. "',
					'" .$dados['senha']. "'
					)";
	$resultado_usario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
		header("Location: login.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuário";
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CADASTRAR</title>
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
		<form method="POST" action="">
			<label>Nome</label>
			<input type="text" name="nome" placeholder="Nome e sobrenome"><br><br>

            <label>Email</label>
			<input type="text" name="email" placeholder="Email"><br><br>

            <label>Usuário</label>
			<input type="text" name="usuario" placeholder="Usuário"><br><br>
			
			<label>Senha</label>
			<input type="password" name="senha" placeholder="Senha"><br><br>
			
			<input type="submit" name="btnCadUsuario" value="Cadastrar"><br><br>
			
    
			Para fazer login <a href="login.php">clique aqui</a>
		
		</form>
	</body>
</html>