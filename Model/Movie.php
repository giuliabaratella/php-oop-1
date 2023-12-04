<?php
include __DIR__ . "/Genre.php";
// credo una classe movie con le sue variabili di istanza 
class Movie
{
    public int $id;
    public string $title;
    public string $overview;
    public float $vote_average;
    public string $poster_path;
    public string $genre;
    public string $original_language;


    // funzione costruttore che passa i valori all'istanza
    function __construct($id, $title, $overview, $vote, $image, $genre, $language)
    {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->genre = $genre;
        $this->original_language = $language;
    }


    // funzione per creare una card e associarle i valori 
    // inclusione della "prop" card.php 
    public function printCard()
    {
        $title = $this->title;
        $overview = substr($this->overview, 0, 150);
        $vote = $this->voteStars();
        $image = $this->poster_path;
        $genre = $this->genre;
        $flag = $this->getLanguage($this->original_language);
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
    public function getLanguage($lan)
    {
        $flags = [
            'ca',
            'de',
            'en',
            'fr',
            'it',
            'ja',
            'kr',
            'us',
        ];
        if (!in_array($lan, $flags)) {
            $flag = 'img/noflag.png';
        } else {
            $flag = "img/" . $lan . ".svg";
        }
        return $flag;

    }


}



// prendo i dati dal file json 
$movieString = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movieString, true);


$movies = [];
foreach ($movieList as $item) {
    $genre = getGenres($genres);
    // $rndGenre = ($genres[rand(0, count($genres) - 1)]);
    $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $genre, $item['original_language']);
}
// stampo l'array $movies 
// var_dump($movies);


?>