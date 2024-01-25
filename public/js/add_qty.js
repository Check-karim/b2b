var Aprod = {
    btn : document.getElementById('add_product_btn'),
    qty : document.getElementById('add_product_qty'),
    id : document.getElementById('add_product_id'),
    msg_error : document.getElementById('msg_error_add_product'),
}

$(Aprod.btn).click('clikc', (event)=>{
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
                while (Aprod.msg_error.firstChild) {

                    Aprod
                        .msg_error
                        .removeChild(Aprod.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                Aprod
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_add_product(responseObject);
        }
    };

    const requestData1 = `id=${Aprod.id.value}&qty=${Aprod.qty.value}`;
    request1.open('post', "./request/add_qty.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_add_product(res) {
    if (res.ok) {
        while (Aprod.msg_error.firstChild) {

            Aprod
                .msg_error
                .removeChild(Aprod.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                Aprod
                    .msg_error
                    .appendChild(li);
            });
        setTimeout(function () {
            location.href = './products.php?page=Products';
        }, 1000);

    } else {
        while (Aprod.msg_error.firstChild) {

            Aprod
                .msg_error
                .removeChild(Aprod.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                Aprod
                    .msg_error
                    .appendChild(li);
            });
    }

}