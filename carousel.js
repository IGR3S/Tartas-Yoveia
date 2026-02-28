window.addEventListener('load', () => {
  const track = document.querySelector('.carousel-track');
  let slides = document.querySelectorAll('.slide');

  // Clonar la primera slide para loop infinito
  const firstClone = slides[0].cloneNode(true);
  track.appendChild(firstClone);

  // Actualizar lista de slides con el clon
  slides = document.querySelectorAll('.slide');

  let index = 0;

  // Función para mover carrusel a la derecha
  function moveRight() {
    const slideWidth = slides[0].getBoundingClientRect().width;
    index++;

    track.style.transition = 'transform 0.5s ease-in-out';
    track.style.transform = `translateX(-${index * slideWidth}px)`;

    // Resetear al inicio si llegamos al clon
    if (index === slides.length - 1) {
      setTimeout(() => {
        track.style.transition = 'none';
        index = 0;
        track.style.transform = `translateX(0px)`;
      }, 500); // coincide con la duración de la transición
    }
  }

  // Función para reiniciar el intervalo de auto-slide
  let autoSlide = setInterval(moveRight, 5000);
  function resetInterval() {
    clearInterval(autoSlide);
    autoSlide = setInterval(moveRight, 5000);
  }

  // Botones next/prev → ambos avanzan a la derecha
  const nextBtn = document.querySelector('.next');
  const prevBtn = document.querySelector('.prev');

  if (nextBtn) nextBtn.addEventListener('click', () => {
    moveRight();
    resetInterval();
  });
  if (prevBtn) prevBtn.addEventListener('click', () => {
    moveRight();
    resetInterval();
  });

  // Ajuste responsive
  window.addEventListener('resize', () => {
    const slideWidth = slides[0].getBoundingClientRect().width;
    track.style.transition = 'none';
    track.style.transform = `translateX(-${index * slideWidth}px)`;
  });
});

