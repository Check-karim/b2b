var order = {
    btn : document.getElementById('create_order_btn'),
    qty : document.getElementById('create_order_qty'),
    prod_id : document.getElementById('create_order_product'),
    business_id : document.getElementById('create_order_business'),
    agent_id : document.getElementById('create_order_agentID'),
    msg_error : document.getElementById('msg_error_create_order'),
}

$(order.btn).click('clikc', (event)=>{
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
                while (order.msg_error.firstChild) {

                    order
                        .msg_error
                        .removeChild(order.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                order
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_create_order(responseObject);
        }
    };

    const requestData1 = `agent_id=${order.agent_id.value}&qty=${order.qty.value}&prod_id=${order.prod_id.value}&business_id=${order.business_id.value}`;
    request1.open('post', "./request/create_order.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_create_order(res) {
    if (res.ok) {
        while (order.msg_error.firstChild) {

            order
                .msg_error
                .removeChild(order.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                order
                    .msg_error
                    .appendChild(li);
            });
        location.reload();
        setTimeout(function () {
            location.href = './';
        }, 1500);

    } else {
        while (order.msg_error.firstChild) {

            order
                .msg_error
                .removeChild(order.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                order
                    .msg_error
                    .appendChild(li);
            });
    }

}