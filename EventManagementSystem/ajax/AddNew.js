const formdata = document.getElementById("form");
const textvalue = document.getElementById("text");
const myAlert = document.getElementById("myAlert");

formdata.onsubmit = (e)=>{
    e.preventDefault();
    myAlert.style.display = "block";

    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = ()=>{
        if(ajax.readyState == 4 && ajax.status == 200){
            textvalue.innerHTML = ajax.responseText;
        }
    }
    ajax.open("POST","../pages/AddNew.php", true);
    var formData = new FormData(formdata);
    ajax.send(formData);
}

// Clear the fields after add user
$("#form").on("submit", function (e){
    e.preventDefault();
    this.reset();
})