document.addEventListener("DOMContentLoaded", function () {
  let questions = [];
  let currentQuestion = 0;
  let checked = null;
  let block = false;
  const questionText = this.querySelector(".quiz-creator__question-text");
  const answers = [...this.querySelectorAll(".quiz-creator__answer")];
  const previous = this.querySelector(".quiz-creator__previous");
  const next = this.querySelector(".quiz-creator__next");
  questions.push(new Question());

  this.querySelector(".quiz-creator__next-question").addEventListener(
    "click",
    () => {
      questions[currentQuestion].setValues(questionText, answers);
      if (!questions[currentQuestion].selfCheck()) {
        return; // dodac tutaj jakies warningi jakby cos bylo nie tak
      }
      questionText.value = "";
      questionText.placeholder = `Pytanie ${currentQuestion + 2}`;
      answers.forEach((el, i) => {
        el.children[0].classList.remove("checked");
        const input = el.children[1];
        input.value = "";
        input.placeholder = `Odpowiedź ${i + 1}`;
      });
      questions.push(new Question());
      currentQuestion += 1;
      previous.style.visibility = "visible";
      next.style.visibility = "hidden";
    }
  );

  next.addEventListener("click", function () {
    currentQuestion += 1;
    if (currentQuestion <= questions.length - 1)
      this.style.visibility = "hidden";
    setFieldsValues(
      questions[currentQuestion],
      currentQuestion,
      questionText,
      answers
    );
    previous.style.visibility = "visible";
  });

  previous.addEventListener("click", function () {
    currentQuestion -= 1;
    if (currentQuestion <= 0) this.style.visibility = "hidden";
    setFieldsValues(
      questions[currentQuestion],
      currentQuestion,
      questionText,
      answers
    );
    next.style.visibility = "visible";
  });

  [...this.querySelectorAll(".quiz-creator__question .fa-check")].forEach(
    (el) =>
      el.addEventListener("click", () => {
        if (checked != null) checked.classList.remove("checked");
        el.classList.add("checked");
        checked = el;
      })
  );

  this.querySelector(".quiz-creator__save").addEventListener(
    "click",
    async () => {
      const title = this.querySelector(
        ".quiz-creator__title-input"
      ).value.trim();

      if (questions.length - 1 == currentQuestion)
        questions[currentQuestion].setValues(questionText, answers);

      if (
        !questions[questions.length - 1].selfCheck() ||
        title == "" ||
        block
      ) {
        return; // dodac tutaj jakies warningi jakby cos bylo nie tak
      }

      block = true;

      const data = await fetch("/addQuiz", {
        method: "POST",
        body: JSON.stringify({ objects: questions, quizname: title }),
      }).then((req) => req.json());

      if (!data.success) {
        return;
      }

      let children = [...this.querySelector(".quiz-creator").children];
      const last_child = children.pop();
      const first_child = children.shift();

      children.forEach((el) => el.remove());
      last_child.classList.remove("hidden");
      first_child.querySelector(
        "p"
      ).innerHTML = `Quiz został dodany! Co chcesz teraz zrobić?`;
    }
  );
});
function setFieldsValues(question, current, text, answers) {
  text.value = question.text ?? `Pytanie ${current + 1}`;
  answers.forEach((el, i) => {
    let input, icon;
    [icon, input] = el.children;
    i == question.checked
      ? icon.classList.add("checked")
      : icon.classList.remove("checked");
    input.value = question.answers[i] ?? `Odpowiedź ${i + 1}`;
  });
}
class Question {
  text = "";
  answers = [];
  checked = -1;

  get text() {
    this.text = str;
  }
  get answers() {
    this.answers = arr;
  }
  get checked() {
    this.checked = i;
  }
  setText(str) {
    this.text = str;
  }
  setAnswers(arr) {
    this.answers = arr;
  }
  setChecked(i) {
    this.checked = i;
  }
  selfCheck() {
    if (this.text != "" && this.answers.length == 4 && this.checked != -1)
      return true;
    return false;
  }
  setValues(text, answers) {
    this.text = text.value.trim();
    if (this.text == "") return;

    this.answers = answers
      .map((el, i) => {
        let icon, input;
        [icon, input] = el.children;
        if (icon.classList.contains("checked")) this.checked = i;
        return input.value.trim();
      })
      .filter((val) => val != "");
  }
}
