window.addEventListener('load', () => {
  const track = document.querySelector('.carousel-track');
  let slides = document.querySelectorAll('.slide');

  // Clonar la última slide al inicio y la primera al final
  const firstClone = slides[0].cloneNode(true);
  const lastClone = slides[slides.length - 1].cloneNode(true);

  track.appendChild(firstClone);
  track.insertBefore(lastClone, slides[0]);

  // Actualizar lista de slides con los clones
  slides = document.querySelectorAll('.slide');

  // Empezar en index 1 (la primera slide real, no el clon del final)
  let index = 1;
  track.style.transition = 'none';
  track.style.transform = `translateX(-${index * slides[0].getBoundingClientRect().width}px)`;

  function derecha() {
    const slideWidth = slides[0].getBoundingClientRect().width;
    index++;

    track.style.transition = 'transform 0.5s ease-in-out';
    track.style.transform = `translateX(-${index * slideWidth}px)`;

    // Si llegamos al clon del inicio (al final del track), saltamos a la primera real
    if (index === slides.length - 1) {
      setTimeout(() => {
        track.style.transition = 'none';
        index = 1;
        track.style.transform = `translateX(-${index * slideWidth}px)`;
      }, 500);
    }
  }

  let autoSlide = setInterval(derecha, 5000);
  function resetInterval() {
    clearInterval(autoSlide);
    autoSlide = setInterval(derecha, 5000);
  }

  const nextBtn = document.querySelector('.next');
  const prevBtn = document.querySelector('.prev');

  if (nextBtn) nextBtn.addEventListener('click', () => { derecha(); resetInterval(); });
  if (prevBtn) prevBtn.addEventListener('click', () => { moveLeft(); resetInterval(); });

  window.addEventListener('resize', () => {
    const slideWidth = slides[0].getBoundingClientRect().width;
    track.style.transition = 'none';
    track.style.transform = `translateX(-${index * slideWidth}px)`;
  });
});