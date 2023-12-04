<?php

// credo una classe movie con le sue variabili di istanza 
class Movie
{
    public int $id;
    public string $title;
    public string $overview;
    public float $vote_average;
    public string $poster_path;

    // funzione costruttore che passa i valori all'istanza
    function __construct($id, $title, $overview, $vote, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
    }

    // funzione per creare una card e associarle i valori 
    // inclusione della "prop" card.php 
    public function printCard()
    {
        $title = $this->title;
        $overview = substr($this->overview, 0, 150);
        $vote = $this->voteStars();
        $image = $this->poster_path;
        include __DIR__ . "/../Views/card.php";

    }
    public function voteStars()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($i = 1; $i <= 5; $i++) {
            $template .= $i <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }
}

// prendo i dati dal file json 
$movieString = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movieString, true);
// var_dump($movieList);

// creo array vuoto in cui inserire le istanze come oggetti e lo popolo con un ciclo
$movies = [];
foreach ($movieList as $item) {
    $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path']);
}
// stampo l'array $movies 
// var_dump($movies);


?>