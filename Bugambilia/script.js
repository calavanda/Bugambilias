let currentIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.card');
    const totalSlides = slides.length;
    const carouselInner = document.querySelector('.carousel-inner');
    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }
    const offset = -currentIndex * 100 / totalSlides;
    carouselInner.style.transform = `translateX(${offset}%)`;
    updateDots();
}

function updateDots() {
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        if (index === currentIndex) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
}

function currentSlide(index) {
    showSlide(index - 1);
}

// Auto slide every 3 seconds
setInterval(() => {
    showSlide(currentIndex + 1);
}, 3000);

showSlide(currentIndex);
