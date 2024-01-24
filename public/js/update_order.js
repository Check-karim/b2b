var Uorder = {
    btn : document.getElementById('update_order_btn'),
    state : document.getElementById('update_order_state'),
    orderId : document.getElementById('update_order_ID'),
    prod_id : document.getElementById('update_order_product'),
    qty : document.getElementById('update_order_qty'),
    msg_error : document.getElementById('msg_error_update_order'),
}

$(Uorder.btn).click('clikc', (event)=>{
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
                while (Uorder.msg_error.firstChild) {

                    Uorder
                        .msg_error
                        .removeChild(Uorder.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                Uorder
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_update_order(responseObject);
        }
    };

    const requestData1 = `state=${Uorder.state.value}&orderId=${Uorder.orderId.value}&prod_id=${Uorder.prod_id.value}&qty=${Uorder.qty.value}`;
    request1.open('post', "./request/update_order.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_update_order(res) {
    if (res.ok) {
        while (Uorder.msg_error.firstChild) {

            Uorder
                .msg_error
                .removeChild(Uorder.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                Uorder
                    .msg_error
                    .appendChild(li);
            });
        setTimeout(function () {
            location.href = './';
        }, 1500);

    } else {
        while (Uorder.msg_error.firstChild) {

            Uorder
                .msg_error
                .removeChild(Uorder.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                Uorder
                    .msg_error
                    .appendChild(li);
            });
    }

}