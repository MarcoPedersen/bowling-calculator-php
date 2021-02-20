<?php

require_once('Frame.php');

class BowlingScoreCalculator
{

    public $frames;
    public $strikeCounter = 0;

    /**
     * BowlingScoreCalculator constructor.
     * @param $frames
     */
    public function __construct($frames)
    {
        $this->frames = $frames;
    }

    /***
     * Calculate points
     *
     * @return array [2,15,20,28,36,44,53,62,71]
     */

    public function calculateScore()
    {
        $calculatedSum = [];
        $totalPoints = 0;

        foreach ($this->frames as $index => $frame) {
            $frameObj = new Frame($frame);
            $totalPoints+= $frameObj->addPoints();
            $nextIndex = $index + 1;
            $lastIndex = array_key_last($this->frames);
            if($lastIndex != $index) {
                if ($frameObj->isSpare()) {
                    $totalPoints+= $this->frames[$nextIndex][0];
                } else if ($frameObj->isStrike()) {
                    $totalPoints+=$this->strikeBonusPoints($index);
                    $this->resetStrikeCounter();
                }
            }
            $calculatedSum[] = $totalPoints;
        }
        return $calculatedSum;
    }

    public function strikeBonusPoints($index)
    {
        $this->strikeCounter++;
        $bonusPoints = 0;

        do {
            $nextIndex = $index + 1;
            $nextFrame = $this->frames[$nextIndex] ?? [0,0];
            $frame= new Frame($nextFrame);
            $bonusPoints+= $frame->addPoints();

            if($frame->isStrike()) {
                $this->strikeCounter++;
                $index++;
            }

        } while ($this->strikeCounter <= 2 && $frame->isStrike());

        return $bonusPoints;
    }

    private function resetStrikeCounter()
    {
        $this->strikeCounter = 0;
    }
}