

/*
    Funcoes de envio de email e estetica

    *OBS: serviços de email estão comentados, defina o email de onde será enviado o email(gmail) e depois ative a API de envio de emails.

    Função - confirmMail
    {
        Recebe os campos de senha, confirmação de senha, nome e de email.
        Verifica se os valores digitados no campo de senha, email, nome estao corretos
        Verifica se os valores digitados no campo de senha e confirmar senha da pagina signin(cadastro) sao iguais.

        Se sim inicia o serviço da api do emailjs (necessita de cadastro), gera um numero aleatorio entre 0 e 999 para ser enviado, define os parametros da mensagem, realiza configurações esteticas da pagina e finalmente envia o email com os parametros passados
    }

    Função - secondStepVerification
    {
        Recebe o valor digitado no campo 'numero de confirmação'.
        Logo apos verifica se o valor e igual a variavel random que foi enviada ao email do usuario, se sim ativa o botao se submit para finalizar o cadastro senão, ignora.
    }

    Função - 
*/

let random;
function confirmMail()
{   
    let re = /[0-9]*5/g

    // armazena os inputs de senha e confirmação de senha num array
    const passes = [];
    passes[0] = document.getElementById("senha_1");
    passes[1] = document.getElementById("senha_2");

    // armazena nome e email nas respectivas variaveis, nome e email
    let nome = document.getElementById("user_input").value;
    let email = document.getElementById("email_input").value;

    // testa os valores dos inputs para 
    if(re.test(passes[0].value) && email != "" && nome != "")
    {
        if (passes[0].value == passes[1].value)
        {
            // emailjs.init("0caVJ0GwvPT-G52t2");
            // chave de inicialização da API 

            random = Math.floor(Math.random() * 1000);

            // define os parametros da mensagem
            let param = {
                from_email: "", // possivel erro caso nao definido.
                from_name: "Autenticador web",
                to_name: "Caro cliente",
                message: "seu numero de confirmação de acesso é: " + random,
                to: email
            }

            // ???
            document.getElementById("signin_email_div").style.display = "flex";
            document.getElementById("confirm_data").style.display = "none";

            // envia o email
            // --("chave publica da api", "modelo do email", parametros)--
            // emailjs.send("service_1mtbxqi","template_rtkmmgx",param)
            
            // .then(res => {
            //     window.alert("email sent succesfully");
            // });
        }
    }
    else
    {
        let a = document.getElementById("label_0");
        a.innerHTML = "Dados incompletos ou senhas difrentes"
    }
}

function secondStepVerification()
{
    console.log(random);
    // recebe o valor do campo de confirmação do email(codigo enviado no email)
    let a = document.getElementById("second_auth_step").value;

    // compara o código recebido com o que foi enviado.
    if (a == random)
    {
        let b = document.getElementById("end_submit");

        // ativa o botao de submit e permite o cadstro ou login
        b.disabled = false;
        // alert("ativa o submit");
    }
}

function updateHtml()
{
    let a = document.getElementById("label_1");
    a.innerHTML = "Dados enviados - e possivel fazer login"
}
