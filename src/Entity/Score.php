<?php

namespace App\Entity;

class Score
{

    private int $score;

    private int $nbrQuestion;

    /**
     * @param int $score
     * @param int $nbrQuestion
     */
    public function __construct(int $score, int $nbrQuestion)
    {
        $this->score = $score;
        $this->nbrQuestion = $nbrQuestion;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getNbrQuestion(): int
    {
        return $this->nbrQuestion;
    }
}