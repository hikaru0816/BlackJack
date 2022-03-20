<?php

namespace BlackJackGameStep1;

require_once('DrawCard.php');

class PlayerTurn
{
    public function __construct(private array $playerCards, private DrawCard $drawCard, private string $name)
    {
    }

    public function turn()
    {
        $countCards = count($this->playerCards);
        $playerRanks = [];
        for ($i = 0; $i <= ($countCards - 1); $i++) {
            $playerRanks[] = $this->playerCards[$i]["rank"];
        }
        echo $this->name . "の現在の得点は" . array_sum($playerRanks) . "です。カードを引きますか？（y/n）" . PHP_EOL;
        while (trim(mb_convert_kana(fgets(STDIN), "s")) === "y") {
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
        }
        return array_sum($playerRanks);
    }
}
