<?php
class Genre
{
    public string $name;

    function __construct($name)
    {
        $this->name = $name;
    }
    public static function fetchAll()
    {
        $genreString = file_get_contents(__DIR__ . '/genre_db.json');
        $genreList = json_decode($genreString, true);
        $genres = [];
        foreach ($genreList as $item) {
            $genres[] = new Genre($item);
        }
        return $genres;
    }
    // var_dump($genres);
}



?>