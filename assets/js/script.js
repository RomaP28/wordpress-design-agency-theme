////////////////------Checking user's browser------------////////////////
let sBrowser,
	sUsrAg = navigator.userAgent;
if (sUsrAg.indexOf("Firefox") > -1) {
	sBrowser = "Mozilla Firefox";
} else if (sUsrAg.indexOf("Opera") > -1) {
	sBrowser = "Opera";
} else if (sUsrAg.indexOf("Trident") > -1) {
	sBrowser = "Microsoft Internet Explorer";
} else if (sUsrAg.indexOf("Edge") > -1) {
	sBrowser = "Microsoft Edge";
} else if (sUsrAg.indexOf("Chrome") > -1) {
	sBrowser = "Google Chrome or Chromium";
} else if (sUsrAg.indexOf("Safari") > -1) {
	sBrowser = "Apple Safari";
	let earthFilter = document.querySelector(".earth-blur");
	if (earthFilter) {
		earthFilter.style.display = "none";
	}
} else {
	sBrowser = "unknown";
}

////////////////------Listeners for open Main Menu------------////////////////

function get_close_menu() {
	return document.querySelector(".menu-close");
}

function get_open_menu() {
	return document.querySelector(".menu-open");
}

function get_menu() {
	return document.querySelector(".desktop-menu");
}

function get_textarea() {
	return document.querySelector('.original-textarea');
}

function get_fake_textarea() {
	return document.querySelector('.textarea');
}

function get_range_budget() {
	return document.querySelectorAll('input[type="range"]');
}

function get_amount_budget() {
	return document.querySelectorAll('input[name="budget-amount"]');
}

function get_main_form() {
	return document.querySelector(".header-form form");
}
function get_footer_form() {
	return document.querySelector(".contact-us form");
}

function get_service_form(){
	return document.querySelector(".services-form form");
}
function get_message_field() {
	return document.querySelector(".contact-us .wpcf7-response-output");
}
function get_service_form_message_field() {
	return document.querySelector(".services-form .wpcf7-response-output");
}
function get_phone_inputs() {
    return document.querySelectorAll('input[name="phone"]');
}
function get_modal_thank_you() {
	return document.querySelector('.thank-you-modal');
}

function get_scroll_bar() {
	return document.querySelector('.top-section .swiper-scrollbar');
}

function get_bottom_bar() {
	return document.querySelector('.top-section .bottom');
}
function menu_open() {
	document
		.querySelectorAll(".desktop-menu-bg, .desktop-menu, .menu-open")
		.forEach((item) => item.classList.toggle("open"));
}

////////////////------Disable Body Scroll on IOS when Main Menu open------------////////////////
let scrollY;
function remove_body_scroll() {
	scrollY = window.scrollY;
	const addHeight = () => {
		// window.scrollTo(0, 1000);
		document.documentElement.classList.add("lock"); // opens modal
		clearTimeout(timeId);
	};
	const timeId = setTimeout(addHeight, 500);
}

function add_body_scroll() {
	document.documentElement.classList.remove("lock");
	window.scrollTo(0, scrollY);
}

////////////////------Listeners for Closing Main Menu------------////////////////
function close_modal_and_form() {
	let close_menu = get_close_menu();

	document
		.querySelectorAll(".header-form, .thank-you-modal")
		.forEach((item) => item.classList.remove("open"));
	close_menu.removeEventListener("click", close_modal_and_form);
	close_menu.addEventListener("click", menu_open);
	close_menu.addEventListener("click", add_body_scroll);
}

function showModal(mutationsList, observer) {
	const mainForm = get_main_form();
	const modalThankYou = get_modal_thank_you();
	const textarea = get_textarea();
	const fakeTextarea = get_fake_textarea();

	mutationsList.forEach((mutation) => {
		if (mutation.target.classList.contains("failed")) {
			textarea.value = fakeTextarea.innerHTML = "";
			mainForm.reset();
			modalThankYou.classList.add("open");
		}
	});
}

