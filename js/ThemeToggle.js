export default class ThemeToggle extends HTMLElement {
  constructor() {
    super();

    this.toggle = this.querySelector("[data-toggle]");
    this.body = document.querySelector("body");

    this.init();
    this.toggle.addEventListener("click", this.toggleTheme.bind(this));
  }

  init() {
    if (localStorage.getItem("theme")) {
      this.body.classList.add("dark-theme");
    } else {
      this.body.classList.remove("dark-theme");
    }
  }

  toggleTheme() {
    if (localStorage.getItem("theme")) {
      this.body.classList.remove("dark-theme");
      localStorage.removeItem("theme");
    } else {
      this.body.classList.add("dark-theme");
      localStorage.setItem("theme", true);
    }
  }
}

customElements.define("theme-toggle", ThemeToggle);
