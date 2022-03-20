<?php

namespace BlackJackGameStep1;

class NumberOfPlayer
{
    public function inputNumberOfPlayer()
    {
        $member = trim(mb_convert_kana(fgets(STDIN), "s"));
        while ($member < 1 || 3 < $member) {
            echo "プレイヤー数が不正です。" . PHP_EOL;
            echo "プレイヤー数を入力してください。(1～3を入力)" . PHP_EOL;
            $member = trim(mb_convert_kana(fgets(STDIN), "s"));
        }
        return $member;
    }
}
