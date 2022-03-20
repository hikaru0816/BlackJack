<?php

namespace BlackJackGameStep1\Tests;

use PHPUnit\Framework\TestCase;
use BlackJackGameStep1\Welcome;

require_once(__DIR__ . '/../lib/Welcome.php');

final class WelcomeTest extends TestCase
{
    public function testDisplay()
    {
        $display = new Welcome();
        $output = <<<EOD
ブラックジャックゲームへようこそ！！
プレイヤー数を入力してください。(1～3を入力)

EOD;
        $this->expectOutputString($output);
        $display->display();
    }
}