function showSuccessMsg(mutationsList, observer) {
	const footerForm = get_footer_form();
    const message = get_message_field();

    const putMsg = () => {
		message.innerHTML = "Message sent successfully!";
		message.style.color = 'green';
	};

	mutationsList.forEach((mutation) => {
		if (mutation.target.classList.contains("failed")) {
			footerForm.reset();
			const timerID = setTimeout(putMsg, 1);
		} else if (mutation.target.classList.contains("invalid")) {
            message.style.color = 'red';
        }
	});
}

function showSuccessMsgServiceForm(mutationsList, observer) {
	const serviceForm = get_service_form();

	const putMsg = () => {
		const message = get_service_form_message_field();
		message.innerHTML = "Message sent successfully!";
		// message.style.color = 'green';
	}
	mutationsList.forEach((mutation) => {
		if (mutation.target.classList.contains("failed")) {

			serviceForm.classList.add("sent");
			serviceForm.classList.remove("failed");
			serviceForm.reset();
			const timerID = setTimeout(putMsg, 1);
		} else if (mutation.target.classList.contains("invalid")) {
            if (mutation.target.classList.contains("sent")) serviceForm.classList.remove("sent");
        }
	});
}

function bgAnimation() {
	const getPos = () => {
		if (window.innerWidth <= 820 && window.innerWidth > 600) {
			return -150;
		} else if (window.innerWidth <= 600) {
			return -50;
		} else {
			return -450;
		}
	};

	let bgToAnimate = [
		{ selector: ".up", position: getPos() },
		{ selector: ".down", position: -10 },
		{ selector: ".up2", position: 0 },
		{ selector: ".down2", position: 250 },
	];

	bgToAnimate.forEach((el) => {
		if (document.querySelector(el.selector)) {
			gsap.to(el.selector, {
				y: el.position,
				duration: 1,
				scrollTrigger: {
					trigger: ".work",
					start: 10,
					end: "top 0%",
					scrub: 0.3,
					toggleActions: "restart none none none",
				},
			});
		}
	});
}

const startType = () => {
	const words = [
		"liability",
		"quality",
		"control",
		"accuracy",
		"timely",
		"reliability",
	];
	let masterTl = gsap.timeline({ repeat: -1 });

	words.forEach((word) => {
		let tl = gsap.timeline({ repeat: 1, yoyo: true, repeatDelay: 1 });
		tl.to(".text", { duration: 1, delay: 0, ease: "none", text: word });
		masterTl.add(tl);
	});
};

