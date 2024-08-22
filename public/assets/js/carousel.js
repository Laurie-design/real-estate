let liteCarousel = document.querySelectorAll('.lite-carousel');
liteCarousel.forEach((car) => {
    let carouselImages = car.querySelectorAll('img');
    let carSize = carouselImages.length;
    if (carSize <= 1) {
        return;
    }
    initCarousselImgs(carouselImages);
    let currIndex = 0;
    let carObj = {currIndex, carSize, carouselImages};
    setInterval(() => {
        carObj = nextCarItem(carObj);
    }, 3000);
});

function initCarousselImgs(carImgs) {
    carImgs.forEach((img) => {
        img.classList.remove('active');
    });
    carImgs[0].classList.add('active');
}

function nextCarItem(carObj) {
    const {currIndex, carSize, carouselImages} = carObj;
    if (carSize <= 1) {
        return carObj;
    }
    let nextIndex = (currIndex+1) % carSize;
    let previousIndex = (currIndex-1+carSize) % carSize;
    carouselImages[previousIndex].classList.remove('previous');
    carouselImages[currIndex].classList.replace('active', 'previous');
    carouselImages[nextIndex].classList.add('active');
    return {currIndex : nextIndex, carSize, carouselImages};
}