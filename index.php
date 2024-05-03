<?php

//connect to db
$conn = mysqli_connect("localhost", "gift", "test1234", "ninja_pizza");

// Check connection
if (!$conn) {
    echo "connection error: " . mysqli_connect_error();
    //die("". mysqli_connect_error());
}

// write query for all pizzas
$sql = "SELECT title, ingredients, id FROM pizzas ORDER BY created_at";

// make query and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

//print_r($pizzas);

// explode works like split in js
//explode(",", $pizzas[0]["ingredients"]);

?>

<!DOCTYPE html>
<html lang="en">

<?php include ('templates/header.php') ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                       <h3><?php echo htmlspecialchars($pizza['title']) ?> </h3>
                       <ul>
                        <?php foreach (explode(",", $pizza['ingredients']) as $ing) { ?>
                            <li><?php echo $ing ?></li>
                        <?php } ?>
                       </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<?php include ('templates/footer.php') ?>

</html>