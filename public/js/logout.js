var logout = {
    btn : document.getElementById('logout-user')
}


$(logout.btn).click('click', (event)=>{
    event.preventDefault();

    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
    sessionStorage.removeItem('user');
    location.href = "./";
})