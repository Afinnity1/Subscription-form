<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Subscription Form</title>
</head>
<body>
    <input type="checkbox" id="toggle">
    <label for="toggle" class="show-btn">Show Modal</label>
    <div class="wrapper">
        <label for="toggle" class="cancel-btn"><i class="fa fa-window-close"></i></label>
        <div class="content">
            <header>Become A Subscriber</header>
            <p>Subscribe to our blog and get the latest updates straight to your inbox</p> 
        </div>
        
        <form action="index.php" method="POST">
            <?php
                $userEmail = ""; //first we leave this field blank
                if(isset($_POST['subscribe'])){ //if the subscribe button is clicked
                    $userEmail = $_POST['email']; //getting user email
                    if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //for validating user entered email
                        $subject = "Thanks for subscribing to us -AfinnityDev";
                        $message = "Thanks for subscribing to our web app. You will receive latest updates from us";
                        $sender = "From: afinniomotola410@gmail.com";
                        if(mail($userEmail, $subject, $message, $sender)){ //php function to send mail
                            ?>
                                <!-- shows success message if mail is sent successfully -->
                                <div class="alert success">Thanks for subscribing to us</div>
                            <?php
                            $userEmail = ""; //we'll again leave this field blank once mail is sent
                        }else{
                            ?>
                                <!-- shows error message if mail can't be sent  -->
                                <div class="alert error">Failed while sending your email</div>
                            <?php                            
                        }
                    }else{
                        ?>
                            <!-- shows an error message if user enters invalid email -->
                            <div class="alert error"><?php echo $userEmail ?>is not a valid email</div>
                        <?php 
                    }
                }
            
            ?>
            <div class="field">
                <input type="text" name="email" placeholder="Email Address" required value="<?php echo $userEmail ?>" />
            </div>
            <div class="field btn">
                <input type="submit" name="subscribe" value="Subscribe"/>
            </div>
        </form>
        <div class="text">We do not share your information.</div>
    </div>
    
</body>
</html>