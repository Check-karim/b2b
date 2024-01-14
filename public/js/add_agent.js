var agent = {
    btn : document.getElementById('create_agent_btn'),
    email : document.getElementById('create_agent_email'),
    username : document.getElementById('create_agent_username'),
    phone : document.getElementById('create_agent_phone'),
    password : document.getElementById('create_agent_password'),
    msg_error : document.getElementById('msg_error_create_agent'),
}

$(agent.btn).click('clikc', (event)=>{
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
                while (agent.msg_error.firstChild) {

                    agent
                        .msg_error
                        .removeChild(agent.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                agent
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_create_agent(responseObject);
        }
    };

    const requestData1 = `phone=${agent.phone.value}&email=${agent.email.value}&username=${agent.username.value}&password=${agent.password.value}`;
    request1.open('post', "./request/create_agent.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_create_agent(res) {
    if (res.ok) {
        while (agent.msg_error.firstChild) {

            agent
                .msg_error
                .removeChild(agent.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                agent
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            location.href = "./agent.php?page=Agent";
        }, 1500);

    } else {
        while (agent.msg_error.firstChild) {

            agent
                .msg_error
                .removeChild(agent.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                agent
                    .msg_error
                    .appendChild(li);
            });
    }

}