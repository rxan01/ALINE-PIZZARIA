var cont = 1; // Define o contador para começar no primeiro slide

setInterval(() => {
    proximaImg();
}, 7000);  // Intervalo de 7 segundos

function proximaImg() {
    cont++;  // Incrementa o contador para o próximo slide

    if (cont > 3) {
        cont = 1;  // Resetando para o primeiro slide, mantendo o movimento contínuo
    }

    document.getElementById('radio' + cont).checked = true;  // Marca o rádio correspondente ao slide
}
