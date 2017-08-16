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

 keyPress = (e) => { 
    document.getElementsByClassName("orange")[0];

    if(e.keyCode === 13) {
        var form = document.getElementById("search-form");
        form.submit(); 
    }
}

$(document).ready(() => {
    setTimeout(() => {
        $('.successMsg, .warningMsg').fadeOut('fast');
    }, 5000);
})