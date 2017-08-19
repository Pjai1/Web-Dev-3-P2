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

function getParameterByName(param, url) {
    if (!url) {
        url = window.location.href;
    }

    param = param.replace(/[\[\]]/g, "\\$&");

    let regex = new RegExp("[?&]" + param + "(=([^&#]*)|&|#|$)");
    let regExResults = regex.exec(url);

    if (!regExResults) {
        return null;
    }

    if (!regExResults[2]) {
        return '';
    }

    return decodeURIComponent(regExResults[2].replace(/\+/g, " "));
}

(function(){
    let dropdown = document.getElementById('dropdownMenu1');
    let sortBy = getParameterByName('sort');
    let selectSort = document.getElementById('selectSort');
    let filterValues = document.getElementsByClassName('filter-value');
    let valuesArray = [];

    for (let i = 0; i < filterValues.length; i++) {
        valuesArray.push(filterValues[i].text);
    }

    switch(sortBy)
    {
        case 'price_asc': sortByOutput = valuesArray[1];
            break;

        case 'price_desc': sortByOutput = valuesArray[2];
            break;

        case 'latest': sortByOutput = valuesArray[3];
            break;

        case 'oldest': sortByOutput = valuesArray[4];
            break;
            
        default: sortByOutput = valuesArray[0];
                 sortBy = 'relevance';
    }

    selectSort.value = sortBy;
    dropdown.innerHTML = sortByOutput + ' <span class="caret"></span>';
})();

$(document).ready(() => {
    setTimeout(() => {
        $('.successMsg, .warningMsg').fadeOut('fast');
    }, 5000);
})