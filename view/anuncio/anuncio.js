let valorAtual = 0;

function nextImage() {
  const img = document.getElementsByClassName('imagem-carro')[0];
  valorAtual = (valorAtual + 1) % 3;
  img.src = `../../public/images/civic${valorAtual}.png`;
}

function previousImage() {
  const img = document.getElementsByClassName('imagem-carro')[0];
  valorAtual = (valorAtual - 1 + 3) % 3;
  img.src = `../../public/images/civic${valorAtual}.png`;
}

const previousButton = document.getElementsByClassName('left')[0];
const nextButton = document.getElementsByClassName('right')[0];

previousButton.onclick = previousImage;
nextButton.onclick = nextImage;
