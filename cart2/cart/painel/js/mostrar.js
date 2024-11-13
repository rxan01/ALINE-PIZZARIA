const tabela = document.querySelector('.tabela');

function puxarDados() {
    const estatus = 'A';

    $.post('./php/puxarDados.php', { estatus: estatus }, function (resp) {
        console.log(resp);
        if (resp[0].status !== 'error') {
            tabela.innerHTML = "";
            resp.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.id}</td>
                    <td><img src="../uploads/${item.capa}" alt="" style="width:50px;"></td>
                    <td>${item.data_criacao}</td>
                    <td>${item.nome}</td>
                    <td>R$ ${item.valor}</td>
                    <td>
                        <button class="btn btn-icon btn-danger" onclick="apagar(${item.id})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                `;
                tabela.appendChild(row);
            });
        } else {
            alert("Erro ao puxar os dados.");
        }
    });
}

function apagar(id) {
    if (confirm("Tem certeza que deseja deletar este item?")) {
        $.post('./php/deletar.php', { idDelete: id }, function (resp) {
            if (resp.status === 'success') {
                alert("Item deletado com sucesso!");
                puxarDados();
            } else {
                alert("Erro ao deletar o item.");
            }
        }, 'json');
    }
}

puxarDados();































{/* <tr>
                            <td>7</td>
                            <td><img src="assets/img/sem-imagem.png" alt="" style="width:50px;"></td>
                            <td><?= date('d/m/Y') ?></td>
                            <td>Cursos Maykon</td>
                            <td>R$ 77</td>
                                                   
                            <td><a href="" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a></td>
                            <td>
                                <form action="" method="post">
                                 <input type="hidden" name="shepp-firewall" value="">
                                 <input type="hidden" name="idDelete" value="">
                                 <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></button>
                                 </form>
                            </td>
                          </tr> */}