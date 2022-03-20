<?php

namespace BlackJackGameStep1;

require_once('DrawCard.php');

class ComTurn
{
    public function __construct(private array $playerCards, private DrawCard $drawCard, private string $name)
    {
    }

    public function turn(): int
    {
        $countCards = count($this->playerCards);
        $playerRanks = [];
        for ($i = 0; $i <= ($countCards - 1); $i++) {
            $playerRanks[] = $this->playerCards[$i]["rank"];
        }
        echo $this->name . "の現在の得点は" . array_sum($playerRanks) . "です。カードを引きますか？（y/n）" . PHP_EOL;
        $choices = ["y", "n"];
        shuffle($choices);
        $choice = $choices[0];
        echo $choice . PHP_EOL;
        while ($choice === "y") {
            $this->playerCards[] = $this->drawCard->drawCard();
            $countCards = array_key_last($this->playerCards);
            $playerRanks[] = $this->playerCards[$countCards]["rank"];
            echo $this->name . "の引いたカードは" . $this->playerCards[$countCards]["mark"] . "の" . $this->playerCards[$countCards]["number"] . "です。" . PHP_EOL;
            if (($playerRanks[$countCards] === 11) && (array_sum($playerRanks))) {
                $playerRanks[$countCards] = 1;
            }
            if (array_sum($playerRanks) > 21) {
                echo $this->name . "の得点は" . array_sum($playerRanks) . "点となり、21点を超えました。" . PHP_EOL;
                return 0;
            }
            echo $this->name . "の現在の得点は" . array_sum($playerRanks) . "です。カードを引きますか？（y/n）" . PHP_EOL;
            shuffle($choices);
            $choice = $choices[0];
            echo $choice . PHP_EOL;
        }
        return array_sum($playerRanks);
    }
}
