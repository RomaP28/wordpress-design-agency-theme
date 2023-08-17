window.addEventListener("beforeunload", () =>
    window.scrollTo({ top: 0, behavior: "smooth" })  //scrolling to the top before refresh page;
);
document.addEventListener('DOMContentLoaded', () => {
    ////////////////------------------Rocket scroll---------////////////////
    const plantes = document.querySelectorAll(".planet-wrapper");
    const serviceSection = document.querySelector(".dev-service");
    const rocket = document.querySelector(".rocket");
    const titles = Array.from(document.querySelectorAll('.service-title')).map(el => el.innerText);
    const descriptions = Array.from(document.querySelectorAll('.service-desc')).map(el => el.innerText);
    const progress = document.querySelector(".progress");

    let startPos = 0;

    const getDegrees = (el) => el.style.transform.replace("rotate(", "").replace("deg)", "");

    if (plantes.length > 0) {
        if (window.innerWidth > 912) {
            serviceSection.style.height = `${80 * plantes.length}rem`; //set size of scrollable section;
        } else {
            plantes[0].classList.add("active");
            document
                .querySelectorAll(
                    ".service-title:nth-child(1), .service-desc:nth-child(1)"
                )
                .forEach((elem) => elem.classList.add("active"));
            document.querySelector(".rocket").style.transform = "rotate(-25deg)";
        }

        plantes.forEach((el, i) => {
            el.style.transform = `rotate(${((360 / plantes.length) * i) - 25}deg)`;  //setting planets;

            el.querySelector(".planet").style.transform = ` rotate(${  //rotating planets;
                -((360 / plantes.length) * i) + 25 
            }deg)`;

            const start = i === 0 ? -10 : i;
            const end = i === plantes.length - 1 ? i + 4 : i;

            if (window.innerWidth > 912) {
                if(sBrowser === 'Mozilla Firefox') {
                    function rotateRocket(mutationsList, observer) {
                        mutationsList.forEach((mutation) => {
                            if (mutation.target.classList.contains("active")) rocket.style.transform = `rotate(${getDegrees(el)}deg)`
                        });
                    }
                    const mutationObserver3 = new MutationObserver(rotateRocket);
                    mutationObserver3.observe(el, { attributes: true });
                }

                const timeLine = gsap.timeline({
                    scrollTrigger: {
                        trigger: serviceSection,
                        start: `${(75 / plantes.length) * start}%`,
                        end: `${(75 / plantes.length) * (end + 1)}%`,
                        toggleActions: "play reverse restart reverse",
                    },
                })
                timeLine.to(`.service-title:nth-child(${i + 1})`, {
                        className: "service-title active",
                        duration: false,
                    })

                timeLine.to(`.service-desc:nth-child(${i + 1})`, {
                        className: "service-desc active",
                        duration: false,
                    })

                timeLine.to(el, {
                        className: "planet-wrapper active",
                        duration: false,
                    });


                gsap.timeline({
                    scrollTrigger: {
                        trigger: serviceSection,
                        start: "top -10%",
                        end: "bottom 120%",
                        toggleActions: "play reverse restart reverse",
                        // markers: true
                        scrub: 0.2,
                    },
                })
                    .to(progress, {
                    backgroundImage: "conic-gradient(rgba(159, 131, 214, 0.5) 359deg, transparent 0deg)",
                    ease: 'none',
                });
                if(sBrowser === 'Mozilla Firefox') return

                    gsap.timeline({
                        scrollTrigger: {
                            trigger: serviceSection,
                            start: `${(75 / plantes.length) * start}%`,
                            end: `${(75 / plantes.length) * (end + 1)}%`,
                            toggleActions: "restart none none reverse",
                        }, //onEnter, onLeave, onEnterBack, onLeaveBack
                    }).to(rocket, {
                        rotation: getDegrees(el),
                        duration: 0.1,
                        ease: "none",
                    });

            } else {
                el.addEventListener("click", (event) => {
                    plantes.forEach((el) => el.classList.remove("active"));

                    rocket.style.transform = event.target.closest(".planet-wrapper").style.transform;
                    event.target.closest(".planet-wrapper").classList.add("active");

                    titles.forEach(( text, index) => {
                        if (index === i) {
                            document.querySelector('.service-title:nth-child(1)').innerHTML = text;
                        }
                    })

                    descriptions.forEach(( text, index) => {
                        if (index === i) {
                            document.querySelector('.service-desc:nth-child(1)').innerHTML = text;
                        }
                    })
                });
            }
        });
    }
})
