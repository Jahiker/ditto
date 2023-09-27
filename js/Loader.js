class LoaderSpinner extends HTMLElement {
    constructor() {
        super();

        this.page = document.getElementById("page");

        this.init();
    }

    init() {
        this.page.classList.add("page-loaded");

        setTimeout(() => {
            this.classList.add("off")
        }, 500);
    }
}

customElements.define("loader-spinner", LoaderSpinner)