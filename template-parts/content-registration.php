<?php
    global $wpdb, $user_ID;
    if (!$user_ID) {
       //All code goes in here.
    }
    else {
       wp_redirect( home_url() ); exit;
    }
?>

<h3>Create your account</h3>
    <form action="" method="post" name="user_registeration">
        <label>Username <span class="error">*</span></label>
        <input type="text" name="username" placeholder="Enter Your Username" class="text" required /><br />
        <label>Email address <span class="error">*</span></label>
        <input type="text" name="useremail" class="text" placeholder="Enter Your Email" required /> <br />
        <label>Password <span class="error">*</span></label>
        <input type="password" name="password" class="text" placeholder="Enter Your password" required /> <br />
        <input type="submit" name="user_registeration" value="SignUp" />
    </form>
<?php if(isset($signUpError)){echo '<div>'.$signUpError.'</div>';}?>
