<?php

namespace BlackJackGameStep1;

class DrawCard
{
    private const MARKS = [
        "h" => "ハート",
        "c" => "クラブ",
        "d" => "ダイヤ",
        "s" => "スペード",
    ];
    private const RANKS = [
        "A" => 11,
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
        "8" => 8,
        "9" => 9,
        "10" => 10,
        "J" => 10,
        "Q" => 10,
        "K" => 10,
    ];

    public function __construct(private array $deck)
    {
    }

    public function drawCard(): array
    {
        $drawCard = [];
        $drawCard["card"] = $this->deck[array_key_first($this->deck)];
        $drawCard["mark"] = $this->getMark($drawCard["card"]);
        $drawCard["number"] = $this->getNumber($drawCard["card"]);
        $drawCard["rank"] = $this->getRank($drawCard["number"]);
        array_shift($this->deck);
        return $drawCard;
    }

    public function getMark(string $card): string
    {
        $mark = self::MARKS[substr($card, 0, 1)];
        return $mark;
    }

    public function getNumber(string $card): string
    {
        $number = substr($card, 1);
        return $number;
    }

    public function getRank(string $number): int
    {
        $rank = self::RANKS[$number];
        return $rank;
    }
}
