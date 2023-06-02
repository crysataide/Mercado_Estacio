//: FUNÇÃO PARA DELETAR PRODUTO
function delete_produto(cod_prod) {
    var resposta = confirm("Deseja continuar com a exclusão do produto?");
    if (resposta == true){
        window.location.href = "delete.php?CodPro="+cod_prod;
    }
}
//: FUNÇÃO PARA DELETAR FORNECEDOR
function delete_fornecedor(id_forn) {
    var resposta = confirm("Deseja continuar com a exclusão do fornecedor?");
    if (resposta == true){
        window.location.href = "delete.php?ID_FORN="+id_forn;
    }
}
//: FUNÇÃO PARA DELETAR USUÁRIO
function delete_user(id_user) {
    var resposta = confirm("Deseja continuar com a exclusão do usuário?");
    if (resposta == true){
        window.location.href = "delete.php?ID="+id_user;
    }
}

//: FUNÇÃO PARA CANCELAR FORMULÁRIO
function cancelEnvio() {
    history.back();
}

//: FUNÇÃO PARA VALIDAR FORMULÁRIO
function validaForm(value){
    //: Variáveis do Produto
    var CodPro   = document.getElementById('CodPro');
    var CodBar   = document.getElementById('CodBar');
    
    var DescPro  = document.getElementById('DescPro');
    var CategPro = document.getElementById('CategPro');
    //: Variáveis do Fornecedor
    var NameForn  = document.getElementById('NameForn');
    var EmailForn = document.getElementById('EmailForn');
    var TelForn   = document.getElementById('TelForn');
    var DocForn   = document.getElementById('DocForn');
    var DateForn  = document.getElementById('DatePro');
    //: Variáveis do Usuário
    var name     = document.getElementById('name');
    var username = document.getElementById('username');
    var email    = document.getElementById('email');
    var password = document.getElementById('password');

    if (value === 'produto_edit') {
        if (DescPro.value === '' || CategPro.value === '') {
            alert('Por favor, preencha todos os campos.');
            return false;
        }
    }
    else if (value === 'produto_save') {
        if (CodPro.value === '' || CodBar.value === '' || DescPro.value === '' || CategPro.value === '') {
            alert('Por favor, preencha todos os campos.');
            return false;
        }
    }
    else if (value === 'fornecedor_edit' || value === 'fornecedor_save') {
        if (NameForn.value === '' || EmailForn.value === '' || TelForn.value === '' || DocForn.value === '' || DateForn.value === '') {
            alert('Por favor, preencha todos os campos.');
            return false;
        }
    }
    else if (value === 'usuario_edit' || value === 'usuario_save') {
        if (name.value === '' || username.value === '' || email.value === '' || password.value === '') {
            alert('Por favor, preencha todos os campos.');
            return false;
        }
    }
    //: PROCEDE COM A INCLUSÃO
    return true;
}

//: FUNÇÃO PARA ADICIONAR CARACTERES
// function addCaracter(input,size,type) {
//     // const $campoCNPJ = input.value.replace(/(\d{2})?(\d{3})?(\d{3})?(\d{4})?(\d{2})/,"$1.$2.$3/$4-$5");

//     //: 00.111.222/3333-44

//     var formattedValue = '';
//     var value = input.value.replace(/[^0-9.]/g,'').replace(/(\..*?)\..*/g, '$1');;

//     if (type === 'cnpj') {
//         for (var i = 0; i < size; i++) {
//             if (i === 2 || i === 5) {
//                 formattedValue += '.';
//                 }else if (i === 8) {
//                 formattedValue += '/';
//                 }else if (i === 12) {
//                 formattedValue += '-';
//                 }
//             formattedValue += value.charAt(i);
//         }
//     }
//     else if (type === 'tel') {
//         for (var i = 0; i < size; i++) {
//             if (i === 0) {
//                 formattedValue += '(';
//             } else if (i === 2) {
//                 formattedValue += ') ';
//             } else if (i === 7) {
//                 formattedValue += '-';
//             }
//             formattedValue += value.charAt(i);
//         }
//     }
//     input.value = formattedValue;
// }

//: FUNÇÃO PARA VALIDAR DIMENSÃO DOS OBJETOS
window.onload = function() {
    var cad_produto = document.getElementById('cad_produto');
    var cad_usuario = document.getElementById('cad_usuario');
    var cad_fornecedor = document.getElementById('cad_fornecedor');

    var tabelaObject = document.getElementById('tabela');
    var listaEscolha = document.getElementsByClassName('lista');
    var tabelaDescri = document.getElementsByClassName('tabela_desc');

    //: PÁGINA DE ESCOLHA
    for (var i = 0; i < listaEscolha.length; i++) {
        if (listaEscolha.length === 3) {
            listaEscolha[i].style.width = '40%';
            listaEscolha[i].style.margin = '0 4.5%';
        }
        else {
            listaEscolha[i].style.width = '20%';
            listaEscolha[i].style.margin = '0 9.5%';
        }
    }
    //: PÁGINA DE VISUALIZAÇÃO
    if (tabelaDescri.length === 1) {
        tabelaObject.style.margin = '207px auto';
    }
    else if (tabelaDescri.length === 2) {
        tabelaObject.style.margin = '191px auto';
    }
    else if (tabelaDescri.length === 3) {
        tabelaObject.style.margin = '175px auto';
    }
    else if (tabelaDescri.length === 4) {
        tabelaObject.style.margin = '158px auto';
    }
    else if (tabelaDescri.length === 5) {
        tabelaObject.style.margin = '142px auto';
    }
    //: PÁGINA DE CADASTRO
    if (cad_produto) {
        cad_produto.style.margin = '126px auto';
    }
    if (cad_usuario) {
        cad_usuario.style.margin = '126px auto';
    }
    if (cad_fornecedor) {
        cad_fornecedor.style.margin = '87px auto';
    }
}