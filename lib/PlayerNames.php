<?php

namespace BlackJackGameStep1;

class PlayerNames
{
    public function __construct(private int $number)
    {
    }

    public function getPlayerNames()
    {
        $playerNames = [];
        $playerNames[] = "あなた";
        if ($this->number > 1) {
            for ($i = 1; $i <= $this->number - 1; $i++) {
                $playerNames[] = "COM" . $i;
            }
        }
        return $playerNames;
    }
}
