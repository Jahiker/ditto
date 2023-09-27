class StickyHeader extends HTMLElement {
  constructor() {
    super();

    this.header = document.getElementById("header-wrapper");
    this.coordY = +this.dataset.scrollY

    this.init();
  }

  init() {
    window.addEventListener("scroll", this.onScroll.bind(this));
  }

  onScroll(e) {
    if (window.scrollY > this.coordY) {
      this.header.classList.add("fixed-header");
    } else {
      this.header.classList.remove("fixed-header");
    }
  }
}

customElements.define("sticky-header", StickyHeader);
