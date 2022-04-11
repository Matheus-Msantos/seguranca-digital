const inputNomeCreate = document.getElementById('createNome');
const inputNascimentoCreate = document.getElementById('createNascimento');
const inputTelefoneCreate = document.getElementById('createTelefone');

function openForm() {
    document.getElementById('create-user-container').classList.add('is--active');
    document.getElementById('list-user-conteiner').classList.add('is--none');
    document.getElementById('container-edit-user').classList.add('is--none');
}

function create_user() {

    const body = {
        'nome': inputNomeCreate.value,
        'nascimento': inputNascimentoCreate.value,
        'telefone': inputTelefoneCreate.value
    }


    const header = {
        'Content-type': 'application/json; charset=UTF-8',
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'POST',
        'Access-Control-Max-Age': '3600',
        'Access-Control-Allow-Headers': 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'
    }

    fetch(`http://localhost/projetos/seguranca-digital/api/create.php`, {
        'method': 'POST',
        'header': header,
        'body': JSON.stringify(body)
    }).then((data) => {
        console.log(inputNomeCreate.value)
        console.log(inputNomeCreate.value)
        console.log(inputNomeCreate.value)
        console.log(data);
    });

}