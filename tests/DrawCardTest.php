<?php

namespace BlackJackGameStep1\Tests;

use PHPUnit\Framework\TestCase;
use BlackJackGameStep1\DrawCard;

require_once(__DIR__ . '/../lib/DrawCard.php');

final class DrawCardTest extends TestCase
{
    public function testDrawCard()
    {
        // テスト1
        $deck = ["d2", "s9", "cK"];
        $drawCard = new DrawCard($deck);
        $card = [
            "card" => "d2",
            "mark" => "ダイヤ",
            "number" => "2",
            "rank" => 2,
        ];
        $this->assertSame($card, $drawCard->drawCard($deck));
        // テスト2
        $card = [
            "card" => "s9",
            "mark" => "スペード",
            "number" => "9",
            "rank" => 9,
        ];
        $this->assertSame($card, $drawCard->drawCard($deck));
        // テスト3
        $card = [
            "card" => "cK",
            "mark" => "クラブ",
            "number" => "K",
            "rank" => 10,
        ];
        $this->assertSame($card, $drawCard->drawCard($deck));
    }

    public function testGetMark()
    {
        $deck = [];
        $drawCard = new DrawCard($deck);
        $this->assertSame("ダイヤ", $drawCard->getMark("d2"));
        $this->assertSame("クラブ", $drawCard->getMark("c2"));
        $this->assertSame("スペード", $drawCard->getMark("s2"));
        $this->assertSame("ハート", $drawCard->getMark("h2"));
    }

    public function testGetNumber()
    {
        $deck = [];
        $drawCard = new DrawCard($deck);
        $this->assertSame("2", $drawCard->getNumber("d2"));
        $this->assertSame("A", $drawCard->getNumber("cA"));
        $this->assertSame("10", $drawCard->getNumber("s10"));
        $this->assertSame("Q", $drawCard->getNumber("hQ"));
    }

    public function testGetRank()
    {
        $deck = [];
        $drawCard = new DrawCard($deck);
        $this->assertSame(2, $drawCard->getRank("2"));
        $this->assertSame(11, $drawCard->getRank("A"));
        $this->assertSame(10, $drawCard->getRank("10"));
        $this->assertSame(10, $drawCard->getRank("Q"));
    }
}
