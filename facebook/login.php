<html>
    <head>
        <style>
            body{
                background: #f0f2f5;
                color: #1c1e21;
                margin:8%;
                display: flex;
            }
            .login{
                margin-left: 40%;
                margin-right: 100px;
                text-align:center;
            }
            .photos{
                margin-top: 0px;
            }
            .form {
                display: flex;
                width: 300px;
                background-color: rgba(255, 255, 255, 1);
                display: flex;
                flex-direction: column;
                gap: 10px;
                padding: 10px 20px;
                box-shadow: 0 0 5px rgba(0, 0, 0, .2);
                border-radius: 5px;
                font-family: inherit;
            }

            .input {
                font-size: 15px;
                padding: 15px 10px;
                border-radius: 5px;
                border: none;
                margin-top: 10px;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .2), 0 .5px .5px rgba(0, 0, 0, .2);
                outline: none;
            }

            .input:focus {
                outline: 1.2px solid #1877f2;
            }

            #loginBtn {
                margin-top: 10px;
                width: 100%;
                padding: 10px 20px;
                align-self: center;
                background: #1877f2;
                border: none;
                border-radius: 5px;
                color: #fff;
                font-size: 1.3rem;
                font-weight: bold;
            }

            #loginBtn:hover {
                background: #196fe0;
            }

            #createAccountBtn {
                margin-top: 40px;
                margin-bottom: 10px;
                padding: 15px 15px;
                align-self: center;
                background: #42b72a;
                border: none;
                border-radius: 5px;
                color: #fff;
                font-size: 1rem;
                font-weight: bold;
            }
            .login{
                margin-left:20%;
            }

            #createAccountBtn:hover {
                background: #34a61d;
            }
        </style>
    </head>
    <body>
        <div class="photos">
            <h2>Top 3 posts with highest likes:</h2>
            <?php
                $conn=mysqli_connect('localhost','root','','test');
                $sql="SELECT images.image,user.lastname,images.likes from images inner join user on images.email=user.email order by likes desc limit 3";
                $res=mysqli_query($conn,$sql);
                echo "<table border=1 cellspacing=0 cellpadding=6 width=400><tr>";
                echo "<th>image</th><th>email</th><th>likes</th></tr>";
                while($row=mysqli_fetch_array($res))
                {
                    $imageURL = 'uploads/'.$row["image"];
                    echo '<tr><th><img src="'.$imageURL.'" alt="no image" height=100 width=100></th>';
                    echo '<th>'.$row["lastname"].'</th>';
                    echo '<th>'.$row["likes"].'</th></tr>';
                }
                echo "</table>";
            ?>
        </div>
        <div class="login">
        <br><br><br>
        <img src="facebook.jpg" height="80px" width="340px">
        <br>
            <form class="form" action="dashboard.php" method="post">
                <input placeholder="Email address or phone number" class="input" type="text" name="email">
                <input placeholder="Password" class="input" type="password" name="password"> 
                <button id="loginBtn" type="submit">Log in</button>
                <button class="create" id="createAccountBtn" formaction="form.html">Create new account</button>
            </form>
        </div>
    </body>
</html>