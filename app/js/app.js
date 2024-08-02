if (window.innerWidth <= 992) {
	let menuDropButton = document.querySelectorAll(".menu__arrow-mobile");
	if (menuDropButton) {
		menuDropButton.forEach(element => {
			let stockHeight = 0;
			let menuDop = element.parentNode.querySelector(".menu-child");
			let menuDopItem = menuDop.querySelectorAll(".menu-child__item");
			let a = true;
			if (stockHeight === 0) {
				menuDopItem.forEach(el => {
					stockHeight += el.offsetHeight + 10;
					console.log(el.offsetHeight);

				});
				stockHeight += 20;
				stockHeight += "px";
				menuDop.style.height = 0;
			}
			element.addEventListener("click", function () {
				this.parentNode.classList.toggle("active");
				if (a === true) {
					this.parentNode.querySelector(".menu-child").style.height = stockHeight;
					console.log(this.parentNode.querySelector(".menu-child").style.height);
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
	slidesPerView: 3,
	spaceBetween: 15,
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
	rewind: true,
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
if (slider) {
	const amount = document.getElementById('amount');
	if (amount) {
		const amountInput = document.getElementById('amount-input');
		const amountDeful1 = Number(amount.querySelector(".amount-dufult1").innerHTML);
		const amountDeful2 = Number(amount.querySelector(".amount-dufult2").innerHTML);
		const minSlider = Number(document.querySelector(".min-max_1").innerHTML);
		const maxSlider = Number(document.querySelector(".min-max_2").innerHTML);

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
				amount.innerHTML = 'от <strong><span class="amount-dufult1">' + Math.round(values[0]) + '</span><span class="measurement">г/м<span>2</span></span></strong> -  до <strong><span class="amount-dufult2">' + Math.round(values[1]) + '</span><span class="measurement">г/м<span>2</span></span></strong>';
				amountInput.value = Math.round(values[0]) + "-" + Math.round(values[1]);
			});
		}
	}
}

const CenSlider = document.getElementById('CenSlider');
if (CenSlider) {
	const CenAmount = document.getElementById('CenAmount');
	if (CenAmount) {
		const CenamountInput = document.getElementById('Cenamount-input');
		const CenamountDeful1 = Number(CenAmount.querySelector(".Cenamount-dufult1").innerHTML);
		const CenamountDeful2 = Number(CenAmount.querySelector(".Cenamount-dufult2").innerHTML);
		const CenminSlider = Number(document.querySelector(".Cenmin-max_1").innerHTML);
		const CenmaxSlider = Number(document.querySelector(".Cenmin-max_2").innerHTML);

		if (CenSlider) {
			noUiSlider.create(CenSlider, {
				start: [CenamountDeful1, CenamountDeful2], // Начальные значения
				connect: true,
				range: {
					'min': CenminSlider,
					'max': CenmaxSlider
				}
			});

			CenSlider.noUiSlider.on('update', function (values) {
				CenAmount.innerHTML = 'от <strong><span class="Cenamount-dufult1">' + Math.round(values[0]) + '</span><span class="measurement">₽ / м<span>2</span></span></strong> -  до <strong><span class="Cenamount-dufult2">' + Math.round(values[1]) + '</span><span class="measurement">₽ / м<span>2</span></span></strong>';
				CenamountInput.value = Math.round(values[0]) + "-" + Math.round(values[1]);
			});
		}
	}
}


let order = document.querySelector(".order-button");
let modalOrder = document.querySelector(".modal-order");
if (modalOrder) {
	let modalOrderCrest = modalOrder.querySelector(".modal-order__crest");

	if (order) {
		order.addEventListener("click", function () {
			modalOrder.classList.add("active");
			document.querySelector(".body").classList.add("noscroll");
		})
	}

	if (modalOrderCrest) {
		modalOrderCrest.addEventListener("click", function () {
			modalOrder.classList.remove("active");
			document.querySelector(".body").classList.remove("noscroll");
		})
	}

}