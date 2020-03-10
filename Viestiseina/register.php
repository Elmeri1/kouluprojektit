<?php 
session_start();
?>

<?php include 'inc/header.php'; ?>

<div class="container">
    <div class="row">
        <h1>Register</h1>
        
    </div>
    <div class="row">
        <div class="col">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                        foreach ($_SESSION['error'] as $error) {
                            echo $error . "<br>"; 
                        }
                    
                    ?>
                </div>
            <?php endif; ?>
            <form action="new_user.php" method="post">

                <div class="form-group">
                    <label for="first_name">Etunimi</label>
                    <input class="form-control" type="text" placeholder="Etunimi" name="firstname">
                </div>

                <div class="form-group">
                    <label for="lastname">Sukunimi</label>
                    <input class="form-control" type="text" placeholder="Sukunimi" name="lastname">
                </div>

                <div class="form-group">
                    <label for="email">Sähköposti</label>
                    <input class="form-control" type="text" placeholder="Email" name="email">
                </div>

                <div class="form-group">
                    <label for="passwd">Salasana</label>
                    <input class="form-control" type="password" placeholder="Salasana" name="passwd">
                </div>

                <div class="form-group">
                    <label for="passwd2">Salasana uudelleen</label>
                    <input class="form-control" type="password" placeholder="Salasana" name="passwd2">
                </div>

                <input type="submit" class="btn btn-primary" value="Rekisteröidy">

            </form>
        </div>
    </div>

</div>

<?php include 'inc/footer.php'; ?>