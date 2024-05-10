<?php 
    include_once "conexao.php";
    include_once "funcoes.php";

    if(isset($_GET ['id']) && $_GET['id'] > 0)  {
        $id = $_GET['id'];

        $conexaoComBanco  = abrirBanco();

        $pegarDados = $conexaoComBanco->prepare("SELECT * FROM pessoas WHERE id = ?");
        $pegarDados -> bind_param("i" ,$id);
        $pegarDados-> execute();
        $result = $pegarDados->get_result();
        

        if($result->num_rows == 1) {
            $registro = $result->fetch_assoc();
        }
        fecharBanco($conexaoComBanco);


        if($_SERVER ['REQUEST_METHOD'] == "POST") {
             
            
            $id = $_POST ['id'];
            $nome = $_POST ['nome'];
            $sobrenome = $_POST ['sobrenome'];
            $nascimento = $_POST ['nascimento'];
            $endereco = $_POST ['endereco'];
            $telefone = $_POST ['telefone'];
        
            $conexaoComBanco = abrirBanco();
        
        
            $sql = "UPDATE pessoas SET nome = '$nome', sobrenome = '$sobrenome', nascimento = '$nascimento', endereco = '$endereco', telefone = '$telefone'
            WHERE id = $id";
        
            if ($conexaoComBanco->query($sql) === TRUE){
                echo "Contato Atualizado com sucesso!!!";
            } else {
                echo "Nao foi possivel atualizar o contato" . $conexaoComBanco->error;
            }
        
            fecharBanco($conexaoComBanco);
        
          }

        // dd($registro);
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
        <h2>Atualizar contatos</h2>
        <form action="" method="POST">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome" name="nome" value="<?= $registro ['nome'] ?>" required>


            <label for="sobrenome">Sobrenome</label>
            <input type="text" placeholder="Sobrenome" name="sobrenome" value="<?= $registro ['sobrenome'] ?>" required>


            <label for="nascimento">Nascimento</label>
            <input type="date" placeholder="Ex.. 17/04/2013" name="nascimento" value="<?= $registro ['nascimento'] ?>" required>


            <label for="endereco">Endereço</label>
            <input type="text" placeholder="Endereço" name="endereco" value="<?= $registro ['endereco'] ?>" required>


            <label for="telefone">Telefone</label>
            <input type="text" placeholder="( ) 0 0000-0000" name="telefone" value="<?= $registro ['telefone'] ?>" required>

            <input type="hidden" name="id" value="<?= $registro['id']?>">


            <button type="submit">Atualizar</button>

        </form>
    </section>
</body>
</htelefone