<?php

namespace BlackJackGameStep1\Tests;

use PHPUnit\Framework\TestCase;
use BlackJackGameStep1\CreateDeck;

require_once(__DIR__ . '/../lib/CreateDeck.php');

final class CreateDeckTest extends TestCase
{
    public function testCreateDeck()
    {
        $createDeck = new CreateDeck();
        $deck = $createDeck->createDeck();
        $count = count($deck);
        $this->assertSame(52, $count);
    }
}
