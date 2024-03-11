const form = document.querySelector("form");
const modal = document.getElementById("message_body");
const text = document.getElementById("message");

form.onsubmit = (e) => {
e.preventDefault();
modal.style.display = "block";

var ajax = new XMLHttpRequest();
ajax.onreadystatechange = ()=>{
    if(ajax.readyState == 4 && ajax.status == 200){
        text.innerHTML = ajax.responseText;
    }
}

ajax.open("POST", "../pages/UpdateUser.php", true);

var formData = new FormData(form);
ajax.send(formData);

}