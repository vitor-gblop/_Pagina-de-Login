

/*
    Funcoes de envio de email e estetica

    *OBS: serviços de email comentados(linha 45), defina de onde sera enviado o email(gmail)(linha 34) e depois ative o serviço de envio

    linha 10 - função de confirmação de email
    {
        Recebe os campos de senha, confirmação de senha, nome e de email.(linhas 29 a 34)
        Verifica se os valores digitados no campo de senha, email, nome estao corretos(linha 36)
        Verifica se os valores digitados no campo de senha e confirmar senha da pagina signin(cadastro) sao iguais(linha 38).

        Se sim inicia o serviço da api do emailjs (necessita de cadastro)(linha 40), gera um numero aleatorio entre 0 e 999 para ser enviado(linha 42), define os parametros da mensagem(linhas 44 - 50), realiza configurações esteticas da pagina(linhas 52 e 53) e finalmente envia o email com os parametros passados(linha 56)
    }

    linha 68 - função de verificação do codigo
    {
        Recebe o valor digitado no campo 'numero de confirmação'(linha 72).
        Logo apos verifica se o valor e igual a variavel random que foi enviada ao email do usuario(linha 74), se sim ativa o botao se submit para finalizar o cadastro senao nao faz nada.
    }
*/

let random;
function confirmMail()
{   
    let re = /[0-9]*5/g

    const passes = [];
    passes[0] = document.getElementById("senha_1");
    passes[1] = document.getElementById("senha_2");

    let nome = document.getElementById("user_input").value;
    let email = document.getElementById("email_input").value;

    if(re.test(passes[0].value) && email != "" && nome != "")
    {
        if (passes[0].value == passes[1].value)
        {
            emailjs.init("0caVJ0GwvPT-G52t2");

            random = Math.floor(Math.random() * 1000);
            
            let param = {
                from_email: "", // possivel erro caso nao definido.
                from_name: "Autenticador web",
                to_name: "Caro cliente",
                message: "seu numero de confirmação de acesso é: " + random,
                to: email
            }

            document.getElementById("signin_email_div").style.display = "flex";
            document.getElementById("confirm_data").style.display = "none";

            // -------("chave publica da api", "modelo do email", parametros)
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
    let a = document.getElementById("second_auth_step").value;

    if (a == random)
    {
        let b = document.getElementById("end_submit");
        b.disabled = false;
        // alert("ativa o submit");
    }
}

function updateHtml()
{
    let a = document.getElementById("label_1");
    a.innerHTML = "Dados enviados - e possivel fazer login"
}