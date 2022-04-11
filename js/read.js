
const nome = document.getElementById('list-nome');
const nascimento = document.getElementById('list-nascimento');
const telefone = document.getElementById('list-telefone');

const linkEdit = document.getElementById('list-user-edit');
const linkRemove = document.getElementById('list-user-remove');
const buttonDelete = document.getElementById('list-user-delete');
const buttonListBack = document.getElementById('list-user-button');

function list_user() {
    const header = {
        'Content-type': 'application/json; charset=UTF-8',
        'Access-Control-Allow-Origin': '*'
    }

    fetch('http://localhost/projetos/seguranca-digital/api/read.php', {
        'method': 'GET',
        'header': header
    }).then(resp => resp.json())
        .then((data) => {
            nome.innerHTML = ''
            nascimento.innerHTML = ''
            telefone.innerHTML = ''
            linkEdit.innerHTML = ''
            linkRemove.innerHTML = ''
            for (let i = 0; i < data.body.length; i++) {
                const user = data.body[i]
                console.log(user)
                nome.innerHTML += `<p>${user.nome}</p>`
                nascimento.innerHTML += `<p>${user.nascimento}</p>`
                telefone.innerHTML += `<p>${user.telefone}</p>`

                linkEdit.innerHTML += `<button onclick='single_user(${user.id})'><i class="fa-solid fa-eye"></i></button>`
                linkRemove.innerHTML += `<button onclick='get_user(${user.id})'><i class="fa-solid fa-pen"></i></button>`
                buttonDelete.innerHTML += `<button onclick='delete_user(${user.id})'><i class="fa-solid fa-trash"></i></button>`
            }
        });

}

function single_user(id) {

    const header = {
        'Content-type': 'application/json; charset=UTF-8',
        'Access-Control-Allow-Origin': '*'
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


            nome.innerHTML += `<p>${user.nome}</p>`
            nascimento.innerHTML += `<p>${user.nascimento}</p>`
            telefone.innerHTML += `<p>${user.telefone}</p>`

        });

    buttonListBack.classList.add("is--active");

}

function delete_user(id) {
    if (window.confirm("Você realmente quer sair?")) {
        const header = {
            'Content-type': 'application/json; charset=UTF-8',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Methods': 'DELETE',
            'Access-Control-Max-Age': '3600',
            'Access-Control-Allow-Headers': 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'
        }

        fetch(`http://localhost/projetos/seguranca-digital/api/delete.php?id=${id}`, {
            'method': 'DELETE',
            'header': header
        }).then(resp => resp.json())
            .then((data) => {
                console.log(data)
                window.location.reload()
            });
    }


}

function reload() {
    window.location.reload()
}

list_user();


