<html>
<head>
  <title> Login/Sign-up Page</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="script/script.js"></script>
  <?php include 'php/connection.php';?>
  <?php include 'php/register.php';?>
</head>
<body>

  <div class="form">

    <ul class="logSig">
      <li class="signup-tab" ><p id="log" onclick="showlog()">Log In</p></li>
      <li class="login-tab" ><p id="sig" onclick="showsig()" >Sign Up</p></li>
    </ul>

    <div class="tab-content">
      <div id="signup">
        <h1>Register to our amazing library</h1>

        <form method="POST"
 action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

          <div class="inLine">

            <div class="field-wrap">
              <label>
                First name
              </label>
              <span class="error"><?php echo $fnameErr;?></span>
              <input type="text" name="fname" value="<?php echo htmlspecialchars($fname);?>"/>
            </div>

            <div class="field-wrap">
              <label>
                Last name
              </label>
              <span class="error"><?php echo $lnameErr;?></span>
              <input type="text" name="lname" value="<?php echo htmlspecialchars($lname);?>"/>
            </div>

          </div>

          <div class="inLine">

            <div class="field-wrap">
              <label>
                Address Line 1
              </label>
              <span class="error"><?php echo $addErr;?></span>
              <input type="text" name="add" value="<?php echo htmlspecialchars($add);?>"/>
            </div>

            <div class="field-wrap">
              <label>
                Address Line 2
              </label>
              <span class="error"><?php echo $add2Err;?></span>
              <input type="text" name="add2" value="<?php echo htmlspecialchars($add2);?>"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              City
            </label>
            <span class="error"><?php echo $cityErr;?></span>
            <input type="text" name="city" value="<?php echo htmlspecialchars($city);?>"/>
          </div>

          <div class="contact">

            <div class="field-wrap">
              <label>
                Telephone
              </label>
              <span class="error"><?php echo $teleErr;?></span>
              <input type="text" name="tele" value="<?php echo htmlspecialchars($tele);?>"/>
            </div>

            <div class="field-wrap">
              <label>
                Mobile
              </label>
              <span class="error"><?php echo $mobErr;?></span>
              <input type="text" name="mob" value="<?php echo htmlspecialchars($mob);?>"/>
            </div>

          </div>

          <div class="field-wrap">
            <label>
              Username
            </label>
            <span class="error"><?php echo $UsernameErr;?></span>
            <span class="error"><?php echo $UsernameErr;?></span>
            <input type="text" name="Username" value="<?php echo htmlspecialchars($Username);?>"/>
          </div>

          <div class="field-wrap">
            <label>
              Password
            </label>
            <input type="password" name="pwd1"/>
          </div>

          <div class="field-wrap">
            <label>
              Confirm Password
            </label>
            <input type="password" name="pwd"/>
          </div>

          <button type="submit" class="button"/>Register</button>

        </form>

      </div>

      <div id="Login">
        <h1>Welcome Back</h1>

          <form action"" method="post">

            <div class="field-wrap">
              <label>
                Username
              </label>
              <input type="text" />
            </div>

            <div class="field-wrap">
              <label>
                Password
              </label>
              <input type="password" />
            </div>

            <p class="forgot"><a href="#">Forgot Password?</a></p>

            <button type="submit" name="Submit" class="button"/>Log In</button>

          </form>

        </div>

      </div> <!---close tab-content-->

    </div> <!--close form-->
    <script type="text/javascript" name="log"><?php echo $log;?></script>
</body>
</html>
