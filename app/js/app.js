if (window.innerWidth <= 992) {
	let menuDropButton = document.querySelectorAll(".menu__arrow-mobile");
	let stockHeight = 0;
	if (menuDropButton) {
		menuDropButton.forEach(element => {
			stockHeight = 0;
			let menuDop = element.parentNode.querySelector(".menu-child");
			let a = true;
			if (stockHeight === 0) {
				stockHeight = menuDop.offsetHeight + "px";
				menuDop.style.height = 0;
			}
			element.addEventListener("click", function () {
				this.parentNode.classList.toggle("active");
				if (a === true) {
					this.parentNode.querySelector(".menu-child").style.height = stockHeight;
				} else {
					this.parentNode.querySelector(".menu-child").style.height = 0;
				}
				if (this.parentNode.querySelector(".menu-child").style.height !== "0px") {
					a = false;
				} else {
					a = true;
				}
			});

		});
	}
}

let burger = document.querySelector(".burger");
if (burger) {
	burger.addEventListener("click", function () {
		this.classList.toggle("active");
		document.querySelector(".menu").classList.toggle("active");
	})
}

var galleries = document.querySelectorAll('.lg');
if (galleries) {
	for (let i = 0; i < galleries.length; i++) {
		lightGallery(galleries[i], {
			thumbnail: true,
			selector: '.lg-item',
			download: false
		})
	}
}
var galleryThumbs = new Swiper(".gallery-thumbs", {
	centeredSlides: true,
	centeredSlidesBounds: true,
	slidesPerView: 3,
	spaceBetween: 15,
	watchOverflow: true,
	watchSlidesVisibility: true,
	watchSlidesProgress: true,
	direction: "horizontal",
	breakpoints: {
		1200: {
			slidesPerView: 5,
		},
		576: {
			slidesPerView: 4,
		},
	}
});

var galleryMain = new Swiper(".gallery-main", {
	watchOverflow: true,
	watchSlidesVisibility: true,
	watchSlidesProgress: true,
	rewind: true,
	preventInteractionOnTransition: true,
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',

	},
	effect: 'fade',
	fadeEffect: {
		crossFade: true
	},
	thumbs: {
		swiper: galleryThumbs
	}
});

galleryMain.on('slideChangeTransitionStart', function () {
	galleryThumbs.slideTo(galleryMain.activeIndex);
});

galleryThumbs.on('transitionStart', function () {
	galleryMain.slideTo(galleryThumbs.activeIndex);
});