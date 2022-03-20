<?php

namespace BlackJackGameStep1;

class CreateDeck
{
    public function createDeck()
    {
        // 52枚のトランプを作成
        $cards = [];
        foreach (["h", "c", "d", "s"] as $mark) {
            foreach (["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"] as $number) {
                $cards[] = $mark . $number;
            }
        }
        // カードをシャッフル
        shuffle($cards);
        return $cards;
    }
}
