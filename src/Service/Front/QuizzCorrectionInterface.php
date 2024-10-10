<?php

namespace App\Service\Front;

use App\Entity\Answer;
use App\Entity\Score;

interface QuizzCorrectionInterface
{
    /**
     * @param array<int,Answer[]> $data
     * @return array<int,array<int,bool>>
     */
    public function correctForm(array $data):array;

    /**
     * @param array<int,array<int,bool>> $correction $correction
     * @return Score
     */
    public function calculateScore(array $correction):Score;
}