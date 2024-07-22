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
		if (window.matchMedia("(max-width: 576px)").matches) {
			this.classList.toggle("active");
			document.querySelector(".menu").classList.toggle("active");
			document.querySelector(".body").classList.toggle("noscroll");
		} else {
			this.classList.toggle("active");
			document.querySelector(".menu").classList.toggle("active");
		}
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

const slider = document.getElementById('slider');
const amount = document.getElementById('amount');
console.log(amount);


noUiSlider.create(slider, {
	start: [0, 150], // Начальные значения
	connect: true,
	range: {
		'min': 0,
		'max': 150
	}
});

slider.noUiSlider.on('update', function (values) {
	amount.innerHTML = "от <strong>" + Math.round(values[0]) + 'г/м2</strong> -  до <strong>' + Math.round(values[1]) + 'г/м2</strong>';
});

let filterButton = document.querySelector(".filter-button");
let filterCrest = document.querySelector(".filter-crest");

if (filterButton) {
	filterButton.addEventListener("click", function () {

		document.querySelector(".archive__filter").classList.add("active");
		document.querySelector(".body").classList.toggle("noscroll");
		filterCrest.classList.add("active");

	})
}

if (filterCrest) {
	filterCrest.addEventListener("click", function () {
		this.classList.remove("active");
		document.querySelector(".archive__filter").classList.remove("active");
		document.querySelector(".body").classList.remove("noscroll");
	})
}