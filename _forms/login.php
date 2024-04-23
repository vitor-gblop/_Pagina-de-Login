
<!-- 
    Pagina que contem apenas o formulario de login que permite o acesso a uma pagina externa
 -->
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auth</title>

        <script src='html_config/authApp.js'></script>
        <link rel="stylesheet" href="html_config/Style.css">
    </head>
    <body>
        <header>
            <!-- estetica -->
        </header>

        <!-- forms de login  -->
        <div class="forms_style">
            <!-- action -> ao apertar o botão submit uma variavel sera gerada com as informações e direcionada para o arquivo referenciado. method -> post(envio((acho))) -->
            <form action="../php_config/login_config.php" method="post" class="input_forms">
                <h1>Entrar</h1>
                <br>

                <input type="email" name="email" id="email_input" placeholder="Email" class="input_mod" required>
                <!-- campo email, necessario -->

                <br>

                <input type="password" name="senha" id="senha_input" placeholder="Senha" class="input_mod" required>
                <!-- campo senha, necessario -->

                <br>

                <input type="submit" value="Entrar" name="submit" id="auth_submit" 
                class="input_buttons_mod">
                <!-- botao para enviar os dados para confirmação(caso estejam no banco de dados) -->

                

                <div id="other_options">
                    <!-- link para a pagina de cadastro -->
                    <a href="signin.php">Cadastrar</a>
                </div>
            </form>
            
        </div>
        
    </body>
</html>