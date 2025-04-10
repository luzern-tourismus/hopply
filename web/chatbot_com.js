class LtagChatbot extends HTMLElement {


    textarea;

    button;

    p;


    connectedCallback() {

        let domain = "https://chatbot.nemundo.ch"

        let local = this;
        let url = domain + "/api/question.php";

        this.textarea = document.createElement("textarea");
        this.textarea.className = "hopply-textarea";
        this.textarea.placeholder = "Frage Hopply ...";
        this.appendChild(this.textarea);

        this.button = document.createElement("button");
        this.button.className = "hopply-button";
        this.button.innerText = "Hopply fragen";
        this.button.addEventListener("click", function () {

            local.p.innerText = "Hopply denkt nach ...";


            fetch(url, {
                method: "POST", headers: {
                    "Content-Type": "application/json",
                }, body: JSON.stringify({question: local.textarea.value})
            })
                .then(response => response.json())
                .then(data => {
                        console.log(data);
                        //console.log(data.total_count);

                        local.p.innerText = data.answer;

                    }
                )
                .catch(error => console.error('Error:', error));


        });
        this.appendChild(this.button);


        this.p = document.createElement("p");
        this.p.className = "hopply-p";
        this.p.innerText = "";
        this.appendChild(this.p);

        // neue frage stellen


    }

}


customElements.define('hopply-chatbot', LtagChatbot);




