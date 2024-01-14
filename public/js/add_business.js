var business = {
    btn : document.getElementById('create_business_btn'),
    email : document.getElementById('create_business_email'),
    username : document.getElementById('create_business_username'),
    phone : document.getElementById('create_business_phone'),
    msg_error : document.getElementById('msg_error_create_business'),
}

$(business.btn).click('clikc', (event)=>{
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
                while (business.msg_error.firstChild) {

                    business
                        .msg_error
                        .removeChild(business.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                business
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_create_business(responseObject);
        }
    };

    const requestData1 = `phone=${business.phone.value}&email=${business.email.value}&username=${business.username.value}`;
    request1.open('post', "./request/create_business.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_create_business(res) {
    if (res.ok) {
        while (business.msg_error.firstChild) {

            business
                .msg_error
                .removeChild(business.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                business
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        // setTimeout(function () {
        //     location.href = "./agent.php?page=Agent";
        // }, 1500);

    } else {
        while (business.msg_error.firstChild) {

            business
                .msg_error
                .removeChild(business.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                business
                    .msg_error
                    .appendChild(li);
            });
    }

}