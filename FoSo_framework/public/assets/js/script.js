function showList(){
    document.getElementById('list-all').style.display="flex";
    document.getElementById('take-place').style.display="none";
}
function hideList(){
    document.getElementById('list-all').style.display="none";
    document.getElementById('take-place').style.display="flex";
}
function toggleDropdown() {
    var filteringSection = document.getElementById("filtering");
    filteringSection.style.display = (filteringSection.style.display === "none") ? "flex" : "none";
  }
function showFilters(){
    document.getElementById('section1').style.display="none";
    //document.getElementById('section2').style.display="none";
    document.getElementById('section3').style.display="none";
    document.getElementById('section3-1').style.display="none";
    document.getElementById('filtering').style.display="flex";
}
function hideFilters(){
    document.getElementById('section1').style.display="flex";
    //document.getElementById('section2').style.display="flex";
    document.getElementById('section3').style.display="flex";
    document.getElementById('section3-1').style.display="flex";
    document.getElementById('filtering').style.display="none";
    
}
function sendRequest(event){
    event.preventDefault();
    hideFilters();
    

    var form = document.getElementById("filter-recipe-form");

    // Serialize the form data
    var formData = new URLSearchParams(new FormData(form)).toString();
  
    // Create the AJAX request URL
    var url = "http://localhost/Facultate/Proiect/Microservicii/API_Gateway.php?" + formData;
  
    // Send the AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Request was successful, do something with the response if needed
        console.log(xhr.responseText);
      }
    };
    xhr.send();
    return false;
}
function hideFiltersReset(){
    document.getElementById('section1').style.display="flex";
    document.getElementById('section2').style.display="flex";
    document.getElementById('section3').style.display="flex";
    document.getElementById('section3-1').style.display="flex";
    document.getElementById('filtering').style.display="none";
}
function getChecked(){
    console.log("CEVA");
    var checkedValue = []; 
    var inputElements = document.getElementsByClassName('cuisine');
    var j=0;
    for(var i=0; inputElements[i]; ++i){
        if(inputElements[i].checked){
            checkedValue[j] = inputElements[i].value;
            j++;
        }
    }
    console.log(checkedValue);    
}
function browseMenu(e){
    if(e==0){
        document.getElementById("users").style.display = "flex";
        document.getElementById("recipes").style.display = "none";
    } else if(e == 1){
        document.getElementById("users").style.display = "none";
        document.getElementById("recipes").style.display = "flex";
    }
}