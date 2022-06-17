import { v4 as uuidv4 } from "uuid";

const formUUID = uuidv4();

function formLogic(form) {
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    let endpoint = this.getAttribute("data-endpoint");
    var formData = {};
    for (const pair of new FormData(form).entries()) {
      formData[pair[0]] = pair[1];
    }
    formData.uuid = formUUID;
    (async () => {
      const rawResponse = await fetch(`api/v1/${endpoint}`, {
        method: "POST",
        headers: {
          // Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      });
      const content = await rawResponse.json();
      console.log(content);
      if (!content.success) {
        alert(content.message);
        return;
      }
      let type = this.getAttribute("data-type");
      if (type == "multistep") {
        let nameSpace = this.getAttribute("data-namespace");
        let nextStep = document.querySelector(
          `form[data-namespace="${nameSpace}"][data-step="${content.nextStep}"]`
        );
        nextStep.querySelector("input[name=formData]").value = JSON.stringify(
          content.formData
        );
        let scrollOffset =
          this.getBoundingClientRect().top + window.scrollY - 100;
        if (scrollOffset > window.scrollY) {
          scrollOffset = window.scrollY;
        }
        this.hidden = true;
        scrollTo({
          top: scrollOffset,
          behavior: "smooth",
        });
        nextStep.hidden = false;
      } else if (type == "message") {
        let alert = this.querySelector(".tmm-response-alert");
        alert.querySelector("span").innerText = content.message;
        this.reset();
        alert.hidden = false;
      }
    })();
  });
}

if (document.querySelector("form.tmm-api-form")) {
  document.querySelectorAll("form.tmm-api-form").forEach((form) => {
    formLogic(form);
  });
}

document
  .querySelectorAll(".tmm-share-buttons .tmm-button")
  .forEach(function (button) {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      let mobimsg = document
        .querySelector(".tmm-share-buttons")
        .getAttribute("data-sharetext");
      let url = window.location.href.split("#")[0];
      let button = e.target;
      let type = button.getAttribute("data-type");
      if (type == "whatsapp") {
        window.open(
          `https://api.whatsapp.com/send/?text=${encodeURIComponent(
            mobimsg
          )}%0A${encodeURIComponent(url)}`
        );
      } else if (type == "telegram") {
        window.open(
          `https://t.me/share/url?url=${encodeURIComponent(
            url
          )}&text=${encodeURIComponent(mobimsg)}`
        );
      } else if (type == "facebook") {
        window.open(
          `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(
            url
          )}`
        );
      } else if (type == "email") {
        window.open(
          `mailto:?body=${encodeURIComponent(mobimsg)}%0A${encodeURIComponent(
            url
          )}`
        );
      }
    });
  });
