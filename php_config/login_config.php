
<?php
    if(isset($_POST["submit"]) )
    {
        include_once("link_config.php");

        $_email = $_POST["email"];
        $_senha = $_POST["senha"];

        // debug
        // print_r("email: ".$_email);
        // print_r("\nsenha: ".$_senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$_email' and senha = '$_senha'";

        $result = $link->query($sql);

        // debug 
        // print_r($sql);
        // print_r($result);

        // se o resultado de msqli_num_rows maior que um informaçãp esta no banco de dados e o usuario pode ser redirecionado
        if (mysqli_num_rows( $result ) > 0)
        {
            header("Location: ../_landpage/landPage.html");
        }
        // senao pode ser redirecionado para a pagina de cadastro
        else{
            header("Location: ../_forms/login.php");
        }

        //TODO
        // criar sessoes
       
    }
    else
    {
        // move a pagina que faz referencia para o caminho especificado
        header("Location: ../_forms/login.php");
    }

?>