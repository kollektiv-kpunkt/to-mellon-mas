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
      let type = this.getAttribute("data-type");
      console.log(type);
      if (type == "multistep") {
        console.log("uwu");
      }
      //   if (content.success) {
      //     if (content.action == "nextStep") {
      //       if (content.nextStep) {
      //         nextStep = content.nextStep;
      //       }
      //       this.querySelector(
      //         `.CtAStep[data-step-id='form-step${step}']`
      //       ).setAttribute("hidden", true);
      //       this.querySelector(
      //         `.CtAStep[data-step-id='form-step${nextStep}']`
      //       ).removeAttribute("hidden");
      //     } else if (content.action == "redirect") {
      //       window.location.href = content.redirect;
      //     }
      //   } else {
      //     console.log(content);
      //     alert("Something went wrong. Please try again.");
      //   }
    })();
  });
}

if (document.querySelector("form.tmm-api-form")) {
  document.querySelectorAll("form.tmm-api-form").forEach((form) => {
    formLogic(form);
  });
}
