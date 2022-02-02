document.addEventListener("DOMContentLoaded", function () {
  const eventsWithHandlers = {
    mouseenter(e) {
      e.srcElement.style.width = "250px";
      showSpans();
    },
    mouseleave(e) {
      e.srcElement.style.width = "80px";
      hideSpans();
    },
  };

  const target = this.querySelector(".header-outer");
  let mobile = false;
  Object.keys(eventsWithHandlers).map((eventName) => {
    target.addEventListener(eventName, eventsWithHandlers[eventName], false);
  });

  this.querySelector(".mobile-icon").addEventListener("click", () => {
    target.style.display = "block";
    target.style.width = "250px";
    showSpans();
    setTimeout(() => {
      mobile = true;
    }, 1000);
  });

  this.addEventListener("click", () => {
    if (mobile) {
      target.style.display = "none";
      hideSpans();
      mobile = false;
    }
  });
});
function showSpans() {
  [...document.querySelectorAll(".header__desc")].forEach(
    (el) => (el.style.display = "block")
  );
}
function hideSpans() {
  [...document.querySelectorAll(".header__desc")].forEach(
    (el) => (el.style.display = "none")
  );
}
