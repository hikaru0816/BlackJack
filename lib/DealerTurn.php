<?php

namespace BlackJackGameStep1;

require_once('DrawCard.php');

class DealerTurn
{
    public function __construct(private array $dealerCards, private DrawCard $drawCard)
    {
    }

    public function turn(): int
    {
        echo "ディーラーの引いた2枚目のカードは" . $this->dealerCards[1]["mark"] . "の" . $this->dealerCards[1]["number"] . "です。" . PHP_EOL;
        $countCards = count($this->dealerCards);
        $dealerRanks = [];
        for ($i = 0; $i <= ($countCards - 1); $i++) {
            $dealerRanks[] = $this->dealerCards[$i]["rank"];
        }
        echo "ディーラーの現在の得点は" . array_sum($dealerRanks) . "です。" . PHP_EOL;
        if (array_sum($dealerRanks) > 17) {
            echo "ディーラーの得点が17点を超えているため、ディーラーはカードを引きません。" . PHP_EOL;
            return array_sum($dealerRanks);
        }
        while (array_sum($dealerRanks) <= 17) {
            $this->dealerCards[] = $this->drawCard->drawCard();
            $countCards = array_key_last($this->dealerCards);
            $dealerRanks[] = $this->dealerCards[$countCards]["rank"];
            echo "ディーラーの引いたカードは" . $this->dealerCards[$countCards]["mark"] . "の" . $this->dealerCards[$countCards]["number"] . "です。" . PHP_EOL;
            if (($dealerRanks[$countCards] === 11) && (array_sum($dealerRanks))) {
                $dealerRanks[$countCards] = 1;
            }
            if (array_sum($dealerRanks) > 21) {
                echo "ディーラーの得点が21点を超えました。" . PHP_EOL;
                return 0;
            }
            echo "ディーラーの現在の得点は" . array_sum($dealerRanks) . "です。" . PHP_EOL;
            if (array_sum($dealerRanks) > 17) {
                echo "ディーラーの得点が17点を超えたため、ターンを終了します。" . PHP_EOL;
                return array_sum($dealerRanks);
            }
            if (array_sum($dealerRanks) <= 17) {
                echo "ディーラーの得点が17点以下のため、もう一枚カードを引きます。" . PHP_EOL;
            }
        }
    }
}
