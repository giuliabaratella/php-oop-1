<?php
class Genre
{
    public string $name;

    function __construct($name)
    {
        $this->name = $name;
    }

}
function getGenres($array)
{
    $numGenres = rand(1, count($array) - 1);
    $genreList = "";
    for ($i = 0; $i <= $numGenres; $i++) {
        $genre = $array[rand(0, count($array) - 1)]->name;
        if (!str_contains($genreList, $genre)) {
            $genreList .= $genre . ' ';
        }
    }
    return $genreList;
}

$genreString = file_get_contents(__DIR__ . '/genre_db.json');
$genreList = json_decode($genreString, true);
$genres = [];
foreach ($genreList as $item) {
    $genres[] = new Genre($item);
}
// var_dump($genres);

?>