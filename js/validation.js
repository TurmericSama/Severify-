
// function masaya(){

// $('.exempt').bind('keypress', function (event) {
//     var regex = new RegExp("^[a-zA-Z0-9-.,\r\n\b\u]");
//     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
//     if (!regex.test(key)) {
//     event.preventDefault();
//     return false;
//     }
// });

// }

function finduser(){
    $.ajax({
        type: "POST",
        url: "../../js/username.php",
        success: function (response) {
            $('#user').html(response);
        }
    });
}