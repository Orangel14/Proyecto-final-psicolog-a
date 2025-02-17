//
// wizard.js
// Dashkit module
//

import { Tab } from "bootstrap";
const showNextTab = (toggle, panes, tab) => {
    // Hide all tabs
    panes.forEach((tab) => {
        tab.classList.remove("active");
        tab.classList.remove("show");
    });
    // Toggle new tab
    var element = tab._element.hash;
    element = document.querySelector(element);
    console.log(element);
    element.classList.add("active");
    element.classList.add("show");

    // Remove active state
    toggle.classList.remove("active");
    // if toggle has data-add-required
    if (toggle.dataset.addRequired) {
        //find all inputs inside toggle.dataset.addRequired and put required and input has not data-optional
        let elementInputs = document
            .querySelector(toggle.dataset.addRequired)
            .querySelectorAll("input:not([data-optional])");
        elementInputs.forEach((element) => {
            element.setAttribute("required", true);
        });
        //select all inputs inside toggle.dataset.addRequired and put required and input has not data-optional
        let elementSelects = document
            .querySelector(toggle.dataset.addRequired)
            .querySelectorAll("select:not([data-optional])");
        elementSelects.forEach((element) => {
            element.setAttribute("required", true);
        });
    }
    if (toggle.dataset.removeRequired) {
        //find all inputs inside toggle.dataset.removeRequired and put required and input has not data-optional
        let elementInputs = document
            .querySelector(toggle.dataset.removeRequired)
            .querySelectorAll("input");
        elementInputs.forEach((element) => {
            element.setAttribute("required", true);
        });
        //select all inputs inside toggle.dataset.removeRequired and put required and input has not data-optional
        let elementSelects = document
            .querySelector(toggle.dataset.removeRequired)
            .querySelectorAll("select");
        elementSelects.forEach((element) => {
            element.setAttribute("required", true);
        });
    }
};
const checkInputsRemote = async (form, toggle, panes, tab) => {
    const inputs = form.querySelectorAll("input[required][data-validate]");
    let data = {};
    inputs.forEach((input) => {
        data = {
            ...data,
            [input.name]: input.value,
        };
    });
    if (form.dataset.validate == "remote") {
        let validMethod = form.dataset.method;
        let validUrl = form.dataset.url;
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        const headers = new Headers({
            "X-CSRF-TOKEN": csrfToken,
            "Content-Type": "application/json", // Asumiendo que estás enviando JSON
        });
        const body = JSON.stringify(data);
        fetch(validUrl, {
            method: validMethod,
            headers: headers,
            body: validMethod !== "GET" ? body : undefined, // El cuerpo no se usa en solicitudes GET
        })
            .then((response) => {
                console.log({ response });
                if (!response.ok) {
                    throw response; // Lanza la respuesta para ser manejada por el bloque catch
                }
                return response.json(); // asumimos que el servidor responde con JSON
            })
            .then((data) => {
                console.log(data);
                showNextTab(toggle, panes, tab); // Maneja la respuesta exitosa
            })
            .catch((error) => {
                // Maneja errores de la red y respuestas no exitosas
                error.json().then((errorData) => {
                    console.log({ errorData });
                    if (errorData?.errors) {
                        for (const [key, value] of Object.entries(
                            errorData?.errors
                        )) {
                            var text = "";
                            // toastr.error(value);
                            //put invalid class on input
                            const input = form.querySelector(
                                `input[name="${key}"]`
                            );
                            input.classList.add("is-invalid");
                            //change brother element .invalid-feedback text
                            const invalidFeedback =
                                input.parentElement.querySelector(
                                    ".invalid-feedback"
                                );
                            //join array to string
                            if (Array.isArray(value)) {
                                text = value.join("<br>");
                            } else {
                                text = value;
                            }
                            invalidFeedback.innerHTML = text;
                        }
                    }
                });
            });
    }
};
document.addEventListener("DOMContentLoaded", (event) => {
    const toggles = document.querySelectorAll('[data-toggle="wizard"]');
    let form;
    toggles.forEach((toggle) => {
        const tab = new Tab(toggle);
        const panes = toggle
            .closest(".tab-content")
            .querySelectorAll(".tab-pane");

        toggle.addEventListener("click", function (e) {
            e.preventDefault();
            let valid = true;
            console.log(toggle.dataset.wizzard);
            if (toggle.dataset.wizzard != null) {
                var form = document.getElementById(toggle.dataset.wizzard);
                var inputs = form.querySelectorAll("input[required]");
                inputs.forEach((input) => {
                   
                    if (input.type == "email") {
                        const regex = new RegExp(
                            "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$"
                        );
                        if (!regex.test(input.value)) {
                            input.classList.add("is-invalid");
                            valid = false;
                        } else {
                            input.classList.remove("is-invalid");
                        }
                    }
                    if (input.type == "text") {
                        if (input.value == "") {
                            input.classList.add("is-invalid");
                            valid = false;
                        } else {
                            input.classList.remove("is-invalid");
                        }
                    }
                    if (input.type == "password") {
                        if (input.value == "") {
                            input.classList.add("is-invalid");
                            valid = false;
                        } else {
                            input.classList.remove("is-invalid");
                        }
                    }
                    if (input.type == "checkbox") {
                        if (!input.checked) {
                            input.classList.add("is-invalid");
                            valid = false;
                        } else {
                            input.classList.remove("is-invalid");
                        }
                    }
                    if (input.type == "file") {
                        if (input.files.length == 0) {
                            input.classList.add("is-invalid");
                            valid = false;
                        } else {
                            input.classList.remove("is-invalid");
                        }
                    }
                    if (input.type == "radio") {
                        const radios = form.querySelectorAll(
                            `input[name="${input.name}"]`
                        );
                        let checked = false;
                        radios.forEach((radio) => {
                            if (radio.checked) {
                                checked = true;
                            }
                        });
                        if (!checked) {
                            radios.forEach((radio) => {
                                radio.classList.add("is-invalid");
                            });
                            valid = false;
                        } else {
                            radios.forEach((radio) => {
                                radio.classList.remove("is-invalid");
                            });
                        }
                    }
                    if (input.type == "url") {
                        const regex = new RegExp(
                            "^(https?:\\/\\/)?" + // protocol
                                "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|" + // domain name
                                "((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
                                "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
                                "(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
                                "(\\#[-a-z\\d_]*)?$",
                            "i"
                        );
                        if (!regex.test(input.value)) {
                            input.classList.add("is-invalid");
                            valid = false;
                        } else {
                            input.classList.remove("is-invalid");
                        }
                    }
                    if (input.type == "number") {
                        if (
                            input.value == "" ||
                            (input.min != "" && input.value < input.min) ||
                            (input.max != "" && input.value > input.max)
                        ) {
                            input.classList.add("is-invalid");
                            valid = false;
                        }
                        if (input.step != "" && input.value % input.step != 0) {
                            input.classList.add("is-invalid");
                            valid = false;
                        }
                    }
                     //if input hace minlenght
                     if (input.minLength > 0) {
                        if (input.value.length < input.minLength) {
                            input.classList.add("is-invalid");
                            valid = false;
                        } 
                    }
                    //if input hace maxlenght
                    console.log(input.maxLength);
                    if (input.maxLength > 0) {
                        if (input.value.length > input.maxLength) {
                            input.classList.add("is-invalid");
                            valid = false;
                        } 
                    }
                    //if input min 
                    if (input.min > 0) {
                        if (input.value < input.min) {
                            input.classList.add("is-invalid");
                            valid = false;
                        }
                    }
                    //if input max
                    if (input.max > 0) {
                        if (input.value > input.max) {
                            input.classList.add("is-invalid");
                            valid = false;
                        }
                    }
                });
                const selects = form.querySelectorAll("select[required]");
                selects.forEach((select) => {
                    if (select.value == "") {
                        select.classList.add("is-invalid");
                        valid = false;
                    } else {
                        select.classList.remove("is-invalid");
                    }
                });
            }
            console.log(valid);
            if (
                toggle.dataset.wizzard != null &&
                form != null &&
                form.dataset.validate == "remote" &&
                valid
            ) {
                new Promise((resolve, reject) => {
                    checkInputsRemote(form, toggle, panes, tab);
                    resolve();
                });
            } else {
                if (valid) {
                    showNextTab(toggle, panes, tab);
                }
            }
        });
    });
});
