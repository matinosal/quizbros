document.addEventListener("DOMContentLoaded", function () {
  this.querySelector(".quiz-name").addEventListener("blur", async function () {
    const quizSelect = document.querySelector(".room__quiz-select");
    clearSelect(quizSelect);
    const data = await getQuizes(this.value);
    data.forEach((el) => {
      let option = document.createElement("option");
      option.value = el.id;
      option.innerHTML = el.name;
      quizSelect.append(option);
    });
    if (quizSelect.children.length > 1)
      quizSelect.querySelector("option").remove();
    else
      quizSelect.querySelector("option").innerHTML =
        "Brak quizu o takiej nazwie, spróbuj innej";
  });

  this.querySelector(".room__button").addEventListener("click", function () {
    const invalidInputsNum = [...document.querySelectorAll(".input-holder")]
      .map((el) => el.children)
      .reduce((a, b) => [...a].concat([...b]))
      .filter((input) => input.value == 0 || input.value == "").length;
    if (invalidInputsNum != 0) console.log(invalidInputsNum);
    else document.querySelector("form").submit();
  });
});
async function getQuizes(name) {
  return await fetch("/getQuizes", {
    method: "POST",
    body: JSON.stringify({ name: name }),
  }).then((res) => res.json());
}

function clearSelect(target) {
  target.querySelectorAll("option").forEach((el) => el.remove());
  const option = document.createElement("option");
  target.append(
    Object.assign(document.createElement("option"), {
      disabled: true,
      innerHTML: "Dane są ładowane proszę czekać",
    })
  );
}
