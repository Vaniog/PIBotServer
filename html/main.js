function selfApiRequest(json_data) {
    url = "http://192.168.5.143/api/";
    return fetch(url, {
        method: "POST",
        body: JSON.stringify(json_data),
        headers: {
            "Content-Type": "application/json",
        },
    }).then((response) => {
        return response.text();
    });
}

api_answer = document.querySelector("#api_answer");

document.querySelector("#btn_ping").addEventListener("click", function () {
    selfApiRequest({ ping: true }).then(
        (data) => (api_answer.innerHTML = data)
    );
});

document.querySelector("#btn_launch").addEventListener("click", function () {
    selfApiRequest({ launch: true }).then(
        (data) => (api_answer.innerHTML = data)
    );
});

document.querySelector("#btn_kill").addEventListener("click", function () {
    selfApiRequest({ kill: true }).then(
        (data) => (api_answer.innerHTML = data)
    );
});
