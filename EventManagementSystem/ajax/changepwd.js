const form = document.querySelector("form");
const myAlert = document.getElementById("change");
const message = document.getElementById("message");

form.onsubmit = (e)=>{
    e.preventDefault();
    myAlert.style.display = "block";

    var ajaxobj = new XMLHttpRequest();
    ajaxobj.onreadystatechange = ()=>{
        if(ajaxobj.readyState == 4 && ajaxobj.status == 200){
            message.innerHTML = ajaxobj.responseText;
        }
    }

    ajaxobj.open("POST", "../pages/changepwd.php", true);
    var formData = new FormData(form);
    ajaxobj.send(formData);
}