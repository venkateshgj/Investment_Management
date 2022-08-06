<html >
<head>
    <title>PHP login system</title>

    <link rel = "stylesheet" type = "text/css" href = "./style.css">
</head>

<body>
  <style>

  *{
  font-family: 'Poppins', sans-serif;
}
  form {
  border: 3px solid #f1f1f1;

}
.container{
  background-color: #b0c4de;
  box-shadow: -3px -3px 9px  #778899,
              3px 3px 7px rgba(147, 149, 151, 0.671);

}
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    color: black;
    box-shadow: -3px -3px 9px #aaa9a9a2,
                3px 3px 7px rgba(147, 149, 151, 0.671);

  }
  input[type=submit] {
  background-color: #04AA6D;
  color: green;
  text-align: center;
  padding: 12px 20px;
  margin: 8px 0;

  border: none;
  cursor: pointer;
  width: 25%;
  float:center;

}
#btn:hover {
  opacity: 0.8;
}
#frm{
    background-color: #778899;
  box-shadow: -3px -3px 9px #aaa9a9a2,
              3px 3px 7px rgba(147, 149, 151, 0.671);

              border-radius: 10px;
    border: solid gray 1px;
    width:25%;
    border-radius: 2px;
    margin: 120px auto;
    padding: 50px;
}
#fh{
  text-align: center;
}
    body {
      background-image: url("111.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }
    .container {
  padding: 16px;
}

  </style>
    <div id = "frm">
      <div id="fh">
        <h1 >Login</h1>
      <div/>
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "post">
        <div class="container">

            <p>
                <label> UserName: </label>
                <input type = "text" id ="name" name ="name" />
            </p>
            <p>
                <label> Password: </label>
                <input type = "password" id ="pass" name  = "pass" />
            </p>

            <p>
                <input type = "submit" id="btn" value = "Login" />
            </p>
			<a href="./register.html">New User? Click Here</a>
			<br/>
			<a href="./password.html">Forgot Password</a>

    </div>

        </form>
    </div>

    <script>
            function validation()
            {
                var id=document.f1.name.value;
                var ps=document.f1.pass.value;
                if(id.length=="" && ps.length=="") {
                    alert("User name and Password fields are empty");
                    return false;
                }
                else
                {
                    if(id.length=="") {
                        alert("User name is empty");
                        return false;
                    }
                    if (ps.length=="") {
                    alert("Password field is empty");
                    return false;
                    }
                }
            }
        </script>

</body>
</html>
