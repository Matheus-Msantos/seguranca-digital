const inputNome = document.getElementById('editNome');
const inputNascimento = document.getElementById('editNascimento');
const inputTelefone = document.getElementById('editTelefone');
const containerForm = document.getElementById('container-edit-user');
var idUser;

function get_user(id) {
    idUser = id

    const header = {
        'Content-type': 'application/json; charset=UTF-8',
        'Access-Control-Allow-Origin': '*',
    }

    fetch(`http://localhost/projetos/seguranca-digital/api/single_read.php/?id=${id}`, {
        'method': 'GET',
        'header': header
    }).then(resp => resp.json())
        .then((data) => {
            nome.innerHTML = ''
            nascimento.innerHTML = ''
            telefone.innerHTML = ''
            linkEdit.innerHTML = ''
            linkRemove.innerHTML = ''
            buttonDelete.innerHTML = ''
            const user = data

            inputNome.value = user.nome
            inputNascimento.value = user.nascimento
            inputTelefone.value = user.telefone

        });

    buttonListBack.classList.add("is--active");
    containerForm.classList.add("is--active");



}

function update_user() {
    const body = {
        'nome': inputNome.value,
        'nascimento': inputNascimento.value,
        'telefone': inputTelefone.value
    }

    const header = {
        'Content-type': 'application/json; charset=UTF-8',
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'PUT',
        'Access-Control-Max-Age': '3600',
        'Access-Control-Allow-Headers': 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'
    }

    fetch(`http://localhost/projetos/seguranca-digital/api/update.php/?id=${idUser}`, {
        'method': 'PUT',
        'header': header,
        'body': JSON.stringify(body)
    }).then(resp => resp.json())
        .then((data) => {
            console.log(data);
        });

}
