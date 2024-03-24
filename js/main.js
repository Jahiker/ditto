import "../sass/main.scss";

window.ditto = {
  menu: (el) => {
    el.classList.toggle("open");
  },
};

document.addEventListener("DOMContentLoaded", async () => {
  try {
    // Dynamic import ThemeToggle web component
    if (document.querySelector("theme-toggle")) {
      await import("../dist/ThemeToggle.bundle.js");
    }
    // Dynamic import Loader web component
    if (document.querySelector("loader-spinner")) {
      await import("../dist/Loader.bundle.js");
    }
    // Dynamic import StickyHeader web component
    if (document.querySelector("sticky-header")) {
      await import("../dist/StickyHeader.bundle.js");
    }
  } catch (error) {
    console.error(error);
  }
});
