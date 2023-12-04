<?php


class movie
{
    public int $id;
    public string $title;
    public string $overview;
    public float $vote_average;
    private string $poster_path;

    function __construct($id, $title, $overview, $vote, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
    }
}


?>