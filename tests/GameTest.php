<?php

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testIsPlayable(): void
    {
        $game = new Game(new Writer(function(){}));
        $game->add(new Player('dexter'));
        $game->add(new Player('james'));

        $this->assertTrue($game->isPlayable());
    }

    public function testIsNotPlayable(): void
    {
        $game = new Game(new Writer(function(){}));
        $game->add(new Player('dexter'));

        $this->assertFalse($game->isPlayable());
    }

    public function testIsNotPlayableWhenNoPlayers(): void
    {
        $game = new Game(new Writer(function(){}));
        $this->assertFalse($game->isPlayable());
    }
}
