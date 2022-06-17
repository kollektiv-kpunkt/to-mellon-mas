if (document.querySelector(".tmm-donate-boxes")) {
  document.querySelectorAll(".tmm-donate-box").forEach(function (item) {
    item.addEventListener("click", function () {
      document
        .querySelector(".tmm-donate-box-selected")
        .classList.remove("tmm-donate-box-selected");
      item.classList.add("tmm-donate-box-selected");

      document
        .querySelector(".tmm-donate-boxes")
        .setAttribute(
          "data-donate-type",
          item.getAttribute("data-donate-type")
        );
    });
  });

  document
    .querySelector("button.tmm-donate-submit")
    .addEventListener("click", function () {
      let amount = "";
      if (
        document
          .querySelector(".tmm-donate-boxes")
          .getAttribute("data-donate-type") == "amount"
      ) {
        amount = document
          .querySelector(".tmm-donate-box-selected span")
          .getAttribute("data-amount");
      } else {
        amount = document.querySelector(".tmm-donate-box-selected input").value;
      }
      let link = this.getAttribute("data-link") + "?rnw-amount=" + amount;
      window.location.href = link;
    });
}
