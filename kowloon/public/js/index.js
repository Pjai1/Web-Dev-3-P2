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

    if(dropdown) {
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
    }
})();

let colorCount = 0;

colorInput = () => {
    let colorContainer = document.getElementById('colorWheel');
    let divEl = document.createElement('div');
    colorCount++;

    divEl.innerHTML = '<input type="color" name="colors[]" value="#000000"><button type="button" id="deleteColor' + colorCount + '" onclick="deleteColorInput(this)">Remove</button>';
    divEl.className += "colorContainer";
    divEl.setAttribute('id', 'colorCount' + colorCount);
    colorContainer.appendChild(divEl);
}

deleteColorInput = (el) => {
	let colorId = el.id.replace(el.id.substring(0,11), '');
    console.log(el)
	document.getElementById('colorCount' + colorId).remove();
}

let dimensionsCount = 0;

dimensionInput = () => {
	var dimensionsContainer = document.getElementById('dimensionsContainer');
    var divEl = document.createElement('div');
    dimensionsCount++;

	divEl.innerHTML = '<input type="text" name="dimensions[]"><button type="button" id="deleteDimensions' + dimensionsCount + '" onclick="deleteDimensionInput(this)">Remove</button>';
	divEl.className += "dimensions";
	divEl.setAttribute('id', 'dimensionsCount' + dimensionsCount);
	dimensionsContainer.appendChild(divEl);
}

deleteDimensionInput = (el) => {
    let id = el.id.replace(el.id.substring(0,16), '')
    
	document.getElementById('dimensionsCount' + id).remove();
}

let imagesCount = 1;

createImageContainer = () => {
    let containerCopy = document.getElementById('upload-image').cloneNode(false);
    imagesCount++;

	document.getElementById('image-upload-container').appendChild(containerCopy);
	containerCopy.innerHTML = '<hr><label for="image_desc_nl[]">Image Desc nl</label><input type="text" name="image_desc_nl[]" class="form-control"><label for="image_desc_fr[]">Image Desc fr</label><input type="text" name="image_desc_fr[]" class="form-control">';
}

$(document).ready(() => {
    setTimeout(() => {
        $('.successMsg, .warningMsg').fadeOut('fast');
    }, 5000);
})