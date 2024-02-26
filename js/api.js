// window.onload = function () {
//     sendSMS("Olá!", "(33) 988661359");
// };

function sendSMS(message, number) {
    let apiKey = "a1paTDBiYUtmam9HVGxsbGZHNVJNU1Fqa2xqYWlDUWo=";
    let baseUrl = "https://api.nvoip.com.br/v3/sms";

    let url = baseUrl + "?napikey=" + apiKey;

    var headers = new Headers();
    headers.append('Content-Type', 'application/json');
    headers.append('Authorization', 'Bearer  dbc6196b-d0ba-11ee-ab5a-02a0b41d24f8')

    var bodyparameters = {
        numberPhone: number,
        message: message,
        flashSms: false
    };

    var parameters = { 
        method: 'POST', 
        headers: headers, 
        body: JSON.stringify(bodyparameters) 
    };

    fetch(url, parameters)
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Erro ao enviar mensagem.');
            }
            return response.json();
        })
        .then(function (data) {
            console.log(data);
        })
        .catch(function (err) {
            console.error(err);
        });
}
