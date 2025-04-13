let style = document.createElement('style');
style.textContent = `
p {
  background-color: #1E88E5;  
  color: white;
  }
`;
document.head.appendChild(style);


class LtagMap extends HTMLElement {


    connectedCallback() {

        let p = document.createElement("p");
        p.className = "ltag-p";
        p.innerText = "LTAG Map";
        this.appendChild(p);


    }

}


customElements.define('ltag-map', LtagMap);


/**
 * <ltag-map></ltag-map>
 *
 */
