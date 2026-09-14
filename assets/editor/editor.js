// /**
//    * Init swiper sliders
//    */

function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach((swiperElement) => {

        // Don't initialize twice
        if (swiperElement.swiper) {
            return;
        }

        const configElement = swiperElement.querySelector(".swiper-config");

        if (!configElement) {
            return;
        }

        const config = JSON.parse(configElement.textContent.trim());

        new Swiper(swiperElement, config);
    });
}

// First load
initSwiper();

// Watch Gutenberg for changes
const observer = new MutationObserver(() => {
    initSwiper();
});

observer.observe(document.body, {
    childList: true,
    subtree: true,
});