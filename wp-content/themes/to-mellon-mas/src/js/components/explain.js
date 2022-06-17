if (document.querySelector("a.tmm-explain-link")) {
  document.querySelectorAll("a.tmm-explain-link").forEach(function (item) {
    item.addEventListener("click", function () {
      let explaincontainer = document.querySelector(
        ".tmm-explain-container-wrapper p"
      );
      explaincontainer.innerHTML = this.getAttribute("data-explanation");
    });
  });
}
