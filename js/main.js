import "../sass/main.scss";
import "./ThemeToggle";
import "./Loader";

window.ditto = {
  menu: (el) => {
    el.classList.toggle("open");
  },
};
