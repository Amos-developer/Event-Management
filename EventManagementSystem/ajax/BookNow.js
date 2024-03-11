const form = document.querySelector("form");
const myAlert = document.getElementById("modal");
const text = document.getElementById("message");

form.onsubmit = (e)=>{
    e.preventDefault();
    myAlert.style.display = "block";

    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = ()=>{
        if(ajax.readyState == 4 && ajax.status == 200){
                text.innerHTML = ajax.responseText;
        }
    }
    ajax.open("POST","../pages/Booking.php", true);
    var formData = new FormData(form);
    ajax.send(formData);

}

