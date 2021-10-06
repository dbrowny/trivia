<?php

use PHPUnit\Framework\TestCase;

class PlayersTest extends TestCase
{
    public function testGetAtPosition(): void
    {
        $players = new Players();
        $players->append(new Player('dexter'));
        $players->append(new Player('james'));

        $this->assertEquals('dexter', $players->get(0));
        $this->assertEquals('james', $players->get(1));
    }

    public function testGetCurrentPlayer(): void
    {
        $players = new Players();
        $players->append(new Player('dexter'));
        $players->append(new Player('james'));

        $this->assertEquals('dexter', $players->get());
        $players->next();
        $this->assertEquals('james', $players->get());
        $players->next();
        $this->assertEquals('dexter', $players->get());
        $players->next();
        $this->assertEquals('james', $players->get());
    }
}
