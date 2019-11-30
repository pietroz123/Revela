$(document).ready(function() {

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

    // Implementação do delay para o keyup
    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
            callback.apply(context, args);
            }, ms || 0);
        };
    }

    function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $('#city').val('');
        $('#street').val('');
        $('#neighborhood').val('');
        $('#stree_complement').val('');
        
    }

    $(document).on('keyup', '#zip_code', delay(function() {

        // Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        // Verifica se o CEP não é vazio
        if (cep != "") {

            // Loading enquanto procura o CEP
            $('#city').val('...');
            $('#street').val('...');
            $('#neighborhood').val('...');
            $('#stree_complement').val('...');

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#street").val(dados.logradouro);

                    const valCidade = $('#city').find("option:contains('"+dados.localidade+"')").val();
                    $('#city').val(valCidade).trigger('change.select2');
                    
                    $("#neighborhood").val(dados.bairro);
                    $("#stree_complement").val(dados.complemento);
                }
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulario_cep();
                    alert("CEP não encontrado.");
                }

            });

        }

    }, 1500));

});