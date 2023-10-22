var login = {
    btn : document.getElementById('login-btn'),
    msg_error : document.getElementById('msg_error_login'),
    user : document.getElementById('login_username'),
    password : document.getElementById('login_password'),
}

$(login.btn).click('click', (e) =>{
    e.preventDefault()

    const request1 = new XMLHttpRequest();

    request1.onload = () => {

        let responseObject = null;
        try {
            console.log(request1.responseText);
            responseObject = JSON.parse(request1.responseText);
        } catch (e) {
            console.log("could not parse json " + e);
            if (e) {
                while (login.msg_error.firstChild) {

                    login
                        .msg_error
                        .removeChild(login.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                login
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_login(responseObject);
        }
    };

    const requestData1 = `username=${login.user.value}&password=${login.password.value}`;
    request1.open('post', "./request/login.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_login(res) {
    if (res.ok) {
        while (login.msg_error.firstChild) {

            login
                .msg_error
                .removeChild(login.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                login
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            location.href = "./index.php";
        }, 1500);

    } else {
        while (login.msg_error.firstChild) {

            login
                .msg_error
                .removeChild(login.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                login
                    .msg_error
                    .appendChild(li);
            });
    }

}