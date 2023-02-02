import {selfApiRequest} from './request.js';

let name_input = document.querySelector('#name_input');
let password_input = document.querySelector('#password_input');

document.querySelector("#register_btn").addEventListener("click", () => {
    selfApiRequest('auth',
        {action: register, name: name_input.textContent, password: password_input}).then((data) => {
        window.location.replace("http://192.168.5.147/");
    });
})