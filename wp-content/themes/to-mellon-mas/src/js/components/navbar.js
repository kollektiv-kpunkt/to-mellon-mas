if (document.querySelector("#tmm-nav-wrapper")) {
  const NavbarWrapper = document.querySelector("#tmm-nav-wrapper");
  window.addEventListener("scroll", function () {
    if (window.scrollY < 0) {
      console.log("Fuck you Safari");
      return;
    }
    if (NavbarWrapper.classList.contains("tmm-mobilemenu-open")) {
      return;
    }
    if (window.scrollY > 50) {
      NavbarWrapper.classList.add("bg-accent-10");
    } else {
      NavbarWrapper.classList.remove("bg-accent-10");
    }
    if (window.scrollY > this.oldScroll && window.scrollY > 80) {
      NavbarWrapper.classList.add("tmm-navbar-hide");
    } else {
      NavbarWrapper.classList.remove("tmm-navbar-hide");
    }
    this.oldScroll = window.scrollY;
  });
}

if (document.querySelector(".tmm-navbar-tofuburger-wrapper")) {
  const Burger = document.querySelector(".tmm-navbar-tofuburger-wrapper");
  Burger.addEventListener("click", function () {
    document
      .getElementsByTagName("html")[0]
      .classList.toggle("tmm-mobilemenu-open");
    document.getElementsByTagName("html")[0].classList.toggle("noscroll");
  });
}

if (document.querySelector(".tmm-mobilemenu-main .tmm-menu-item")) {
  document
    .querySelectorAll(".tmm-mobilemenu-main .tmm-menu-item")
    .forEach(function (item) {
      item.addEventListener("click", function () {
        document
          .getElementsByTagName("html")[0]
          .classList.toggle("tmm-mobilemenu-open");
        document.getElementsByTagName("html")[0].classList.toggle("noscroll");
      });
    });
}
