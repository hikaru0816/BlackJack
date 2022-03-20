<?php

namespace BlackJackGameStep1\Tests;

use PHPUnit\Framework\TestCase;
use BlackJackGameStep1\PlayerNames;

require_once(__DIR__ . '/../lib/PlayerNames.php');

final class PlayerNamesTest extends TestCase
{
    public function testGetPlayerNames()
    {
        // テスト1
        $test1 = new PlayerNames(1);
        $output1 = ["あなた"];
        $this->assertSame($output1, $test1->getPlayerNames());

        // テスト2
        $test2 = new PlayerNames(2);
        $output2 = ["あなた", "COM1"];
        $this->assertSame($output2, $test2->getPlayerNames());

        // テスト3
        $test3 = new PlayerNames(3);
        $output3 = ["あなた", "COM1", "COM2"];
        $this->assertSame($output3, $test3->getPlayerNames());
    }
}
