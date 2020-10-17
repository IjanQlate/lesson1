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
    <a href="login.php">Login</a> | <a href="register.php">Register</a>
    <br /><br /><br /><br />
    <form id="formregister" action="validate_register.php" method="POST">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" required placeholder="Full Name">
        <br />
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required placeholder="Username">
        <br />
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required placeholder="Password">
        <br />
        <button type="button" id="BtnRegister">Register</button>
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
$(document).ready(function(){

    var form = $("#formregister");
    form.validate();

    $('#BtnRegister').on("click", function(){

        if(form.valid()){

            $.ajax({
                url: form.attr("action"),  //validate_login.php
                method: form.attr("method"),   //POST
                data: form.serialize(),
                dataType: "json",   //text / json
                success: function(response){
                    // alert (response);
                    console.log(response);
                    if (response.status == "success") {
                        alert ("Tahniah, pendaftaran berjaya" + " Message From System " + response.message );
                        $("#formregister")[0].reset();
                    } else if (response.status == "failed") {
                        alert ("Gagal, sila masukkan balik" + " Message From System " + response.message);
                    }
                }
            });

        }

    });

});
</script>
</body>
</html>