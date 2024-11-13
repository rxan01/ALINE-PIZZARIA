const totalPedido = 40.90;

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
