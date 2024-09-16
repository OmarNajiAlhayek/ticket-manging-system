
const goToTopBtn = document.getElementById("go-to-top-btn");

goToTopBtn.addEventListener('click', topFunction);

window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        goToTopBtn.classList.remove('hidden');
        setTimeout(() => {
            goToTopBtn.style.opacity = "1";
        }, 20);
    } else {
        goToTopBtn.style.opacity = "0";
        setTimeout(() => {
            goToTopBtn.classList.add('hidden');
        }, 200);
    }
}

function topFunction() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}
