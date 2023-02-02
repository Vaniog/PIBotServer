export function selfApiRequest(module_name, json_data) {
    let url = "http://192.168.5.143/api/" + module_name + "/";
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