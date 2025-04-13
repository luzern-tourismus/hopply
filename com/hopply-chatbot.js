class LtagChatbot extends HTMLElement {


    textarea;

    button;

    p;

    button2;

    wait;


    connectedCallback() {

        let domain = "https://data.luzern.com";


        let local = this;
        //let url = domain + "/api/question.php";
        let url = domain + "/public/Hopply-public2/answer-public";


        this.textarea = document.createElement("textarea");
        this.textarea.className = "hopply-textarea";
        this.textarea.placeholder = "Frage Hopply etwas ...";
        this.appendChild(this.textarea);

        this.button = document.createElement("button");
        this.button.className = "hopply-button";
        this.button.innerText = "Hopply fragen";
        this.button.addEventListener("click", function () {

            //document.querySelector("*").style.cursor = "wait";
            /*document.querySelector("input").style.cursor = "wait";
            document.querySelector("button").style.cursor = "wait";*/

            //local.button.remove();

            local.wait = document.createElement("img");
            local.wait.src = domain + "/com/hopply-wait.svg";
            local.appendChild(local.wait);


            if (local.p !== undefined) {
                local.p.remove();
                local.button2.remove();
            }

            /*local.p = document.createElement("p");
            local.p.className = "hopply-p";
            local.p.innerText = "Hopply denkt nach ...";*/

            fetch(url, {
                method: "POST", headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                }, body: JSON.stringify({question: local.textarea.value})
            })
                .then(response => response.json())
                .then(data => {
                        console.log(data);
                        //console.log(data.total_count);

                        local.p = document.createElement("p");
                        local.p.className = "hopply-p";
                        //this.p.innerText = "";
                        local.p.innerText = data.answer;
                        local.appendChild(local.p);

                        local.button2 = document.createElement("button");
                        local.button2.className = "hopply-button";
                        local.button2.innerText = "Neue Frage stellen";
                        local.button2.addEventListener("click", function () {

                            /*local.button = document.createElement("button");
                            local.button.className = "hopply-button";
                            local.button.innerText = "Hopply fragen";
                            local.appendChild(local.button);*/

                            local.p.remove();
                            local.button2.remove();
                            local.textarea.value = "";
                            local.textarea.focus();

                        });

                        local.appendChild(local.button2);
                        local.wait.remove();

                        //document.querySelector("*").style.cursor = "default";
                        /*document.querySelector("input").style.cursor = "default";
                        document.querySelector("button").style.cursor = "default";*/


                    }
                )
                .catch(error => console.error('Error:', error));


        });
        this.appendChild(this.button);


        /*
        this.p = document.createElement("p");
        this.p.className = "hopply-p";
        this.p.innerText = "";
        this.appendChild(this.p);
*/
        // neue frage stellen


    }

}


customElements.define('hopply-chatbot', LtagChatbot);




