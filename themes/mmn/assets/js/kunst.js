class KunstGallery extends HTMLElement {
  constructor() {
    super();
  }
}
customElements.define("kunst-gallery", KunstGallery);

class KunstItem extends HTMLElement {
  constructor() {
    super();
  }

  get data() {
    return JSON.parse(this.querySelector('[type="application/json"]').textContent);
  }

  clickEvent() {
    const EVENT = new CustomEvent("kunst-item:click", {
      detail: this
    });
    
    document.body.dispatchEvent(EVENT);
  }

  connectedCallback() {
    this.addEventListener('click', this.clickEvent.bind(this));
    console.log("kunst-item", this.data)
  }
}
customElements.define("kunst-item", KunstItem);