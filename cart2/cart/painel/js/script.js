const btnsalvar = document.querySelector("#salvar");

btnsalvar.addEventListener('click', function(event) {   
event.preventDefault();
    const valor = document.querySelector('#valor').value;
    const nome = document.querySelector('#nome').value;
    const media = document.querySelector('#media').files[0];


if (media) {
    const formData = new FormData();
    formData.append('valor', valor);
    formData.append('nome', nome);
    formData.append('media', media);

    $.ajax({
        url: './../php/criar.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(resp) {
            console.log("Resposta recebida do servidor:", resp);
            try {
                const jsonResponse = typeof resp === 'object' ? resp : JSON.parse(resp);
                if (jsonResponse.status === 'success') {
                    alert('Imagem enviada com sucesso');
                } else {
                    alert('Erro ao enviar imagem: ' + jsonResponse.message);
                }
            } catch (e) {
                console.error('Erro ao processar resposta JSON:', e);
                alert('Erro ao processar resposta do servidor.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro ao enviar imagem:', error);
            alert('Erro ao enviar imagem. Verifique o console para mais detalhes.');
        }
    });
} else {
    alert('Por favor, selecione uma imagem ou vídeo para enviar.');
}
});