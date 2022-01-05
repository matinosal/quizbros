document.addEventListener("DOMContentLoaded", function () {
  const inputs = [...document.querySelectorAll("form input")].filter(
    (el) => el.type != "submit"
  );
  const form = document.querySelector("form");
  document
    .querySelector(".security-form__submit")
    .addEventListener("click", function () {
      let passed = true;
      inputs.forEach((el) => {
        if (el.value == "") passed = false;
        else if (el.type == "checkbox" && !el.checked) passed = false;
      });
      if (passed) form.submit();
    });
  inputs
    .filter((el) => el.type == "checkbox")
    .forEach((el) => {
      el.parentElement.addEventListener("click", (e) => {
        if (e.target != el) el.checked = !el.checked;
      });
    });
});
