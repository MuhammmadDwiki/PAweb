
const homeLink = document.getElementById("home-link");
const loginLink = document.getElementById("login-link");
const categoriesLink = document.getElementById("categories-link");
const aboutUsLink = document.getElementById("about-us-link");
const idkLink = document.getElementById("idk-link");
const idk2Link = document.getElementById("idk2-link");
const idk3Link = document.getElementById("idk3-link");

const slider = document.querySelector(".navbar-slider");


homeLink.addEventListener("mouseover", () => moveSlider(homeLink));
loginLink.addEventListener("mouseover", () => moveSlider(loginLink));
categoriesLink.addEventListener("mouseover", () => moveSlider(categoriesLink));
aboutUsLink.addEventListener("mouseover", () => moveSlider(aboutUsLink));
idkLink.addEventListener("mouseover", () => moveSlider(idkLink));
idk2Link.addEventListener("mouseover", () => moveSlider(idk2Link));
idk3Link.addEventListener("mouseover", () => moveSlider(idk3Link));


function moveSlider(link) {
    const linkRect = link.getBoundingClientRect();
    const navRect = link.parentElement.parentElement.getBoundingClientRect();
    slider.style.left = linkRect.left - navRect.left + "px";
    slider.style.width = linkRect.width + "px";
}

const welcomeText = document.querySelector(".welcome-text");
const fishingText = document.querySelector(".fishing-text");


welcomeText.addEventListener("mouseenter", () => {
    welcomeText.style.transform = "scale(1.1)";
});

welcomeText.addEventListener("mouseleave", () => {
    welcomeText.style.transform = "scale(1)";
});

fishingText.addEventListener("mouseenter", () => {
    fishingText.style.transform = "scale(1.1)";
});

fishingText.addEventListener("mouseleave", () => {
    fishingText.style.transform = "scale(1)";
});
