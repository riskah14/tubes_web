<html>
<head> 
    <title>Login Administrator</title>

    <meta charset="utf-8">
<style type="text/css">
    .login { 
        margin: 200px auto;
        width: 400px;
        height: 200px;
        padding: 10px;
        border: 1px solid #ccc;
        background: lightgrey;
    } 

    input[type=text], input[type=password] {
        margin: 5px auto;
        width: 94%;
        padding: 10px;
    }
    input[type=submit] {
        margin : 20px auto;
        float: right;
        padding: 10px;
        width: 400px;
        border: 1px solid #fff;
        color: #fff;
        background: grey;
        cursor: pointer;
    }

</style>
</head>
<body>
    <div id="header"><h1><center>Form Login Administrator</center></h1><hr></div>
    <div class="login">
        <form method="post" action="cek_login.php">
            <label>Username</label>
                    <input name="username" type="text" placeholder="masukkan username">
            <label>Password</label>
                    <input  name="password" type="password" placeholder=" Masukkan Password">
               
                <input type="submit" name="kirim" value="Kirim">
                     
        </form>
    </div>
</body>
</html>
