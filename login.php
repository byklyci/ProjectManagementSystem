<!DOCTYPE html>
<html>
    <head>
        <style>
            html, body {
                    background-color: #DCDCDC;
                    color:   #77b300;
                    font-family: 'Raleway', sans-serif;
                    font-weight: 100;
                    height: 100vh;
                    margin: 0;
                }
            .title {
                    font-size: 20px;
                }
            input[type=submit] {
                padding:5px 15px;
                background:#ccc;
                border:0 none;
                cursor:pointer;
                -webkit-border-radius: 5px;
                border-radius: 5px;
            }
        </style>
        <title>Login Page</title>
    </head>
    <body>
        <div align="center" style="position: absolute;
    left: 50%;
    top: 50%;
    text-align: center;
    width:546px;
    height:265px;
    margin-left: -273px; /*half width*/
    margin-top: -132px; /*half height*/">
            <div class="title" >
            <h2>Login Page</h2>
        </div>
         <form action="loginAction.php" method="POST">
         <p>Your username: <input type="text" name="Username" /></p>
         <p>Your password: <input type="password" name="Password" /></p>
         <select name="type">
             <option value="1">User</option>
             <option value="2">Admin</option>
         </select>
         <p><input type="submit" /></p>
        </form>
        
        </div>
    </body>
</html>