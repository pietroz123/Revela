$(document).ready(function() {

    // =======================================================
    // MÁSCARAS
    // =======================================================

    $('#cellphone').mask('(00) 00000-0000', {
        placeholder: "(__) _____-____"
    });
    $('#phone').mask('(00) 0000-0000', {
        placeholder: "(__) ____-____"
    });
    $('#zip_code').mask('00000-000', {
        placeholder: "_____-___"
    });

    // =======================================================
    // Preenchimento automatico do endereco via CEP
    // =======================================================

    // Via JSON:
    // {
    //     "cep": "01001-000",
    //     "logradouro": "Praça da Sé",
    //     "complemento": "lado ímpar",
    //     "bairro": "Sé",
    //     "localidade": "São Paulo",
    //     "uf": "SP",
    //     "unidade": "",
    //     "ibge": "3550308",
    //     "gia": "1004"
    // }

    function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $('#city').val('');
        $('#street').val('');
        $('#neighborhood').val('');
    }

    $(document).on('keyup', '#zip_code', function() {

        // Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        // Verifica se o CEP não é vazio
        if (cep != "" && cep.length == 8) {

            // Loading enquanto procura o CEP
            $('#city').val('...');
            $('#street').val('...');
            $('#neighborhood').val('...');

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#street").val(dados.logradouro);

                    const valCidade = $('#city').find("option:contains('"+dados.localidade+"')").val();
                    $('#city').val(valCidade).trigger('change.select2');
                    
                    $("#neighborhood").val(dados.bairro);
                }
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulario_cep();
                    alert("CEP não encontrado.");
                }

            });

        }

    });

});