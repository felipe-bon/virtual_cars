
document.getElementById('cadastroForm').addEventListener('submit', async function (event) {
    event.preventDefault(); // Impede o envio tradicional

    const form = event.target;
    const formData = new FormData(form);

    // Converte FormData para URL-encoded
    const params = new URLSearchParams();
    for (const pair of formData) {
        params.append(pair[0], pair[1]);
    }

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: params
        });
        console.log(params);
        console.log(form.action);
        console.log(response);

        // Se o backend responder com JSON:
        const data = await response.json();
        console.log("data", data.success);
        // if (data.success) {
            window.location.href = "/virtual_cars/view/home/homeInterna.php"; // Redireciona se sucesso
        // } else {
            // document.getElementById('mensagem').textContent = 'Erro ao cadastrar. Tente novamente.';
        // }
    } catch (error) {
        document.getElementById('mensagem').textContent = 'Erro de conexão.';
    }
});