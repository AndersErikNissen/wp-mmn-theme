"use strict";

(function (d, w) {
  const MOBILE_MENU_BTNS = d.querySelectorAll(".js-mobile-menu-btn");
  const MOBILE_MENU = d.querySelector(".js-mobile-menu");
  let isInactive = true;

  if (MOBILE_MENU_BTNS.length === 0 || !MOBILE_MENU) return;
  
  const closeMenu = () => {
    MOBILE_MENU.classList.remove("mobile-menu-open");
    MOBILE_MENU.classList.remove("mobile-menu-animate");
    
    isInactive = true;
  };

  MOBILE_MENU_BTNS.forEach((btn) => {
    btn.addEventListener("click", () => {
      if (isInactive) {
        isInactive = false;

        MOBILE_MENU.classList.add("mobile-menu-open");
        
        w.requestAnimationFrame(() => {
          MOBILE_MENU.classList.add("mobile-menu-animate");
        });
      } else {
        closeMenu();
      }
    });
  });

  document.body.addEventListener("keyup", (e) => {
    if (e.key === "Escape") {
      closeMenu();
    }
  });
})(document, window);
