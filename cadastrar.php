<?php 
    include_once "conexao.php";

    $conexaoComBanco = abrirBanco();

  if($_SERVER ['REQUEST_METHOD'] == "POST") {
    $nome = $_POST ['nome'];
    $sobrenome = $_POST ['sobrenome'];
    $nascimento = $_POST ['nascimento'];
    $endereco = $_POST ['endereco'];
    $telefone = $_POST ['telefone'];

    $conexaoComBanco = abrirBanco();


    $sql = "insert into pessoas (nome, sobrenome, nascimento, endereco, telefone)
            values ('$nome', '$sobrenome', '$nascimento', '$endereco', '$telefone')";

    if ($conexaoComBanco->query($sql) === TRUE){
        echo "Contato salvo com sucesso!!!";
    } else {
        echo "Contato nao foi salvo no banco de dados" . $conexaoComBanco->error;
    }

    fecharBanco($conexaoComBanco);

  }

?>   



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <h1>Agenda de Contatos</h1>
        <nav>
            <ul>
                <li> <a href="index.php">Home</a></li>
                <li> <a href="cadastrar.php">Cadastrar</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Cadastro de Pessoas</h2>
        <form action="" method="POST">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome" name="nome" required>


            <label for="sobrenome">Sobrenome</label>
            <input type="text" placeholder="Sobrenome" name="sobrenome" required>


            <label for="nascimento">Nascimento</label>
            <input type="date" placeholder="Ex.. 17/04/2013" name="nascimento" required>


            <label for="endereco">Endereço</label>
            <input type="text" placeholder="Endereço" name="endereco" required>


            <label for="telefone">Telefone</label>
            <input type="text" placeholder="( ) 0 0000-0000" name="telefone" required>

            <button type="submit">Salvar</button>

        </form>
    </section>
</body>
</htelefone