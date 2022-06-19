import Cookies from "js-cookie";

function animateLoader() {
  var icon = document.querySelector(".tmm-loader svg");
  var coins = icon.querySelectorAll(".tmm-icon-coin");
  var rose = icon.querySelector("#rose");
  coins.forEach(function (coin) {
    coin.classList.add("tmm-icon-coin-transitioned");
  });
  rose.classList.add("tmm-icon-rose-transitioned");
  setTimeout(() => {
    document
      .querySelector(".tmm-loader")
      .classList.add("tmm-loader-transitioned");
  }, 2500);
  setTimeout(() => {
    document.querySelector(".tmm-loader").remove();
    document.documentElement.classList.remove("noscroll");
  }, 2800);

  Cookies.set("tmm-loader", "true", { expires: 2 });
}

window.addEventListener("load", function () {
  if (document.querySelector(".tmm-loader")) {
    setTimeout(() => {
      document.querySelector(".tmm-loader-content-wrapper").opacity = 1;
      animateLoader;
    }, 500);
  }
});

// setTimeout(() => {
//   document.location.reload();
// }, 5000);