function typingEffect() {
	const title = document.querySelector(".front-block .title");
	if (!title) return;
	let intervalId;

	function pendingStart() {
		title.innerHTML = `Global software development<br class="desktop"> firm with <span class="gradient">100%</span><br class="mobile"> <span class="gradient"><span class="text">reliability </span></span><span class="cursor"></span>rate`;
		intervalId = setInterval(deleteWords, 60);
	}

	let timerId = setTimeout(pendingStart, 1200);

	const deleteWords = () => {
		clearTimeout(timerId);
		let text = document.querySelector(".text").innerHTML;
		// document.querySelector('.cursor').innerHTML = '|';
		document.querySelector(".text").innerHTML = text.slice(0, -1);
		if (text.length === 0) {
			clearInterval(intervalId);
			startType();
		}
	};
}
function elementsAnimation() {
	const elementsToAnimate = [
		{
			selector: ".work .h-primary",
			trigger: ".work",
			start: "top 70%",
			end: "top -50%",
			effect: "back",
		},
		{
			selector: ".work .paragraph",
			trigger: ".work",
			start: "top 10%",
			end: "bottom 0%",
			effect: "circ",
		},
		{
			selector: ".card-container .work-card:nth-child(1)",
			trigger: ".work",
			start: "top 65%",
			end: "bottom -50%",
			effect: "expo",
		},
		{
			selector: ".card-container .work-card:nth-child(2)",
			trigger: ".work",
			start: "top 65%",
			end: "bottom -50%",
			effect: "expo",
		},
		{
			selector: ".card-container .work-card:nth-child(3)",
			trigger: ".work",
			start: "top 10%",
			end: "bottom -50%",
			effect: "expo",
		},
		{
			selector: ".card-container .work-card:nth-child(4)",
			trigger: ".work",
			start: "top 10%",
			end: "bottom -50%",
			effect: "expo",
		},
		{
			selector: ".card-container .work-card:nth-child(5)",
			trigger: ".work-card:nth-child(1)",
			start: "top -30%",
			end: "bottom -250%",
			effect: "expo",
		},
		{
			selector: ".card-container .work-card:nth-child(6)",
			trigger: ".work-card:nth-child(2)",
			start: "top -30%",
			end: "bottom -250%",
			effect: "expo",
		},
		{
			selector: ".card-container .work-card:nth-child(7)",
			trigger: ".work-card:nth-child(3)",
			start: "top -30%",
			end: "bottom -250%",
			effect: "expo",
		},
		{
			selector: ".card-container .work-card:nth-child(8)",
			trigger: ".work-card:nth-child(4)",
			start: "top -30%",
			end: "bottom -250%",
			effect: "expo",
		},
        {
            selector: ".card-container .work-card:nth-child(9)",
            trigger: ".work-card:nth-child(5)",
            start: "top -10%",
            end: "bottom -250%",
            effect: "expo",
        },
		{
			selector: ".rewards .h-primary",
			trigger: ".rewards",
			start: "top 70%",
			end: "top -50%",
			effect: "back",
		},
		{
			selector: ".rewards .paragraph",
			trigger: ".rewards",
			start: "top 60%",
			end: "top -50%",
			effect: "circ",
		},
		{
			selector: ".progress .row:nth-child(1)",
			trigger: ".rewards",
			start: "top 30%",
			end: "bottom 10%",
			effect: "back",
		},
		{
			selector: ".progress .row:nth-child(2)",
			trigger: ".rewards",
			start: "top 10%",
			end: "bottom 10%",
			effect: "back",
		},
		{
			selector: ".capabilities .h-primary",
			trigger: ".capabilities",
			start: "top 80%",
			end: "top -50%",
			effect: "back",
		},
		{
			selector: ".capabilities .paragraph",
			trigger: ".capabilities",
			start: "top 70%",
			end: "top -50%",
			effect: "circ",
		},
        {
            selector: ".blog .h-primary",
            trigger: ".blog",
            start: "top 80%",
            end: "top -50%",
            effect: "back",
        },
        {
            selector: ".blog .blog-card:nth-child(1)",
            trigger: ".blog",
            start: "top 40%",
            end: "bottom 10%",
            effect: "circ",
        },
        {
            selector: ".blog .blog-card:nth-child(2)",
            trigger: ".blog",
            start: "top 55%",
            end: "bottom 10%",
            effect: "circ",
        },
        {
            selector: ".blog .blog-card:nth-child(3)",
            trigger: ".blog",
            start: "top 70%",
            end: "bottom 10%",
            effect: "circ",
        },
        {
            selector: ".blog .blog-card:nth-child(4)",
            trigger: ".blog",
            start: "top 40%",
            end: "bottom 10%",
            effect: "circ",
        },
        {
            selector: ".blog .blog-card:nth-child(5)",
            trigger: ".blog",
            start: "top 55%",
            end: "bottom 10%",
            effect: "circ",
        },
        {
            selector: ".blog .blog-card:nth-child(6)",
            trigger: ".blog",
            start: "top 70%",
            end: "bottom 10%",
            effect: "circ",
        },
		{
			selector: ".approach .h-primary",
			trigger: ".approach",
			start: "top 70%",
			end: "top -50%",
			effect: "back",
		},
		{
			selector: ".approach .paragraph",
			trigger: ".approach",
			start: "top 60%",
			end: "top -50%",
			effect: "circ",
		},
		{
			selector: ".reviews .h-primary",
			trigger: ".reviews",
			start: "top 70%",
			end: "top -50%",
			effect: "back",
		},
		{
			selector: ".reviews .paragraph",
			trigger: ".reviews",
			start: "top 60%",
			end: "top -50%",
			effect: "circ",
		},
		{
			selector: ".contact-us .h-primary",
			trigger: ".contact-us",
			start: "top 70%",
			end: "top -50%",
			effect: "back",
		},
		{
			selector: ".contact-us .paragraph",
			trigger: ".contact-us",
			start: "top 60%",
			end: "top -50%",
			effect: "circ",
		},
		{
			selector: "form",
			trigger: ".contact-us",
			start: "top 60%",
			end: "bottom 0%",
			effect: "",
		},
	];

	elementsToAnimate.forEach((el) => {
		if (document.querySelector(el.selector)) {
			gsap.to(el.selector, {
				x: 0,
				y: 0,
				opacity: 1,
				duration: 0.7,
				ease: el.effect,
				repeat: 0,
				scrollTrigger: {
					// markers: true,
					trigger: el.trigger,
					start: el.start,
					end: el.end,
					toggleActions: "play none none none",
					// toggleActions: "restart reverse play reverse",
				}, //enter Leave EnterBack  LeaveBack
			});
		}
	});
}
function mosaicAnimation(opacity) {
	const capCards = document.querySelectorAll(".cap-card");
	const timeObj = {};
	for (let i = 0; i < capCards.length; i++) {
		timeObj[i] = setTimeout(() => actionCard(i, timeObj, opacity), i * 110);
	}
	const actionCard = (num, timeObj, opacity) => {
		capCards[num].style.opacity = opacity;
		clearTimeout(timeObj[num]);
	};
}

