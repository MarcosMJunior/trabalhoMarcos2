<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>Formulário de Cadastro</title>
</head>
<body>


<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?> method="post">
    <h1>Formulário inscrição</h1>
  <label for="nome">Nome:</label>
  <input type="text" id="nome" name="nome" required>

  <br>

  <label for="cpf">CPF:</label>
  <input type="text" id="cpf" name="cpf"  placeholder="000.000.000-00" required>

  <br>

  <label for="telefone">Telefone:</label>
  <input type="tel" id="telefone" name="telefone" placeholder="(99) 99999-9999" required>

  <br>

  <label for="data_nascimento">Data de Nascimento:</label>
  <input type="date" id="data_nascimento" name="data_nascimento" required>

  <br>

  <label for="email">E-mail:</label>
  <input type="email" id="email" name="email" placeholder="formulario@mail.com" required>

  <br>

  <input type="checkbox" id="status" name="status">
  <label for="aceito_termos">Você é estudante?</label>

  <br>

  <input type="submit" value="Enviar">
</form>
<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $dataNascimento = $_POST["data_nascimento"];
    $telefone = $_POST["telefone"];
    $status = isset($_POST["status"]) ? "sim" : "não";
     $date = new DateTime($dataNascimento);
     $interval= $date->diff( new DateTime(date("y-m-d")));
     $idade = $interval->format("%Y");
    echo "Eu $nome, $status sou estudante. Meu número de cpf é $cpf, nasci em $dataNascimento e tenho $idade anos de idade .Meu telefone pra contato é $telefone e meu email é $email.";

  } elseif($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_POST)){
  echo"Erro! Formulário não enviado";
  };
?>
</body>
</html>
