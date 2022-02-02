document.addEventListener("DOMContentLoaded", function () {
  const eventsWithHandlers = {
    mouseenter(e) {
      e.srcElement.style.width = "250px";
      showSpans();
    },
    mouseleave(e) {
      if (!mobile) e.srcElement.style.width = "80px";
      else {
        e.srcElement.style.display = "none";
      }
      hideSpans();
    },
  };

  const target = this.querySelector(".header-outer");
  let mobile = false;
  Object.keys(eventsWithHandlers).map((eventName) => {
    target.addEventListener(eventName, eventsWithHandlers[eventName], false);
  });

  this.querySelector(".mobile-icon").addEventListener("click", () => {
    mobile = true;
    target.style.display = "block";
    target.style.width = "250px";
    showSpans();
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
