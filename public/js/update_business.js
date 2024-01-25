var Ubusiness = {
    btn : document.getElementById('update_business_btn'),
    email : document.getElementById('update_business_email'),
    username : document.getElementById('update_business_username'),
    phone : document.getElementById('update_business_phone'),
    msg_error : document.getElementById('msg_error_update_business'),
}

$(Ubusiness.btn).click('clikc', (event)=>{
    event.preventDefault();
    
    const request1 = new XMLHttpRequest();

    request1.onload = () => {

        let responseObject = null;
        try {
            console.log(request1.responseText);
            responseObject = JSON.parse(request1.responseText);
        } catch (e) {
            console.log("could not parse json " + e);
            if (e) {
                while (Ubusiness.msg_error.firstChild) {

                    Ubusiness
                        .msg_error
                        .removeChild(Ubusiness.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                Ubusiness
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_update_business(responseObject);
        }
    };

    const requestData1 = `email=${Ubusiness.email.value}&username=${Ubusiness.username.value}&phone=${Ubusiness.phone.value}`;
    request1.open('post', "./request/update_business.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_update_business(res) {
    if (res.ok) {
        while (Ubusiness.msg_error.firstChild) {

            Ubusiness
                .msg_error
                .removeChild(Ubusiness.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                Ubusiness
                    .msg_error
                    .appendChild(li);
            });
        setTimeout(function () {
            location.href = './business.php?page=Business';
        }, 1000);

    } else {
        while (Ubusiness.msg_error.firstChild) {

            Ubusiness
                .msg_error
                .removeChild(Ubusiness.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                Ubusiness
                    .msg_error
                    .appendChild(li);
            });
    }

}