<?php

class Frame
{
    public $firstThrow = 0;
    public $secondThrow = 0;

    public function __construct($frame)
    {
        $this->firstThrow = $frame[0];
        $this->secondThrow = $frame[1];
    }

    public function isSpare()
    {
        if (!$this->isStrike() && $this->firstThrow + $this->secondThrow== 10) {
            return true;
        }
        return false;
    }

    public function isStrike()
    {
        return ($this->firstThrow == 10);
    }

    public function addPoints()
    {
        return $this->firstThrow + $this->secondThrow;
    }
}