var Dprod = {
    btn : document.getElementById('delete_product_btn'),
    id : document.getElementById('delete_product_id'),
    msg_error : document.getElementById('msg_error_delete_product'),
}

$(Dprod.btn).click('clikc', (event)=>{
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
                while (Dprod.msg_error.firstChild) {

                    Dprod
                        .msg_error
                        .removeChild(Dprod.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                Dprod
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_delete_prod(responseObject);
        }
    };

    const requestData1 = `id=${Dprod.id.value}`;
    request1.open('post', "./request/delete_product.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_delete_prod(res) {
    if (res.ok) {
        while (Dprod.msg_error.firstChild) {

            Dprod
                .msg_error
                .removeChild(Dprod.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                Dprod
                    .msg_error
                    .appendChild(li);
            });
        setTimeout(function () {
            location.href = './products.php?page=Products';
        }, 1000);

    } else {
        while (Dprod.msg_error.firstChild) {

            Dprod
                .msg_error
                .removeChild(Dprod.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                Dprod
                    .msg_error
                    .appendChild(li);
            });
    }

}