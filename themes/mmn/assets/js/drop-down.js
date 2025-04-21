class DropDown extends HTMLElement {
  constructor() {
    super();
  }

  get header() {
    return this._header || null;
  }

  set header(ele) {
    this._header = ele;
    ele.addEventListener("click", this.clickEvent.bind(this));
  }

  clickEvent() {
    this.classList.toggle("active");
  }

  connectedCallback() {
    this.header = this.querySelector("[data-header]");
  }
}

customElements.define("drop-down", DropDown);
