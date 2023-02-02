import {selfApiRequest} from './request.js';

let api_answer = document.querySelector("#api_answer");

document.querySelector("#btn_ping").addEventListener("click", function () {
    selfApiRequest('bot', {action: 'ping'}).then(
        (data) => (api_answer.innerHTML = String(data))
    );
});

document.querySelector("#btn_launch").addEventListener("click", function () {
    selfApiRequest('bot', {action: 'launch'}).then(
        (data) => (api_answer.innerHTML = String(data))
    );
});

document.querySelector("#btn_kill").addEventListener("click", function () {
    selfApiRequest('bot', {action: 'kill'}).then(
        (data) => (api_answer.innerHTML = String(data))
    );
});
