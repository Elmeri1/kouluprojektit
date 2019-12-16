<?php

    $msg = '';
    $msgClass = '';

    if(filter_has_var(INPUT_POST, 'submit')){
        echo 'submitted';

        $name = htmlspecialchars ($_POST['name']);
        $email = htmlspecialchars ($_POST['email']);
        $message = htmlspecialchars ($_POST['message']);

        if(!empty($email) && !empty($name) && !empty($message)){
            echo 'PASSED';
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){

                $msg = 'please use a valid email';
                $msgClass = 'alert-danger';
            } else {
                echo 'passed';
                $toEmail = 'support@test.com';
                $subject = 'contact request from'.$name;
                $body = '<h2>contact request</h2>
                    <h4>Name</h4><p>'.$name.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Message</h4><p>'.$message.'</p>
                ';

                $headers = "MIME_Version: 1.0" ."\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                if(mail($toEmail, $subject, $body, $headers)){
                    $msg = 'your email has been sent';
                    $msgClass = 'alert-success';
                } else {
                    $msg = 'your email was not sent';
                    $msgClass = 'alert-danger';
                }

            }

        } else {
            $msg = 'please fill in all fields';
            $msgClass = 'alert-danger';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navcar-brand" href="index.php">MY Website</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" 
                value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" 
                value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
            </div>
            <div class="form-group">
            <label>Message</label>
            <textarea name="message" class="form-control"><?php echo 
                isset($_POST['message']) ? $message : ''; ?></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>