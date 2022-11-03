<?php
//Detect current session
session_start();

//Include page layout header
include("header.php");
?>

<div style="width:80%; margin:auto;">
    <form action="checkLogin.php" method="post">
        <!-- Row 1: Header Row -->
        <div class="form-group row">
            <div class="col-sm-9 offset-sm-3">
                <span class="page-title">Member Login</span>
            </div>
        </div>

        <!-- Row 2 : Email Input -->
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">
                Email Address:
            </label>
            <div class="col-sm-9">
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>

        <!-- Row 3: Password Input -->
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">
                Password:
            </label>
            <div class="col-sm-9">
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>

        <!-- Row 4: Login Button -->
        <div class="form-group row">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-primary">Login</button>
                <p>Please sign up if you do not have an account</p>
                <p><a href="forgetPassword.php">Forget Password</a></p>
            </div>
        </div>
    </form>
</div>


<?php
//Include page layout footer
include("footer.php");
?>