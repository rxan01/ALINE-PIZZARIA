const totalPedido = localStorage.getItem('total');
// const totalPedido = 120;

document.querySelectorAll('input[name="metodoPagamento"]').forEach(input => {
    input.addEventListener('change', (event) => {
        const metodoPagamento = event.target.value;
        document.getElementById('creditDebitFields').classList.toggle('hidden', metodoPagamento !== 'credito' && metodoPagamento !== 'debito');
        document.getElementById('dinheiroFields').classList.toggle('hidden', metodoPagamento !== 'dinheiro');
        document.getElementById('valeFields').classList.toggle('hidden', metodoPagamento !== 'vale');
    });
});

document.getElementById('valor-em-dinheiro').addEventListener('input', (event) => {
    const valorEmDinheiro = parseFloat(event.target.value);
    const trocoDisplay = document.getElementById('trocoDisplay');

    if (valorEmDinheiro >= totalPedido) {
        const troco = valorEmDinheiro - totalPedido;
        trocoDisplay.textContent = `Troco: R$ ${troco.toFixed(2)}`;
        trocoDisplay.classList.remove('hidden');
    } else {
        trocoDisplay.classList.add('hidden');
    }
});

function puxarTotal() {
    const row = document.querySelector('#row');
    if (row) {
        row.innerHTML = `
            <span>Total</span>
            <span id="totalAmount">R$ ${totalPedido}</span>
        `;
    } else {
        console.error("Elemento '.row' não encontrado.");
    }
}

puxarTotal();
