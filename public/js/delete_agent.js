var Dagent = {
    btn : document.getElementById('delete_agent_btn'),
    id : document.getElementById('delete_agent_id'),
    msg_error : document.getElementById('msg_error_delete_agent'),
}

$(Dagent.btn).click('clikc', (event)=>{
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
                while (Dagent.msg_error.firstChild) {

                    Dagent
                        .msg_error
                        .removeChild(Dagent.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                Dagent
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_delete_agent(responseObject);
        }
    };

    const requestData1 = `id=${Dagent.id.value}`;
    request1.open('post', "./request/delete_agent.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_delete_agent(res) {
    if (res.ok) {
        while (Dagent.msg_error.firstChild) {

            Dagent
                .msg_error
                .removeChild(Dagent.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                Dagent
                    .msg_error
                    .appendChild(li);
            });
        setTimeout(function () {
            location.href = './agent.php?page=Agent';
        }, 1000);

    } else {
        while (Dagent.msg_error.firstChild) {

            Dagent
                .msg_error
                .removeChild(Dagent.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                Dagent
                    .msg_error
                    .appendChild(li);
            });
    }

}