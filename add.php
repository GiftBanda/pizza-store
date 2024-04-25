<?php 
// if(isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// }

if(isset($_POST['submit'])) {

    if(empty($_POST['email'])) {
        echo "Email field is required <br />";
    } else {
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email $email <br />";
        }else {
            echo "Please provide a valid email address. <br />";
        }
    }
    
    if(empty($_POST['title'])) {
        echo "Title field is required <br />";
    } else {
        echo htmlspecialchars($_POST['title']);
    }
    
    if(empty($_POST['ingredients'])) {
        echo "Ingredients field is required <br />";
    } else {
        echo htmlspecialchars($_POST['ingredients']);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h1 class="center">Add a Pizza</h1>
<form class="white" action="add.php" method="POST">
    <label>Your Email</label>
    <input type="text" name="email" />
    <label>Pizza Title</label>
    <input type="text" name="title" />
    <label>Ingredients(comma separated):</label>
    <input type="text" name="ingredients" />
    <div class="center">
        <input type="submit" name="submit" class="btn brand z-depth-0" />
    </div>
</form>
</section>

<?php include('templates/footer.php') ?>
    
</html>