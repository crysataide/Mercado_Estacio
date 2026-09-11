//: FUNÇÕES PARA EXCLUSÃO COM CONFIRMAÇÃO
function delete_produto(cod_prod) {
    if (confirm("Deseja realmente excluir este produto?")) {
        window.location.href = "delete.php?CodPro=" + encodeURIComponent(cod_prod);
    }
}

function delete_fornecedor(id_forn) {
    if (confirm("Deseja realmente excluir este fornecedor?")) {
        window.location.href = "delete.php?ID_FORN=" + encodeURIComponent(id_forn);
    }
}

function delete_user(id_user) {
    if (confirm("Deseja realmente excluir este usuário?")) {
        window.location.href = "delete.php?ID=" + encodeURIComponent(id_user);
    }
}

//: FUNÇÃO PARA CANCELAR FORMULÁRIO
function cancelEnvio() {
    history.back();
}

//: VALIDAÇÃO DOS FORMULÁRIOS
function validaForm(value) {
    var CodPro   = document.getElementById('CodPro');
    var CodBar   = document.getElementById('CodBar');
    var DescPro  = document.getElementById('DescPro');
    var CategPro = document.getElementById('CategPro');

    var NameForn  = document.getElementById('NameForn');
    var EmailForn = document.getElementById('EmailForn');
    var TelForn   = document.getElementById('TelForn');
    var DocForn   = document.getElementById('DocForn');
    var DateForn  = document.getElementById('DateForn');

    var name     = document.getElementById('name');
    var username = document.getElementById('username');
    var email    = document.getElementById('email');
    var password = document.getElementById('password');

    if (value === 'produto_edit') {
        if (!DescPro || DescPro.value.trim() === '' || !CategPro || CategPro.value.trim() === '') {
            alert('Por favor, preencha todos os campos obrigatórios.');
            return false;
        }
    }
    else if (value === 'produto_save') {
        if (!CodPro || CodPro.value.trim() === '' || !CodBar || CodBar.value.trim() === '' || !DescPro || DescPro.value.trim() === '' || !CategPro || CategPro.value.trim() === '') {
            alert('Por favor, preencha todos os campos obrigatórios do produto.');
            return false;
        }
    }
    else if (value === 'fornecedor_edit' || value === 'fornecedor_save') {
        if (!NameForn || NameForn.value.trim() === '' || !EmailForn || EmailForn.value.trim() === '' || !TelForn || TelForn.value.trim() === '' || !DocForn || DocForn.value.trim() === '' || !DateForn || DateForn.value.trim() === '') {
            alert('Por favor, preencha todos os campos obrigatórios do fornecedor.');
            return false;
        }
    }
    else if (value === 'usuario_edit' || value === 'usuario_save') {
        if (!name || name.value.trim() === '' || !username || username.value.trim() === '' || !email || email.value.trim() === '') {
            alert('Por favor, preencha todos os campos obrigatórios do operador.');
            return false;
        }
        if (value === 'usuario_save' && (!password || password.value.trim() === '')) {
            alert('Por favor, defina uma senha para o novo operador.');
            return false;
        }
    }
    return true;
}

//: INICIALIZAÇÃO DE MÁSCARAS
$(document).ready(function() {
    var $tel = $('#TelForn');
    var $doc = $('#DocForn');

    if ($tel.length) {
        $tel.mask('(00) 00000-0000');
    }

    if ($doc.length) {
        // Máscara flexível para CPF (14 chars) ou CNPJ (18 chars)
        var options = {
            onKeyPress: function(val, e, field, options) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                var mask = (val.length > 14) ? masks[1] : masks[0];
                $doc.mask(mask, options);
            }
        };
        $doc.mask('00.000.000/0000-00', options);
    }
});