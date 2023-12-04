<?php

// credo una classe movie con le sue variabili di istanza 
class movie
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
}

// prendo i dati dal file json 
$movieString = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movieString, true);
// var_dump($movieList);

// creo array vuoto in cui inserire le istanze come oggetti e lo popolo con un ciclo
$movies = [];
foreach ($movieList as $item) {
    $movies[] = new movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path']);
}
// stampo l'array $movies 
var_dump($movies);


?>