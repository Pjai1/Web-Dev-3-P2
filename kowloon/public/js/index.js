closeCookie = () => {
    let e=new XMLHttpRequest;
    
    e.onreadystatechange=function(){
        if(e.readyState==XMLHttpRequest.DONE) {
            let cookieEl = document.getElementById('cookie-layer');
            cookieEl.style.display = "none";
        }
    }, 
    e.open("GET","/cookie",!0),
    e.send()
}

$(document).ready(() => {
    setTimeout(() => {
        $('.successMsg, .warningMsg').fadeOut('fast');
    }, 5000);
})