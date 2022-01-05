document.addEventListener("DOMContentLoaded", async function () {
  const nextButton = document.querySelector(".next-question");
  const prevButton = document.querySelector(".previous-question");
  let block = true;
  let order = 0;
  let questions = [];
  prevButton.addEventListener("click", function () {
    if (questions.length == 0) return;
    order -= 1;
    changeQuestion(order, questions, nextButton);
    if (order <= 0) this.style.visibility = "hidden";
  });

  nextButton.addEventListener("click", function () {
    if (questions.length == 0) return;
    order += 1;
    changeQuestion(order, questions, prevButton);
    if (order <= questions.length - 1) this.style.visibility = "hidden";
  });
  questions = await getQuestions();
});

async function getQuestions() {
  const id = parseInt(window.location.href.split("/").pop());
  let reqData = new FormData();
  reqData.append("id", id);

  const data = await fetch("/getQuestions", {
    method: "POST",
    body: reqData,
  }).then((req) => req.json());

  return data;
}

function changeQuestion(i, data, secondButton) {
  document.querySelector(".question__content").innerHTML = data[i].question;
  [...document.querySelectorAll(".answer__content")].forEach(
    (element, index) => {
      element.innerHTML = data[i].answers[index];
    }
  );
  secondButton.style.visibility = "visible";
}
