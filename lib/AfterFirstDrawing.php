<?php

namespace BlackJackGameStep1;

class AfterFirstDrawing
{
    public function __construct(private array $playerCards, private array $dealerCards, private int $firstDraw, private array $playerNames)
    {
    }

    public function display(): void
    {
        echo "ブラックジャックを開始します。" . PHP_EOL;
        $this->playerDisplay();
        $this->dealerDisplay();
    }

    private function playerDisplay(): void
    {
        foreach ($this->playerNames as $playerName) {
            echo $playerName . "が引いたカードは" . PHP_EOL;
            for ($i = 0; $i <= ($this->firstDraw - 1); $i++) {
                echo "・" . $this->playerCards[$playerName][$i]["mark"] . "の" . $this->playerCards[$playerName][$i]["number"] . PHP_EOL;
            }
        }
    }

    private function dealerDisplay(): void
    {
        echo "ディーラーが1枚目に引いたカードは" . PHP_EOL;
        echo "・" . $this->dealerCards[0]["mark"] . "の" . $this->dealerCards[0]["number"] . PHP_EOL;
        echo "ディーラーが2枚目に引いたカードはわかりません。" . PHP_EOL;
    }
}
