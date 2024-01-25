var Uagent = {
    btn : document.getElementById('update_agent_btn'),
    email : document.getElementById('update_agent_email'),
    username : document.getElementById('update_agent_username'),
    phone : document.getElementById('update_agent_phone'),
    msg_error : document.getElementById('msg_error_update_agent'),
}

$(Uagent.btn).click('clikc', (event)=>{
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
                while (Uagent.msg_error.firstChild) {

                    Uagent
                        .msg_error
                        .removeChild(Uagent.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                Uagent
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_update_agent(responseObject);
        }
    };

    const requestData1 = `email=${Uagent.email.value}&username=${Uagent.username.value}&phone=${Uagent.phone.value}`;
    request1.open('post', "./request/update_agent.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_update_agent(res) {
    if (res.ok) {
        while (Uagent.msg_error.firstChild) {

            Uagent
                .msg_error
                .removeChild(Uagent.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                Uagent
                    .msg_error
                    .appendChild(li);
            });
        setTimeout(function () {
            location.href = './agent.php?page=Agent';
        }, 1000);

    } else {
        while (Uagent.msg_error.firstChild) {

            Uagent
                .msg_error
                .removeChild(Uagent.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                Uagent
                    .msg_error
                    .appendChild(li);
            });
    }

}