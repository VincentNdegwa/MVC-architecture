const display = document.querySelector(".text-display");

if (display) {
  setTimeout(() => {
    display.style.transform = "translateY(-100%)";
    setTimeout(() => {
      display.style.display = "none";
    }, 2000);
  }, 3000);
}
