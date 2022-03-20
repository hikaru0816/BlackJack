<?php

namespace BlackJackGameStep1\Tests;

use PHPUnit\Framework\TestCase;
use BlackJackGameStep1\AfterFirstDrawing;

require_once(__DIR__ . '/../lib/AfterFirstDrawing.php');

final class AfterFirstDrawingTest extends TestCase
{
    public function testDisplay()
    {
        $playerCards = [];
        $playerCards["あなた"][0] = [
            "card" => "d2",
            "mark" => "ダイヤ",
            "number" => "2",
            "rank" => 2,
        ];
        $playerCards["あなた"][1] = [
            "card" => "c9",
            "mark" => "クラブ",
            "number" => "9",
            "rank" => 9,
        ];
        $playerCards["COM1"][0] = [
            "card" => "d5",
            "mark" => "ダイヤ",
            "number" => "5",
            "rank" => 5,
        ];
        $playerCards["COM1"][1] = [
            "card" => "cQ",
            "mark" => "クラブ",
            "number" => "Q",
            "rank" => 10,
        ];
        $dealerCards = [];
        $dealerCards[0] = [
            "card" => "s9",
            "mark" => "スペード",
            "number" => "9",
            "rank" => 9,
        ];
        $dealerCards[1] = [
            "card" => "hK",
            "mark" => "ハート",
            "number" => "K",
            "rank" => 10,
        ];
        $playerNames = ["あなた", "COM1"];
        $output = <<<EOD
ブラックジャックを開始します。
あなたが引いたカードは
・ダイヤの2
・クラブの9
COM1が引いたカードは
・ダイヤの5
・クラブのQ
ディーラーが1枚目に引いたカードは
・スペードの9
ディーラーが2枚目に引いたカードはわかりません。

EOD;
        $this->expectOutputString($output);
        $firstDisplay = new AfterFirstDrawing($playerCards, $dealerCards, 2, $playerNames);
        $firstDisplay->display();
    }
}
