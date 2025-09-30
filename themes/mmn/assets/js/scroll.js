"use strict";

const lerp = (from, to, ease) => from * (1 - ease) + to * ease;
const clamp = (v, min = 0, max = 100) => Math.min(Math.max(min, v), max);
const screenWidth = () => window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

const isFrontPage = document.body.classList.contains("home");
let lastScreenWidth = screenWidth();

const watchScrollSections = () => {
  let elements = Array.from(document.querySelectorAll(".js-scroll-section"));

  if (elements.length === 0) return;

  const defaultProgressFrom = 1.0; // Calculates the progress from this point on screen (E.g. 1.0 = top of window, 0.0 = bottom of window, 0.5 = the middle of window)
  const ease = 0.1;

  let ticking = false;
  let progressing = false;

  elements = elements.map((element) => {
    let progressFrom = defaultProgressFrom;

    if (element.dataset.progressFrom) {
      progressFrom = parseFloat(element.dataset.progressFrom);
    }

    return {
      element: element,
      progress: 0,
      progressFrom: window.innerHeight * progressFrom,
    };
  });
  
  const progressElement = (elementObject) => {
    const rect = elementObject.element.getBoundingClientRect();
    const progressGoal = 100 - ((rect.bottom - elementObject.progressFrom) / rect.height * 100);
    const currentProgress = clamp(lerp(elementObject.progress, progressGoal, ease));

    if (currentProgress === elementObject.progress) return false;

    elementObject.progress = currentProgress;
    elementObject.element.style.setProperty('--progress', currentProgress);
    
    return true;
  };

  const progressElements = () => {
    const progressedElements = elements.map((element) => progressElement(element));
    const hasProgressedAnElement = progressedElements.filter((element) => element === true).length > 0 || false;
    
    if (hasProgressedAnElement) {
      window.requestAnimationFrame(progressElements);
    } else {
      progressing = false;
    }
  };

  window.addEventListener("scroll", () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        if (!progressing) {
          progressing = true;
          progressElements(new Date());
        }
        
        ticking = false;
      });
      
      ticking = true;
    }
  });
};

watchScrollSections();

const watchScrollDirection = () => {
  const header = document.querySelector("#Header");
  const frontPageScroller = document.querySelector(".js-front-page-scroller");
  
  if (!header) return;
  
  const hideClass = "Header--hide";

  let ticking = false;
  let previousScrollPosition = 0;

  const handleHeader = (scrollPosition) => {
    const hasScrolled = scrollPosition > 0;
    const isHidden = header.classList.contains(hideClass);
    const isScrollingUp = previousScrollPosition > scrollPosition;

    if (!hasScrolled) return;

    if (isHidden && isScrollingUp) {
      header.classList.remove(hideClass);
    }

    if (!isHidden && !isScrollingUp) {
      let hide = true;
      
      if (isFrontPage && frontPageScroller) {
        if (frontPageScroller.getBoundingClientRect().bottom >= window.scrollY - window.innerHeight / 4) {
          hide = false;
        }
      }

      if (hide) {
        header.classList.add(hideClass);
      }
    };

    previousScrollPosition = scrollPosition;
  };

  window.addEventListener("scroll", () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        handleHeader(window.scrollY);

        ticking = false;
      });
    }

    ticking = true;
  });
}

watchScrollDirection();

const watchFrontPageScroller = () => {
  if (!isFrontPage) return;

  const SCROLLER_SECTION = document.querySelector(".js-front-page-scroller");
  const MAIN_CONTENT = document.querySelector(".js-front-page-main-wrapper");
  const TITLE_WRAPPER = SCROLLER_SECTION.querySelector(".js-front-page-scroller-title-wrapper");
  const TITLE_PORTFOLIO = SCROLLER_SECTION.querySelector(".js-front-page-scroller-title-portfolio");
  const SCROLL_NOTIFICATION = SCROLLER_SECTION.querySelector(".js-front-page-scroller-notification-text");
  
  if (!MAIN_CONTENT || !TITLE_WRAPPER) return;

  
  let scrollerSectionRect, totalTransformAmount, distance;

  const setBoundryValues = () => {
    scrollerSectionRect = SCROLLER_SECTION.getBoundingClientRect();
    totalTransformAmount = TITLE_WRAPPER.getBoundingClientRect().width - scrollerSectionRect.width;
    distance = scrollerSectionRect.height - window.innerHeight;
  };

  setBoundryValues();

  window.addEventListener("resize", () => {
    if (screenWidth() === lastScreenWidth) return;

    setBoundryValues();
  });

  /**
   * "BUG": Not quite sure why, but instead of going below 0, it would start using floating point numbers, and never go below 0. 
   * The IF-statements below prevents that, using this clampMin.
  */
  const clampMin = 0.000005;
  
  let ticking = false;
  let progressing = false;
  let progresses = {
    transform: 0,
    fade: 0,
  };

  const progressTransform = (rect) => {
    let goal = 100 - ((rect.top - window.innerHeight) / distance * 100);
    let updatedProgress = clamp(lerp(progresses.transform, goal, 0.2), clampMin);
    
    if (updatedProgress === clampMin) {
      updatedProgress = 0;
    }
    
    if (updatedProgress !== progresses.transform) {
      let transformStringWrapper = "translateX(" + (totalTransformAmount / 100 * updatedProgress * -1) + "px)";
      let transformStringPortfolio = "translateX(" + (totalTransformAmount / 12 / 100 * updatedProgress * -1) + "px)";
      
      TITLE_WRAPPER.style.mozTransform = transformStringWrapper;
      TITLE_WRAPPER.style.webkitTransform = transformStringWrapper;
      TITLE_WRAPPER.style.transform = transformStringWrapper;

      TITLE_PORTFOLIO.style.mozTransform = transformStringPortfolio;
      TITLE_PORTFOLIO.style.webkitTransform = transformStringPortfolio;
      TITLE_PORTFOLIO.style.transform = transformStringPortfolio;

      SCROLL_NOTIFICATION.style.mozTransform = transformStringWrapper;
      SCROLL_NOTIFICATION.style.webkitTransform = transformStringWrapper;
      SCROLL_NOTIFICATION.style.transform = transformStringWrapper;
  
      progresses.transform = updatedProgress;
      return true;
    } 

    return false;
  }

  const progressFade = (rect) => {
    if (rect.top > window.innerHeight && progresses.fade === 0) {
      return false;
    };

    
    let goal = 100 - (rect.top / window.innerHeight * 100);
    let updatedProgress = clamp(lerp(progresses.fade, goal, 0.2), clampMin);
    
    if (updatedProgress === clampMin) {
      updatedProgress = 0;
    }
    
    if (updatedProgress !== progresses.fade) {
      SCROLLER_SECTION.style.setProperty("--fade-progress", updatedProgress);

      progresses.fade = updatedProgress;
      return true;
    } 

    return false;
  }
  
  const progressSection = () => {
    let rect = MAIN_CONTENT.getBoundingClientRect();

    const TRANSFORMED = progressTransform(rect);
    const FADED = progressFade(rect);

    if (!TRANSFORMED && !FADED) {
      progressing = false;
    } else {
      window.requestAnimationFrame(progressSection);
    }
  }

  const startLoop = () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        if (!progressing) {
          progressing = true;
          progressSection();
        }

        ticking = false;
      });

      ticking = true;
    }
  }

  window.addEventListener("scroll", () => {
    startLoop();
  });
};

watchFrontPageScroller();