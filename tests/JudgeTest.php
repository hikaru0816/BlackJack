<?php

namespace BlackJackGameStep1\Tests;

use PHPUnit\Framework\TestCase;
use BlackJackGameStep1\Judge;

require_once(__DIR__ . '/../lib/Judge.php');

final class JudgeTest extends TestCase
{
    public function testJudge()
    {
        // テスト1
        $playerPoints = [
            "あなた" => 21,
            "COM1" => 20,
            "COM2" => 19,
            "COM3" => 0,
        ];
        $dealerPoint = 20;
        $judge = new Judge($playerPoints, $dealerPoint);
        $output = <<<EOD
各プレイヤーとディーラーの得点は
あなた : 21点
COM1 : 20点
COM2 : 19点
COM3 : 21点を超えています
ディーラー : 20点
各プレイヤーの勝敗は
あなた : 勝ち
COM1 : 引き分け
COM2 : 負け
COM3 : 負け

EOD;
        $this->expectOutputString($output);
        $judge->judge();
    }
}
