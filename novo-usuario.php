<?php
    session_start();
?>

<h1>Novo Usuário</h1>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="action" value="cadastrar">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" autofocus
            <?php 
                if(!empty($_SESSION['value_nome'])){
                    echo"value='".$_SESSION['value_nome']."'";
                    unset($_SESSION['value_nome']);
                }
            ?>
        >
            <?php 
                if(!empty($_SESSION['vazio_nome'])){
                    echo "<p style='color: #f00;'" . $_SESSION['vazio_nome']. "</p>";
                    unset($_SESSION['vazio_nome']);
                }
            ?>
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control"
            <?php 
                if(!empty($_SESSION['value_email'])){
                    echo"value='".$_SESSION['value_email']."'";
                    unset($_SESSION['value_email']);
                }
            ?>
        >
        <?php 
            if(!empty($_SESSION['vazio_email'])){
                 echo "<p style='color: #f00;'" . $_SESSION['vazio_email']. "</p>";
                unset($_SESSION['vazio_email']);
            }
        ?>    
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control"
            <?php 
                if(!empty($_SESSION['value_senha'])){
                    echo"value='".$_SESSION['value_senha']."'";
                    unset($_SESSION['value_senha']);
                }
            ?>    
        >
        <?php 
            if(!empty($_SESSION['vazio_senha'])){
                 echo "<p style='color: #f00;'" . $_SESSION['vazio_senha']. "</p>";
                unset($_SESSION['vazio_senha']);
            }
        ?>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc" class="form-control"
        
            <?php 
                if(!empty($_SESSION['value_data'])){
                    echo"value='".$_SESSION['value_data']."'";
                    unset($_SESSION['value_data']);
                }
            ?>
        >
        <?php 
            if(!empty($_SESSION['vazio_data'])){
                echo "<p style='color: #f00;'" . $_SESSION['vazio_data']. "</p>";
                unset($_SESSION['vazio_data']);
            }
        ?>
    </div>
    <div class="mb-3">
    <input type="hidden" name="action" value="cadastrar">
        <button type="submit" class="btn btn-primary">Enviar</button> 
    </div>
</form>