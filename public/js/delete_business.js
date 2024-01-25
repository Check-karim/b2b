var Dbusiness = {
    btn : document.getElementById('delete_business_btn'),
    id : document.getElementById('delete_business_id'),
    msg_error : document.getElementById('msg_error_delete_business'),
}

$(Dbusiness.btn).click('clikc', (event)=>{
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
                while (Dbusiness.msg_error.firstChild) {

                    Dbusiness
                        .msg_error
                        .removeChild(Dbusiness.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                Dbusiness
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_delete_business(responseObject);
        }
    };

    const requestData1 = `id=${Dbusiness.id.value}`;
    request1.open('post', "./request/delete_business.php");
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_delete_business(res) {
    if (res.ok) {
        while (Dbusiness.msg_error.firstChild) {

            Dbusiness
                .msg_error
                .removeChild(Dbusiness.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                Dbusiness
                    .msg_error
                    .appendChild(li);
            });
        setTimeout(function () {
            location.href = './business.php?page=Business';
        }, 1000);

    } else {
        while (Dbusiness.msg_error.firstChild) {

            Dbusiness
                .msg_error
                .removeChild(Dbusiness.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                Dbusiness
                    .msg_error
                    .appendChild(li);
            });
    }

}