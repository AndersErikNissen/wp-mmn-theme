const watchScrollSections = () => {
  let elements = Array.from(document.querySelectorAll(".js-scroll-section"));

  if (elements.length === 0) return;

  const defaultProgressFrom =  window.innerHeight * 1.0; // Calculates the progress from this point on screen (E.g. 1.0 = top of window, 0.0 = bottom of window, 0.5 = the middle of window)
  const ease = 0.1;

  let ticking = false;
  let progressing = false;

  const lerp = (from, to) => from * (1 - ease) + to * ease;
  const clamp = (v, min = 0, max = 100) => Math.min(max, Math.max(min, v));

  elements.map((element) => {  
    return {
      element: element,
      progress: 0,
      progressFrom: target.dataset.progressFrom ?? defaultProgressFrom,
    };
  });

  
  const progressElement = (element) => {
    const rect = element.getBoundingClientRect();
    const progressGoal = 100 - ((rect.bottom - element.progressFrom) / rect.height * 100);
    const currentProgress = clamp(lerp(element.progress, progressGoal));

    if (currentProgress === element.progress) return false;

    element.progress = currentProgress;
    element.element.style.setProperty('--progress', currentProgress);
    
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
          progressElements();
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
      header.classList.add(hideClass);
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



function swipeGalleryOnScroll() {
  // Only run if a gallery section is rendered
  const gallery = document.body.querySelector('.section-gallery') || false;
  
  if (!gallery) return;

  const imageContainers = gallery.querySelectorAll(".section-gallery__image-container");
  const galleryWidth = gallery.getBoundingClientRect().width;
  const imagesWidth = imageContainers[0].getBoundingClientRect().left + imageContainers[imageContainers.length - 1].getBoundingClientRect().right;
  
  if (galleryWidth >= imagesWidth) return;
  
  // Animation loop
  const images = gallery.querySelector(".section-gallery__images");
  const heightDivider = 2; // If 2, the swiping starts when the top is at the middle of the viewport

  let ticking = false;
  let looping = false;
  let cache = 0;
  
  // Reference: https://www.trysmudford.com/blog/linear-interpolation-functions/
  const clamp = (v, min = 0, max = 100) => Math.min(max, Math.max(min, v));
  const lerp = (from, to, ease) => from * (1 - ease) + to * ease;
  
  const maxTransform = imagesWidth - galleryWidth;

  function loop() {
    const rect = gallery.getBoundingClientRect();
    const current = 100 - ((rect.bottom - (window.innerHeight / heightDivider)) / rect.height * 100);
    const progress = clamp(lerp(cache, current, 0.1));
    
    if (cache !== progress) {
      const transformString = "translateX(-" + (maxTransform / 100 * progress) + "px)";
      
      images.style.mozTransform = transformString;
      images.style.webkitTransform = transformString;
      images.style.transform = transformString;
      
      cache = progress;
      window.requestAnimationFrame(loop);
    } else {
      looping = false;
    }
  }

  window.addEventListener("scroll", () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        if (!looping) {
          looping = true;
          loop();
        }

        ticking = false;
      });

      ticking = true;
    }
  });
}
swipeGalleryOnScroll();

function handleHeaderVisibility() {
  const header = document.querySelector("#Header");
  const headerHeight = header.getBoundingClientRect().height;

  let isShowing = true;
  let lastScrollY = 0;

  function toggleVisibility(scrollY) {
    const isScrollingDown = scrollY > lastScrollY;
    let hide = isScrollingDown;
    
    if (hide && headerHeight + /* some buffer -> */ 200 > scrollY) hide = false;

    if (hide === isShowing) {
      isShowing = !isShowing;
      header.classList.toggle('header-hidden');
    }

    lastScrollY = scrollY;
  }

  let ticking = false;

  function debounce() {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        toggleVisibility(window.scrollY);
        ticking = false;
      });

      ticking = true;
    }
  }

  window.addEventListener("scroll", debounce);
}

handleHeaderVisibility();

window.addEventListener("resize", () => {
  swipeGalleryOnScroll();
  handleHeaderVisibility();
});