const booking = document.getElementById("booking");

booking.addEventListener("click", (e) => {
  e.preventDefault();
  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = () => {
    if (ajax.readyState == 4 && ajax.status == 200) {
      document.getElementById("infos").innerHTML = ajax.responseText;
    }
  };
  ajax.open("GET", "../pages/UserDetails.php", true);
  ajax.send();
});

