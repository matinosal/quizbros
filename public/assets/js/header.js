document.addEventListener("DOMContentLoaded", function () {
  const eventsWithHandlers = {
    mouseenter(e) {
      e.srcElement.style.width = "250px";
      [...document.querySelectorAll(".header__desc")].forEach(
        (el) => (el.style.display = "block")
      );
    },
    mouseleave(e) {
      e.srcElement.style.width = "80px";
      [...document.querySelectorAll(".header__desc")].forEach(
        (el) => (el.style.display = "none")
      );
    },
  };

  const target = this.querySelector(".header-outer");
  Object.keys(eventsWithHandlers).map((eventName) => {
    target.addEventListener(eventName, eventsWithHandlers[eventName], false);
  });
});

/*
setTimeout(() => {
        [...document.querySelectorAll(".header__desc")].forEach(
          (el) => (el.style.display = "block")
        );
      }, 300);
       */
