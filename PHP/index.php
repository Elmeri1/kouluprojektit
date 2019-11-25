<?php

    $msg = '';
    $msgClass = '';

    if(filter_has_var(INPUT_POST, 'submit')){
        echo 'submitted';
        $_POST
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if(!empty($email) && !empty($name) && !empty($message)){
            echo 'PASSED';
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
            <div class="alert <?php echo $msgClass; ?>"><?php echo $ 
            msg; ?></div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
            <div class="form-group">
            <label>Message</label>
            <textarea name="message" class="form-control"></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>