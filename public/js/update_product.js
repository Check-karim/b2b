var Uprod = {
    btn : document.getElementById('update_prod_btn'),
    ref : document.getElementById('update_prod_ref'),
    label : document.getElementById('update_prod_label'),
    price : document.getElementById('update_prod_price'),
    msg_error : document.getElementById('msg_error_update_prod'),
}

$(Uprod.btn).click('clikc', (event)=>{
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
                while (Uprod.msg_error.firstChild) {

                    Uprod
                        .msg_error
                        .removeChild(Uprod.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                Uprod
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_update_prod(responseObject);
        }
    };

    const requestData1 = `ref=${Uprod.ref.value}&price=${Uprod.price.value}&label=${Uprod.label.value}`;
    request1.open('post', "./request/update_product.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_update_prod(res) {
    if (res.ok) {
        while (Uprod.msg_error.firstChild) {

            Uprod
                .msg_error
                .removeChild(Uprod.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                Uprod
                    .msg_error
                    .appendChild(li);
            });
        setTimeout(function () {
            location.href = './products.php?page=Products';
        }, 1000);

    } else {
        while (Uprod.msg_error.firstChild) {

            Uprod
                .msg_error
                .removeChild(Uprod.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                Uprod
                    .msg_error
                    .appendChild(li);
            });
    }

}