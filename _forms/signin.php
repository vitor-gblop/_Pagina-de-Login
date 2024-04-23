
<!-- 
    Pagina de cadastro, pega as informações do formulario e leva ao banco de dados
 -->
<?php
    // se houver a variavel submit adiciona 
    if(isset($_POST["submit"]))
    {
        // debug: 

        // print_r($_POST["nome"]);
        // print_r($_POST["email"]);
        // print_r($_POST["senha"]);


        // adiciona um caminho para o arquivo de que realiza a conexão de banco de dados
        include_once('../php_config/link_config.php');

        // pega os dados que foram passados e guarda em variaveis para serem usadas na hora de enviar os dados
        $_nome = $_POST['nome'];
        $_email = $_POST['email'];
        $_senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$_email'";

        $result = $link->query($sql);

        // se o resultado de msqli_num_rows maior que um informaçãp esta no banco de dados e o usuario pode ser redirecionado
        if (mysqli_num_rows( $result ) > 0)
        {
            header("Location: login.php");
        }
        else
        {
            // envia os dados ao banco de dados
            $result = mysqli_query($link,"INSERT INTO usuarios(nome,email,senha) VALUES('$_nome','$_email','$_senha')");
            
        }


        // TODO
        /*
        verificar se o dado ja foi adicionado a o banco de dados e
        entao redirecionar para a pagina de login

        */

        
    }
?>

<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auth</title>

        <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

        <script src='html_config/authApp.js'></script>
        <link rel="stylesheet" href="html_config/Style.css">
    </head>
    <body>

        <header>
            <!-- estetica -->
        </header>
        <!-- forms de cadastro  -->
        <div class="forms_style">
            <!-- action -> ao apertar o botão submit uma variavel sera gerada com as informações e direcionada para o arquivo referenciado. method -> post(envio((acho))) -->
            <form action="signin.php" method="POST" class="input_forms">
                <h1>Cadastrar</h1>
                <br>
                <input type="text" name="nome" id="user_input" placeholder="Nome" class="input_mod" required>
                <!-- campo de nome ou usuario, necessario -->

                <br>

                <input type="email" name="email" class="input_mod" id="email_input" placeholder="Email" required>
                <!-- campo de email, necessario -->

                <br>

                <input type="password" name="senha" class="input_mod" id="senha_1" placeholder="Crie uma senha">
                <!-- campo de senha, necessario -->

                <br>

                <input type="password" name="confirma_senha" class="input_mod" id="senha_2"
                placeholder="Digite novamente sua senha" required>
                <!-- campo de confirmação de senha, necessario -->

                <br>
                <p id="label_0"></p>
                <br>


                <input type="button" value="Confirmar Email" class="signin_submit" id="confirm_data" onclick="confirmMail()">
                <!-- envia um email de confirmação para o email adicionado -->
                
                <div id="signin_email_div" class="email_confirm">
                    <br>

                    <input type="text" name="second_auth_step" id="second_auth_step" placeholder="Codigo de confirmação " class="input_mod" onchange="secondStepVerification()">
                    <!-- verifica o email com um codigo -->

                    <br>
                    <br>

                    <input type="submit" value="Salvar" id="end_submit" name="submit" 
                    class="signin_submit" disabled onclick="updateHtml()">
                    <!-- botao que e ativado se tudo estiver certo -->

                    <br>
                    <p id="label_1"></p>
                    <br>


                </div>
                <!-- div para guardar os campos invisiveis de confirmação que são ativados quando se submete dados para cadastro -->

                
                <div id="other_options">
                    <a href="login.php">Entrar</a>
                </div>
                <!-- div para outras opções como termos e outros  formas de fazer login-->
            </form>
            
            
        </div>
        
    </body>
</html>