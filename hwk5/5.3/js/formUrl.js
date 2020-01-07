let error_field = document.getElementById('errors');
let form = document.forms.url;

function validate() {
    let re = /(^https?:\/\/)?[a-z0-9~_\-\.]+\.[a-z]{2,4}(\/|:|\?[!-~]*)?$/i;;
    if (!(re.test(form.url.value))) {
        error_field.innerHTML = 'Введите URL';
        return false;
    }
    return true;
}

function sendForm(event) {
    event.preventDefault();
    if(!validate()) {
        return;
    }
    let request = new XMLHttpRequest();
    request.open('post', this.action, true);
    request.onload = function() {
        if(request.status === 200) {
            responseHandler(request.responseText);
        }
    }
    request.send(new FormData(this));
}

form.addEventListener("submit", sendForm);

function responseHandler(answer) {
  console.log(answer);
    if(answer === SUCCESS) {
        error_field.innerHTML = '';

    } else if(answer === ERR) {
        error_field.innerText = "Ошибка сервера";
    }
}
const SUCCESS = "success";
const ERR = "error";
