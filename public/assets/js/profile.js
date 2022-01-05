document.addEventListener("DOMContentLoaded", function () {
  const userTextArea = document.querySelector(".user-description__text");
  userTextArea.addEventListener("blur", function (e) {
    fetch("/profileEdit", {
      method: "POST",
      body: JSON.stringify({ description: this.value }),
    })
      .then((res) => res.json())
      .then((res) => console.log(res));
  });
});
