"use strict";

(function (d) {
  const MobileMenuBtn = d.querySelector(".js-mobile-menu-btn");
  const MobileMenu = d.querySelector(".js-mobile-menu");
  if (!MobileMenuBtn || !MobileMenu) return;
  MobileMenuBtn.addEventListener("click", () => {
    document.body.classList.toggle("mobile-menu-open");
  });
})(document);
