"use strict";

class TheGallery extends HTMLElement {
  constructor() {
    super();
  }

  get active() {
    return JSON.parse(this.getAttribute('active'));
  }

  set active(v) {
    this.setAttribute('active', JSON.stringify(v));
  }

  get gallery() {
    return this._gallery;
  }

  set gallery(ele) {
    this._gallery = this.querySelector(ele);
  }

  open(e) {
    this.buildGallery(e.detail.images);
  }

  close() {
    this.open = false;
  }
  
  buildGallery(images) {
    const DOM = new DocumentFragment();
    this.images = [];

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

  listeners() {
    document.body.addEventListener("gallery:open", this.open.bind(this));
    document.body.addEventListener("gallery:close", this.close.bind(this));
    // document.body.addEventListener("gallery:more", this.more.bind(this));
    // document.body.addEventListener("gallery:prev", this.prev.bind(this));
    // document.body.addEventListener("gallery:next", this.next.bind(this));
  }

  connectedCallback() {
    this.gallery = '.gallery-images';
    this.listeners();
  }
}
customElements.define("the-gallery", TheGallery);


class GalleryItem extends HTMLElement {
  constructor() {
    super();
  }

  get type() {
    return this.getAttribute('item-type') || 'open';
  }

  get detail() {
    return JSON.parse(this.querySelector('[type="application/json"]').textContent) || {};
  }

  click() {
    document.body.dispatchEvent(new CustomEvent(
      "gallery:" + this.type, {
        detail: this.detail
      } 
    ));
  }

  connectedCallback() {
    this.addEventListener('click', this.click.bind(this));
  }
}
customElements.define("gallery-item", GalleryItem);