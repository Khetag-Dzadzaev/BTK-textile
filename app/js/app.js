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