function setCaretPosition(elem) {
    let caretPos = elem.value.split('').map((el, i) => +el ? i : null).filter(elem => elem !== null).pop();
    caretPos = isNaN(caretPos) ? 3 : caretPos;
    setTimeout(() => elem.selectionStart = elem.selectionEnd = caretPos + 1, 1);
}


document.addEventListener('DOMContentLoaded', () => {
	const close_menu = get_close_menu();
	const open_menu = get_open_menu();
	const textarea = get_textarea();
	const fakeTextarea = get_fake_textarea();
	const rangeBudget = get_range_budget();
	const amountBudget = get_amount_budget();
	const mainForm = get_main_form();
	const footerForm = get_footer_form();
	const serviceForm = get_service_form();
	const topScrollBar = get_scroll_bar();
	const bottomBar = get_bottom_bar();
    const phoneInputs = get_phone_inputs();


////////////////------Smooth scrolling for anchors------------////////////////
	document.querySelectorAll(".smooth").forEach((el) => {
			// console.log(window.location.href.split('/').slice(-2));
			el.addEventListener("click", (e) => {
				e.preventDefault();
				const element = document.querySelector(e.target.hash);
				if(window.innerWidth > 700){
					window.scrollTo({left: 0, top: element.getBoundingClientRect().top + window.pageYOffset + 65, behavior: "smooth" });
				} else {
					element.scrollIntoView({ behavior: "smooth" });
				}
			})
		}
	);

	close_menu.addEventListener("click", () => {
		let menu = get_menu();
		close_modal_and_form();
		menu.classList.remove("remove-first-divs");
	});

	close_menu.addEventListener("click", add_body_scroll);

	document
		.querySelectorAll(".menu-open, .menu-close")
		.forEach((el) => el.addEventListener("click", menu_open));
	open_menu.addEventListener("click", remove_body_scroll);

	document.querySelector(".close-modal").addEventListener("click", (e) => {
		const close_menu = get_close_menu();
		const menu = get_menu();

		close_menu.removeEventListener("click", close_modal_and_form);
		close_menu.addEventListener("click", add_body_scroll);
		close_menu.addEventListener("click", menu_open);
		document
			.querySelectorAll(".header-form, .thank-you-modal")
			.forEach((item) => item.classList.remove("open"));

		menu.classList.remove("remove-first-divs");
	});

	document.querySelector(".open-menu-form").addEventListener("click", (ev) => {
		const close_menu = get_close_menu();
		const menu = get_menu();

		close_menu.removeEventListener("click", menu_open);
		close_menu.removeEventListener("click", add_body_scroll);
		close_menu.addEventListener("click", close_modal_and_form);
		document.querySelector(".header-form").classList.add("open");
		menu.classList.add("remove-first-divs");
	});


	////////////////------Header animation------------////////////////
	const header = document.querySelector("header nav");

	const options = [{
		start: "top 60%",
		end: "bottom -2000%",
		clsName: 'positioning',
	},
		{
			start: "top 1%",
			end: "bottom -2000%",
			clsName: 'animate',
		},
		{
			start: "top 50%",
			end: "top 10%",
			clsName: 'trans',
		}]


	let url = location.href.split('/');
	url = url.slice(-1)[0] === '' ? url.slice(-2)[0] : url.slice(-1)[0];
	if (url === 'projects' || url === 'blog') {
		options[0].start = "top 35%";
		options[2].start = "top 30%";
	}

	if (header) {
		if (window.innerWidth > 700) {
			options.forEach(el=> {
				gsap.to(header, {
					scrollTrigger: {
						trigger: ".nav-trigger",
						start: el.start,
						end: el.end,
						onEnter: () => {
							header.classList.add(el.clsName);
						},
						onLeaveBack: () => {
							header.classList.remove(el.clsName);
						},
					},
				});
			})
		}
	}

	if (topScrollBar) topScrollBar.classList.add('remove');
	if (bottomBar) bottomBar.classList.add('remove');

	////////////////------Work Cards------------////////////////
	document.querySelectorAll(".work-card .lazy-background").forEach((el) =>
		el.addEventListener("click", (ev) => {
			const url = el.closest('.work-card').querySelector('.btn').href;
			window.open(url, "_self").focus();
		})
	);

	////////////////------Rewards Cards------------////////////////
	document.querySelectorAll(".progress .card").forEach((el) =>
		el.addEventListener("click", (ev) => {
			window.open(el.dataset.link, '_blank').focus();
		})
	);

	////////////////------Services Cards------------////////////////
	document.querySelectorAll(".cap-card").forEach((el) =>
		el.addEventListener("click", (ev) => {
			window.open(el.dataset.link,"_self").focus();
		})
	);

	////////////////------Bind Custom TextArea with default------------////////////////

	if (textarea && fakeTextarea) {
		fakeTextarea.addEventListener(
			"input",
			() =>
				(textarea.value = fakeTextarea.innerHTML
					.replaceAll("<div>", "")
					.replaceAll("</div>", ""))
		);
		fakeTextarea.addEventListener("paste", function (e) {
			e.preventDefault();
			const text = e.clipboardData.getData("text/plain");
			document.execCommand("insertHTML", false, text);
		});
	}

	////////////////------Bind input type range and budget-amount------------////////////////

	if (rangeBudget.length > 0 && amountBudget.length > 0) {
		rangeBudget.forEach(el => el.addEventListener("input",(ev) => {
				const amountField = ev.target.closest('.field-group').querySelector('input[name="budget-amount"]');
				amountField.value = new Intl.NumberFormat("de-De")
					.format(ev.target.value)
					.replaceAll(",", ".")
			}
		));
		amountBudget.forEach(el => el.addEventListener("input",(ev) => {
					const rangeField = ev.target.closest('.field-group').querySelector('input[type="range"]');
					rangeField.value = ev.target.value = +ev.target.value;
			}
		));
	}

	////////////////------Observer for Thank you window after submitting Form------------///////////

	const mutationObserver = new MutationObserver(showModal);
	mutationObserver.observe(mainForm, { attributes: true });

	const mutationObserver2 = new MutationObserver(showSuccessMsg);
	mutationObserver2.observe(footerForm, { attributes: true });

	const mutationObserver3 = new MutationObserver(showSuccessMsgServiceForm);
	if(serviceForm){
		mutationObserver3.observe(serviceForm, { attributes: true });
	}

	////////////////------Modal Info------------////////////////
	if (document.querySelector(".icon-container")) {
        document.querySelector(".icon-container").addEventListener("click", () => {
            document.querySelector(".info-block").classList.add("open");
            // if (window.innerWidth < 700) remove_body_scroll()
        });
    }

    if (document.querySelector(".info-close")) {
        document.querySelector(".info-close").addEventListener("click", () => {
            document.querySelector(".info-block").classList.remove("open");
            // if (window.innerWidth < 700) add_body_scroll()
        });

        new SimpleBar(document.querySelector(".info-block .inner"), {
            autoHide: false,
            scrollbarMaxSize: 70,
        });
    }

	////////////////------Mobile Menu Accordion------------////////////////
	const accordionTogglesH = document.querySelectorAll(
		".desktop-menu div:nth-child(2) h2, .desktop-menu div:nth-child(3) h2"
	);
	const accordionContentH = document.querySelectorAll(
		".desktop-menu div:nth-child(2), .desktop-menu div:nth-child(3)"
	);

	if (accordionTogglesH.length > 0 && accordionContentH.length > 0) {
		accordionTogglesH.forEach((el) =>
			el.addEventListener("click", (e) => {
				if (e.target.closest("div").classList.contains("open")) {
					e.target.closest("div").classList.remove("open");
					return;
				}
				accordionContentH.forEach((el) => el.classList.remove("open"));
				e.target.closest("div").classList.add("open");
			})
		);
	}

	if (document.querySelector(".capabilities") && window.innerWidth > 820) {
		gsap.to(".capabilities", {
			onStart: () => mosaicAnimation(1),
			scrollTrigger: {
				trigger: ".capabilities",
				start: "top 80%",
				end: "bottom 0%",
				toggleActions: "play none none none",
				// toggleActions: "restart none restart none",
				//enter Leave EnterBack Leave LeaveBack
			},
		});
		// for removing cards
		// gsap.to(".capabilities", {
		// 	onStart: () => mosaicAnimation(0),
		// 	scrollTrigger: {
		// 		// markers: true,
		// 		trigger: ".capabilities",
		// 		// start: 'top 110%',
		// 		start: "bottom -10%",
		// 		toggleActions: "restart none none none",
		// 		// toggleActions: "restart none restart none",
		// 	},
		// });
	}

	document.querySelectorAll(".approach .line").forEach((el) => {
		const dur = Math.random() * 5 + 1;
		el.style.width = 0;

		gsap.to(el, {
			width: "100%",
			duration: dur,
			scrollTrigger: {
				trigger: ".approach",
				start: "top 10%",
				end: "bottom 30%",
				// scrub: true, //moving on scroll
				toggleActions: "play none none none",
				// toggleActions: "restart reverse restart reverse",
			},
		});
	});

////////////////------Sliders------------///////////

	new Swiper(".top-section .swiper", {
		direction: "horizontal",
		loop: false,
		spaceBetween: 30,
		breakpoints: {
			700: {
				slidesPerView: 2.2,
				spaceBetween: 30,
			},
			300: {
				slidesPerView: 1.5,
				spaceBetween: 10,
			},
		},
		scrollbar: {
			el: ".top-section .swiper-scrollbar",
			draggable: true,
		},
	});

	new Swiper(".work .swiper", {
		direction: "horizontal",
		loop: false,
		spaceBetween: 5,
		breakpoints: {
			700: {
				slidesPerView: 1,
			},
		},
		scrollbar: {
			el: ".work .swiper-scrollbar",
			draggable: true,
		},
	});

	const usersPhoto = [];

	document.querySelectorAll('.user-image')
		.forEach(el=> usersPhoto.push(el.getAttribute('data-lazy-src') || el.getAttribute("src")));

	new Swiper(".reviews .swiper", {
		loop: true,
		speed: 1000,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".reviews .swiper-pagination",
			clickable: true,
			renderBullet: function (index, className) {
				return `<span class="swiper-pagination-bullet"><img src="${usersPhoto[index]}" alt="user photo"></span>`;
			},
		},
	});

	const objOptions = {
		loop: true,
		speed: 1000,
		autoplay: {
			delay: 3000,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	};

	new Swiper(".preview-slider", objOptions);


    new Swiper(".blog-page-top .swiper", {
        slidersPerView: 1,
        effect: "fade",
        // direction: "horizontal",
        loop: true,
        speed: 300,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + String(index + 1).padStart(2, '0') + '</span>';
            },
            dynamicBullets: true,
            dynamicMainBullets: 3
        },
    });




	////////////////------------------Sputnik scroll---------////////////////

	// const arrEl1 = document.querySelectorAll(".innerTrajectory, #sputnik, .earth");
	// arrEl1.forEach(el => el.style.visibility = 'visible');

	const arrEl = document.querySelectorAll(".earth, .innerTrajectory");

	if (arrEl.length > 0) {
		let endPoint;
		window.innerWidth < 821 ? (endPoint = 1600) : (endPoint = "bottom 5%");
		gsap.defaults({ ease: "none" });
		arrEl.forEach((el) => {
			const mains = gsap
				.timeline({
					scrollTrigger: {
						trigger: ".services-top",
						scrub: true,
						start: "top 1%",
						end: endPoint,
					},
				})
				.from(".theLine", { duration: 30 })
				.to(
					el,
					{
						motionPath: {
							path: ".theLine",
							align: ".theLine",
							alignOrigin: [0.5, 0.5],
						},
						duration: 30,
					},
					0
				);
		});
	}

