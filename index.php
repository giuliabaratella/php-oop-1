<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Movie.php";
$movies = Movie::fetchAll();

?>

<section>
    <h2>Movies</h2>
    <div class="row">
        <?php
        foreach ($movies as $movie) {
            $movie->printCard();

        }
        ?>
    </div>
</section>


<?php
include __DIR__ . "/Views/footer.php";
?>