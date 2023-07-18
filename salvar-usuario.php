<?php
    session_start();
    include_once('config.php');
   
    if(empty($_POST['nome'])){
        $_SESSION['vazio_nome'] = 'campo nome é obrigatorio';
        echo "<script>location.href='?page=novo';</script>";
    }else{
        $_SESSION['value_nome'] = $_POST['nome'];
    }

    if(empty($_POST['email'])){
        $_SESSION['vazio_email'] = 'campo e-mail é obrigatorio';
        echo "<script>location.href='?page=novo';</script>";
    }else{
        $_SESSION['value_email'] = $_POST['email'];
    }

    if(empty($_POST['data_nasc'])){
        $_SESSION['vazio_data'] = 'campo de idade obrigatorio';
        echo "<script>location.href='?page=novo';</script>";
    }else{
        $_SESSION['value_data'] = $_POST['data'];
    }

    if(empty($_POST['senha'])){
        $_SESSION['vazio_senha'] = 'campo senha é obrigatorio';
        echo "<script>location.href='?page=novo';</script>";
    }else{
        $_SESSION['value_senha'] = $_POST['senha'];
    }
?>

<?php
switch ($_REQUEST["action"]) {
    case 'cadastrar':
        echo'cadastrar';
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) 
                VALUES (
               '{$nome}', '{$email}', '{$senha}', '{$data_nasc}')";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Cadastro com sucesso');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }else{
            echo "<script>alert('Não foi possivel concluir o cadastro');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        
        break;
    case 'editar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];
        $id = $_REQUEST["id"];
        

        $sql = "UPDATE cadastro.usuarios
        SET 
            nome='{$nome}', 
            email='{$email}', 
            senha='{$senha}', 
            data_nasc='{$data_nasc}'
        WHERE id={$id};";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Editado com sucesso');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }else{
            echo "<script>alert('Não foi possivel editar');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }

        break;

    case 'excluir':

        $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Excluido com sucesso');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }else{
            echo "<script>alert('Não foi possivel excluir');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        break;
}


