jQuery(document).ready(function ($) {
    $('#cpf').mask("999.999.999-99");
    $("#date_birth").mask("99/99/9999");
    $('#postal_code').mask('99.999-999');
    $("#phone").inputmask({
        mask: ["(99) 9999-9999", "(99) 99999-9999", ],
        keepStatic: true
    });

    //Valida CPF
    $('#cpf').focusout(function () {
        if ($("#cpf").val().length > 0) {

            if ($("#cpf").val().length < 14) {
                noty({
                    text: 'CPF Inválido!',
                    layout: 'top',
                    type: 'warning',
                    modal: true,
                    timeout: 4000,
                    onClick: function ($noty) {
                        $noty.close();
                    },
                    callback: {
                        onClose: function () {
                            $("#cpf").focus();
                            $("#cpf").val('');
                        },
                    }
                });
                return false;
            }

            var validarCpf = VerificaCPF(somenteNumeros($("#cpf").val()));
            if (validarCpf === false) {
                noty({
                    text: 'CPF Inválido!',
                    layout: 'top',
                    type: 'warning',
                    modal: true,
                    timeout: 4000,
                    onClick: function ($noty) {
                        $noty.close();
                    },
                    callback: {
                        onClose: function () {
                            $("#cpf").focus();
                            $("#cpf").val('');
                        },
                    }
                });
                return false;
            }

        }
    });

    //Validar Data Nascimento
    $('#date_birth').focusout(function () {
        if ($("#date_birth").val().length > 0) {
            if (validarData($("#date_birth").val()) === false) {
                noty({
                    text: 'Data de Nascimento Inválida!',
                    layout: 'top',
                    type: 'warning',
                    modal: true,
                    timeout: 2000,
                    onClick: function ($noty) {
                        $noty.close();
                    },
                    callback: {
                        onClose: function () {
                            $("#date_birth").focus();
                            $("#date_birth").val('');
                        },
                    }
                });
                return false;
            }
        }
    });

    //Validar E-mail
    $('#email').focusout(function () {
        if ($("#email").val().length > 0) {
            if (validarEmail($("#email").val()) === false) {
                noty({
                    text: 'E-mail Inválido!',
                    layout: 'top',
                    type: 'warning',
                    modal: true,
                    timeout: 4000,
                    onClick: function ($noty) {
                        $noty.close();
                    },
                    callback: {
                        onClose: function () {
                            $("#email").focus();
                            $("#email").val('');
                        },
                    }
                });
                return false;
            }
        }
    });

});


//Validar E-mail
function validarEmail(email) {
    var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return regex.test(email);
}

//Validar Data
function validarData(dateString) {

    // First check for the pattern
    if (!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[0], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if (year < 1000 || year > 3000 || month == 0 || month > 12) {
        return false;
    }

    var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    // Adjust for leap years
    if (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};

//Função Valida CPF
function VerificaCPF(strCpf) {

    var cpf = strCpf.replace('.', '');
    cpf = cpf.replace('.', '');
    cpf = cpf.replace('-', '');

    var erro = new String;
    if (cpf.length < 11) erro += "Sao necessarios 11 digitos para verificacao do CPF! \n\n";
    var nonNumbers = /\D/;
    if (nonNumbers.test(cpf)) erro += "A verificacao de CPF suporta apenas numeros! \n\n";
    if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999") {
        erro += "Numero de CPF invalido!"
    }
    var a = [];
    var b = new Number;
    var c = 11;
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) {
        a[9] = 0
    } else {
        a[9] = 11 - x
    }
    b = 0;
    c = 11;
    for (y = 0; y < 10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) {
        a[10] = 0;
    } else {
        a[10] = 11 - x;
    }
    status = a[9] + "" + a[10]
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10])) {
        erro += "Digito verificador com problema!";
    }
    if (erro.length > 0) {
        return false;
    }
    return true;

}

//Função somente numeros
function somenteNumeros(str) {
    var number = str.match(/\d/g);
    return number.join("");
}

function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }

}