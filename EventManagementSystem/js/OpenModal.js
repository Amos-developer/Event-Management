
const form = document.querySelector("form");
const myAlert = document.getElementById("myAlert");
const text = document.getElementById("text");

form.onsubmit = (e) =>{
    e.preventDefault();
    myAlert.style.display = "block";
  
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = ()=>{
        if(ajax.readyState == 4 && ajax.status == 200){
            text.innerHTML = ajax.responseText;
        }
    }
    ajax.open("POST", "../pages/UpdateEvent.php", true);
    var formData = new FormData(form);
    ajax.send(formData);
}

