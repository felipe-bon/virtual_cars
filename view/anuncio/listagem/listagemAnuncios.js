 
document.querySelectorAll('.btn-excluir').forEach(button => {
    button.addEventListener('click', () => {
        if (confirm('Tem certeza que deseja excluir este anúncio?')) {
            alert('Anúncio excluído!');
            // lógica de remover o item da página no futuro
            button.closest('.anuncio-item').remove();
        }
    });
});
    