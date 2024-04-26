<?php
// if(isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// }

$email = $title = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = "Email field is required <br />";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email must be a valid email <br />";
        }
        // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     echo "Email $email <br />";
        // } else {
        //     echo "Please provide a valid email address. <br />";
        // }
    }

    //check title
    if (empty($_POST['title'])) {
        $errors['title'] = "Title field is required <br />";
    } else {
        $title = $_POST["title"];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only <br />';
        }
    }

    //check ingredients
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = "Ingredients field is required <br />";
    } else {
        $ingredients = $_POST["ingredients"];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be letters and separated by commas <br />';
        }
    }

    if(array_filter($errors)) {
        // echo "Errors in the form";
    } else {
        header('Location: index.php');
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
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>" />
        <p class="red-text"><?php echo $errors['email'] ?></p>

        <label>Pizza Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>" />
        <p class="red-text"><?php echo $errors['title'] ?></p>

        <label>Ingredients(comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>" />
        <p class="red-text"><?php echo $errors['ingredients'] ?></p>

        <div class="center">
            <input type="submit" name="submit" class="btn brand z-depth-0" />
        </div>
    </form>
</section>

<?php include('templates/footer.php') ?>

</html>