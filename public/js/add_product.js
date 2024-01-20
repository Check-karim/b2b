var prod = {
    btn : document.getElementById('create_prod_btn'),
    qty : document.getElementById('create_product_qty'),
    label : document.getElementById('create_product_label'),
    price : document.getElementById('create_product_price'),
    ref : document.getElementById('create_product_ref'),
    msg_error : document.getElementById('msg_error_create_product'),
}

$(prod.btn).click('clikc', (event)=>{
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
                while (prod.msg_error.firstChild) {

                    prod
                        .msg_error
                        .removeChild(prod.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                prod
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_create_product(responseObject);
        }
    };

    const requestData1 = `qty=${prod.qty.value}&label=${prod.label.value}&price=${prod.price.value}&ref=${prod.ref.value}`;
    request1.open('post', "./request/create_product.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_create_product(res) {
    if (res.ok) {
        while (prod.msg_error.firstChild) {

            prod
                .msg_error
                .removeChild(prod.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                prod
                    .msg_error
                    .appendChild(li);
            });
        location.reload();
        setTimeout(function () {
            location.href = "./products.php?page=Products";
        }, 1500);

    } else {
        while (prod.msg_error.firstChild) {

            prod
                .msg_error
                .removeChild(prod.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                prod
                    .msg_error
                    .appendChild(li);
            });
    }

}