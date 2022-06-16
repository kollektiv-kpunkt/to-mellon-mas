window.addEventListener("keypress", function (e) {
  if (!e.shiftKey) {
    return;
  }
  if (e.key == "C") {
    let designSystem = parseInt(
      document
        .querySelector("html")
        .getAttribute("data-design-system")
        .split("tmm-ds")[1]
    );
    let newSystem;
    if (designSystem == 3) {
      newSystem = 1;
    } else {
      newSystem = designSystem + 1;
    }
    document
      .querySelector("html")
      .setAttribute("data-design-system", "tmm-ds" + newSystem);
    document.querySelector("html").classList.add("tmm-ds" + newSystem);
    document.querySelector("html").classList.remove("tmm-ds" + designSystem);
  }
});
