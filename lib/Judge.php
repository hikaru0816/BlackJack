<?php

namespace BlackJackGameStep1;

class Judge
{
    public function __construct(private array $playerPoints, private int $dealerPoint)
    {
    }

    public function judge()
    {
        echo "各プレイヤーとディーラーの得点は" . PHP_EOL;
        $playerNames = array_keys($this->playerPoints);
        foreach ($playerNames as $playerName) {
            if ($this->playerPoints[$playerName] === 0) {
                echo $playerName . " : 21点を超えています" . PHP_EOL;
            } elseif ($this->playerPoints[$playerName] !== 0) {
                echo $playerName . " : " . $this->playerPoints[$playerName] . "点" . PHP_EOL;
            }
        }
        if ($this->dealerPoint === 0) {
            echo "ディーラー : 21点を超えています" . PHP_EOL;
        } elseif ($this->dealerPoint !== 0) {
            echo "ディーラー : " . $this->dealerPoint . "点" . PHP_EOL;
        }
        echo "各プレイヤーの勝敗は" . PHP_EOL;
        $this->playerJudge();
    }

    public function playerJudge()
    {
        $playerNames = array_keys($this->playerPoints);
        foreach ($playerNames as $playerName) {
            if ($this->playerPoints[$playerName] === 0) {
                echo $playerName . " : 負け" . PHP_EOL;
            } elseif ($this->playerPoints[$playerName] > $this->dealerPoint) {
                echo $playerName . " : 勝ち" . PHP_EOL;
            } elseif ($this->playerPoints[$playerName] === $this->dealerPoint) {
                echo $playerName . " : 引き分け" . PHP_EOL;
            } elseif ($this->playerPoints[$playerName] < $this->dealerPoint) {
                echo $playerName . " : 負け" . PHP_EOL;
            }
        }
    }
}
