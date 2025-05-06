"use strict";

class TheGallery extends HTMLElement {
  constructor() {
    super();
  }

  activeImageIndex = 0;
  images = [];

  hasSingleImage() {
    this.images.length === 1 ? this.setAttribute('single-image', '') : this.removeAttribute('single-image');
  }

  open(e) {
    this.buildGallery(e.detail.images);
    this.buildAsideContent(e.detail.content);
    this.hasSingleImage();
    this.changeImage(0);
    document.body.classList.add('gallery-active');
  }
  
  close() {
    this.images = [];
    this.activeImageIndex = 0;
    this.resetAside();

    if (document.body.classList.contains('gallery-active')) {
      document.body.classList.remove('gallery-active');   
    }
  }
  
  buildGallery(images) {
    const DOM = new DocumentFragment();

    for (const key in images) {
      let wrapper = document.createElement("div");
      wrapper.innerHTML = `
        <img src="${images[key].src}" srcset="${images[key].srcset}" sizes="(max-width: 1899px) 100vw, 1900px" />
      `;
      wrapper.classList.add("gallery-image-wrapper")
      this.images.push(wrapper);
      DOM.appendChild(wrapper);
    }
    
    this.gallery.replaceChildren(DOM);
  }

  changeImage(modifer) {
    this.images[this.activeImageIndex].classList.remove('active');
    this.activeImageIndex = this.activeImageIndex + modifer;
    
    if (this.activeImageIndex >= this.images.length) {
      this.activeImageIndex = 0;
    } else if (this.activeImageIndex < 0) {
      this.activeImageIndex = this.images.length - 1;
    };
    
    this.images[this.activeImageIndex].classList.add('active');
  }

  resetAside() {
    this.classList.remove('closed-aside');
    this.classList.remove('disabled-aside');
  }

  toggleAside() {
    this.classList.toggle('closed-aside');
  }

  buildAsideContent(content) {
    if (content) {
      this.asideContent.innerHTML = content;
    } else {
      this.classList.add('disabled-aside');
    };
  }

  listeners() {
    document.body.addEventListener("gallery:open", this.open.bind(this));
    document.body.addEventListener("gallery:close", this.close.bind(this));
    document.body.addEventListener("gallery:aside", this.toggleAside.bind(this));
    document.body.addEventListener("gallery:prev", () => this.changeImage(-1));
    document.body.addEventListener("gallery:next", () => this.changeImage(1));
  }

  connectedCallback() {
    this.gallery = this.querySelector('.gallery-images');
    this.asideContent = this.querySelector('.gallery-aside-content');
    this.listeners();
  }
}
customElements.define("the-gallery", TheGallery);


class GalleryBtn extends HTMLElement {
  constructor() {
    super();
  }

  get type() {
    return this.getAttribute('item-type');
  }

  click() {
    document.body.dispatchEvent(new CustomEvent(
      "gallery:" + this.type 
    ));
  }

  connectedCallback() {
    this.addEventListener('click', this.click.bind(this));
  }
}
customElements.define("gallery-btn", GalleryBtn);


class GalleryItem extends HTMLElement {
  constructor() {
    super();
  }

  get detail() {
    return JSON.parse(this.querySelector('[type="application/json"]').textContent) || {};
  }

  click() {
    document.body.dispatchEvent(new CustomEvent(
      "gallery:open", {
        detail: this.detail
      } 
    ));
  }

  connectedCallback() {
    this.addEventListener('click', this.click.bind(this));
  }
}
customElements.define("gallery-item", GalleryItem);