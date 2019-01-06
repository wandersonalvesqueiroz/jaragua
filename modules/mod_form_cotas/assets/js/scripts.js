jQuery(document).ready(function ($) {

    $('#phone').mask("(99) 9999-9999");
    $('#cell').mask("(99) 99999-9999");
    $('#cota').mask("999-999999");

    var url = window.location.pathname;
    var pathname = window.location.pathname.indexOf("index.php");
    var path = ''
    if (pathname >= 0) {
        path = url.substr('0', pathname);
    } else {
        path = '';
    }
    $('#btn').click(function () {
        var nome = $('#nome').val();
        var email = $('#email').val();
        var msg = $('#msg').val();
        var email_admin = $('#email_admin').val();
        var subject = $('#subject').val();
        var sucesso = $('#sucesso').val();
        var erro = $('#erro').val();
        if (nome.length <= 3) {
            alert('Informe seu nome');
            return false;
        }
        if (email.length <= 5) {
            alert('Informe seu email');
            return false;
        }
        if (IsEmail(email) == false) {
            alert('Informe um e-mail válido');
            return false;
        }
        if (msg.length <= 5) {
            alert('Escreva uma mensagem');
            return false;
        }
        var urlData = "&nome=" + nome + "&email=" + email + "&msg=" + msg + "&email_admin=" + email_admin + "&subject=" + subject + "&sucesso=" + sucesso + "&erro=" + erro;
        $.ajax({
            type: "POST", url: path + 'modules/mod_form_cotas/tmpl/sendmail.php', async: true, data: urlData, success: function (data) {
                $('#retornoHTML').append(data);
            }, beforeSend: function () {
                $('.loading').fadeIn('fast');
            }, complete: function () {
                $('.loading').fadeOut('fast');
                $("#nome").val("");
                $("#email").val("");
                $("#msg").val("");
                $("#email_admin").val("");
                $("#subject").val("");
                $("#sucesso").val("");
                $("#erro").val("");
            }
        });

        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }
    });
});