////////////////------------------Graphic Dot Move-------////////////////
	const animateList = document.querySelectorAll(".right-bottom ul li");
	const dot = document.querySelector(".dot");

	if (dot && animateList.length > 0) {
		gsap.defaults({ ease: "none" });
		const dotMove = gsap
			.timeline()
			.from(".mot", { duration: 3 })
			.to(
				".dot",
				{
					motionPath: {
						path: ".mot",
						align: ".mot",
						alignOrigin: [0.5, 0.5],
					},
					duration: 3,
				},
				0
			);
		// GSDevTools.create({ animation: dotMove });

		setTimeout(() => {
			dotMove.time(1.63);
			dotMove.pause();
		}, 1);

		animateList.forEach((el, i) => {
			dotMove.addLabel(el, i);
			el.addEventListener("mouseover", () => {
				switch (i) {
					case 0:
						dotMove.tweenTo(1.63);
						break;
					case 1:
						dotMove.tweenTo(1.8);
						break;
					case 2:
						dotMove.tweenTo(2.02);
						break;
					case 3:
						dotMove.tweenTo(2.21);
						break;
					case 4:
						dotMove.tweenTo(2.39);
						break;

					default:
						break;
				}
				// dotMove.tweenTo(i * 0.17 + 1.63);
			});
		});
	}

    phoneInputs.forEach(el => el.addEventListener('focus', (event)=> {
        setCaretPosition(event.target);
    }));

	////////////////------Main Bg Animation------------///////////
	bgAnimation();

	////////////////------Typing word Effect------------///////////
	typingEffect();

	////////////////------Headings and paragraphs animation------------///////////
	elementsAnimation();
});


