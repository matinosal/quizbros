document.addEventListener("DOMContentLoaded", function () {
  let selectedQuiz = null;
  let questionData = null;
  [...this.querySelectorAll(".quiz-short")].forEach((el) => {
    el.addEventListener("click", async () => {
      if (selectedQuiz != null) {
        deselectQuiz(selectedQuiz);
        selectedQuiz = null;
      }

      const parent = el.parentElement;
      const details = parent.querySelector(".quiz-details");

      details.style.display = "block";

      selectedQuiz = parent;
      questionData = await fetch("/getQuestions", {
        method: "POST",
        body: JSON.stringify({ id: parent.getAttribute("data-id") }),
      }).then((res) => res.json());
      if (selectedQuiz == parent) createNav(details, questionData);
    });
  });

  [...this.querySelectorAll(".fa-times")].forEach((el) =>
    el.addEventListener("click", function () {
      deselectQuiz(selectedQuiz);
      selectedQuiz = null;
    })
  );
});

function deselectQuiz(quiz, data) {
  quiz.querySelector(".quiz-details").style.display = "none";
  removeNav(quiz);
}
removeNav = (target) => {
  try {
    target.querySelector(".quiz-details__navigation").remove();
  } catch (e) {
    return;
  }
};

function createNav(container, data) {
  const navContainer = createElement("div", "quiz-details__navigation");
  const left = navButton(true);
  const right = navButton(false);
  let currentQuestion = 0;
  console.log(data);
  left.addEventListener("click", () => {
    if (data.length == 0) return;
    currentQuestion -= 1;
    clickHandler(container, data, currentQuestion);
    right.style.visibility = "visible";
    if (currentQuestion <= 0) left.style.visibility = "hidden";
  });
  right.addEventListener("click", () => {
    currentQuestion += 1;
    clickHandler(container, data, currentQuestion);
    left.style.visibility = "visible";
    if (currentQuestion >= data.length - 1) right.style.visibility = "hidden";
  });
  navContainer.append(left);
  navContainer.append(right);
  container.append(navContainer);
}

function navButton(isLeft) {
  const button = createElement(
    "div",
    isLeft ? "previous-question" : "next-question"
  );
  button.append(
    createElement("i", "fas", `fa-chevron-${isLeft ? "left" : "right"}`)
  );
  button.innerHTML = isLeft
    ? `${button.innerHTML} Poprzednie`
    : `Następne ${button.innerHTML} `;
  return button;
}

function createElement(el, ...classes) {
  const element = document.createElement(el);
  classes.forEach((class_) => element.classList.add(class_));
  return element;
}
function clickHandler(container, data, order) {
  const question = data[order];
  const wrongAnswers = question.answers.filter((el) => el != question.correct);
  const rightAnswer = question.correct;
  container.querySelector(".quiz-details__question-content").innerHTML =
    question.question;
  container.querySelectorAll(".question-number").innerHTML = order + 1;
  [...container.querySelectorAll(".answer-wrong")].forEach(
    (el, i) => (el.innerHTML = wrongAnswers[i])
  );
  container.querySelector(".answer-right").innerHTML = rightAnswer;
}
