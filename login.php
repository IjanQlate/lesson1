<?php 
session_start(); 
session_destroy();
session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .content {
    max-width: 500px;
    margin: auto;
    }
    </style>
</head>
<body class="content">
    <br /><br /><br /><br />
    <a href="login.php">Login</a>  |  <a href="register.php">Register</a>
    <br /><br /><br /><br />
    <form id="formlogin" action="validate_login.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <br />
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br />
        <!-- <button type="submit">Submit</button> -->
        <button type="button" id="BtnSubmit">Login</button>
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
$(document).ready(function(){

    var form = $("#formlogin");
    form.validate();

    // on ("change")  - Select
    // on ("blur") 
    // on ("click")

    // $("#username").on("blur", function() {

    //     if($("#username").val() == "class") { alert ("OK"); }
    //     else { alert ("Salah Tu"); }

    // });

    $('#BtnSubmit').on("click", function(){

        // JavaScript
        // alert (document.getElementById("username").value);

        // Jquery
        // if ($("#username").val()) {
        //     alert ("Username " + $("#username").val());
        // } else {
        //     alert ("Username is blank");
        // }

        if(form.valid()){

            // alert (form.attr("action"));
            // form.serialize(),
            // url: "validate_login.php"
            // data: {
            //     "username": $("#username").val(),
            //     "password": $("#password").val()
            // },

            $.ajax({
                url: form.attr("action"),  //validate_login.php
                method: form.attr("method"),   //POST
                data: form.serialize(),
                dataType: "json",   //text / json
                success: function(response){
                    console.log (response);
                    // alert(response.status);
                    // return false;
                    if (response.status == "success") {
                        window.location.href = "http://localhost:8083/lesson1/"+response.url;
                    } else {
                        alert (response.message);
                    }
                }
            });

        }

    });

});
</script>
</body>
</html>