$(document).ready(function () {
    var inputs = document.querySelectorAll('.header-form input[type="tel"], .contact-us input[type="tel"]');

    inputs.forEach(phoneInput => {
        var iti = window.intlTelInput(phoneInput, {
            // allowDropdown: false,
            // autoHideDialCode: false,
            // autoPlaceholder: "off",
            // dropdownContainer: document.body,
            // excludeCountries: ["us"],
            initialCountry: "auto",
            customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                // console.log(selectedCountryPlaceholder);
                var customPlaceholder = selectedCountryPlaceholder;
                customPlaceholder = customPlaceholder.replace(/[0-9]/g, "0");
                return customPlaceholder;

            },
            // formatOnDisplay: true,
            geoIpLookup: function (callback) {
                $.get("https://ipinfo.io/json?token=c54ae77dc28792", function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            hiddenInput: "full_number",
            // localizedCountries: { 'de': 'Deutschland' },
            // nationalMode: false,
            // placeholderNumberType: "MOBILE",
            // preferredCountries: ['es'],
            // separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });


        $(phoneInput).on("countrychange", function (event) {
            var selectedCountryData = iti.getSelectedCountryData();
            newPlaceholder = intlTelInputUtils.getExampleNumber(selectedCountryData.iso2, true, intlTelInputUtils.numberFormat.INTERNATIONAL),

                iti.setNumber("");

            mask = newPlaceholder.replace(/[1-9]/g, "0");
            $(this).mask(mask);
        });
        iti.promise.then(function () {
            $(phoneInput).trigger("countrychange");
        });
    })
});
