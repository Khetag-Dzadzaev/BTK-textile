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

let callback = document.querySelector(".callback");
let modal = document.querySelector(".modal");
if (modal) {
	let modalCrest = modal.querySelector(".modal__crest");

	if (callback) {
		callback.addEventListener("click", function () {
			modal.classList.add("active");
			document.querySelector(".body").classList.add("noscroll");
		})
	}

	if (modalCrest) {
		modalCrest.addEventListener("click", function () {
			modal.classList.remove("active");
			document.querySelector(".body").classList.remove("noscroll");
		})
	}

}

const slider = document.getElementById('slider');
const amount = document.getElementById('amount');
const amountInput = document.getElementById('amount-input');
const amountDeful1 = Number(amount.querySelector(".amount-dufult1").innerHTML);
const amountDeful2 = Number(amount.querySelector(".amount-dufult2").innerHTML);
const minSlider = Number(document.querySelector(".min-max_1").innerHTML);
const maxSlider = Number(document.querySelector(".min-max_2").innerHTML);
console.log(amountDeful2);


if (slider) {
	noUiSlider.create(slider, {
		start: [amountDeful1, amountDeful2], // Начальные значения
		connect: true,
		range: {
			'min': minSlider,
			'max': maxSlider
		}
	});

	slider.noUiSlider.on('update', function (values) {
		amount.innerHTML = 'от <strong><span class="amount-dufult1">' + Math.round(values[0]) + '<span>г/м2</strong> -  до <strong><span class="amount-dufult2">' + Math.round(values[1]) + '<span>г/м2</strong>';
		amountInput.value = Math.round(values[0]) + "-" + Math.round(values[1]);
	});
}