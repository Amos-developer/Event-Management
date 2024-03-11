// Filtering the table row
$(document).ready( function() {
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#info_table tr").filter( function (){
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

   $("#btnreset").on("click", function () {
     $("#search").val(" ");
   });
});



