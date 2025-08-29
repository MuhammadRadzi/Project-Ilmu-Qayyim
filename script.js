function toggleMenu() {
  document.getElementById("nav-links").classList.toggle("active");
}

// Carousel
let currentIndex = 0;
let autoSlideInterval;

function moveSlide(step) {
  const track = document.querySelector('.carousel-track');
  const cards = document.querySelectorAll('.carousel-track .card');

  const containerWidth = document.querySelector('.carousel-container').offsetWidth;
  const cardWidth = cards[0].offsetWidth;
  const visibleCards = Math.floor(containerWidth / cardWidth);

  const maxIndex = cards.length - visibleCards;

  currentIndex += step;
  if (currentIndex < 0) currentIndex = maxIndex;
  if (currentIndex > maxIndex) currentIndex = 0;

  track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
}

// auto-slide tiap 3 detik
function startAutoSlide() {
  autoSlideInterval = setInterval(() => {
    moveSlide(1);
  }, 3000);
}

function stopAutoSlide() {
  clearInterval(autoSlideInterval);
  startAutoSlide(); // lanjut lagi setelah klik manual
}

// jalan otomatis setelah load
document.addEventListener("DOMContentLoaded", () => {
  startAutoSlide();

  document.querySelector('.carousel-btn.prev').addEventListener('click', stopAutoSlide);
  document.querySelector('.carousel-btn.next').addEventListener('click', stopAutoSlide);
});


let currentQuizIndex = 0;
let autoQuizInterval;

function moveQuiz(step) {
  const track = document.querySelector('.quiz-track');
  const cards = document.querySelectorAll('.quiz-track .card');

  const containerWidth = document.querySelector('.quiz-carousel').offsetWidth;
  const cardWidth = cards[0].offsetWidth;
  const visibleCards = Math.floor(containerWidth / cardWidth);

  const maxIndex = cards.length - visibleCards;

  currentQuizIndex += step;
  if (currentQuizIndex < 0) currentQuizIndex = maxIndex;
  if (currentQuizIndex > maxIndex) currentQuizIndex = 0;

  track.style.transform = `translateX(-${currentQuizIndex * cardWidth}px)`;
}

// auto-slide quiz tiap 3 detik
function startAutoQuiz() {
  autoQuizInterval = setInterval(() => {
    moveQuiz(1);
  }, 3000);
}

function stopAutoQuiz() {
  clearInterval(autoQuizInterval);
  startAutoQuiz();
}

document.addEventListener("DOMContentLoaded", () => {
  startAutoQuiz();

  document.querySelector('.quiz-carousel .prev').addEventListener('click', stopAutoQuiz);
  document.querySelector('.quiz-carousel .next').addEventListener('click', stopAutoQuiz);
});
