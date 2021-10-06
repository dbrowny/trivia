<?php

use PHPUnit\Framework\TestCase;

class WriterTest extends TestCase
{
    public function testWriteMessage(): void
    {
        $writer = new Writer(function ($message, $args) {
            return vsprintf($message, $args);
        });

        $this->assertEquals("Hallo Wessel", $writer->write("Hallo %s", "Wessel"));
    }

    public function testWriteComplexMessage(): void
    {
        $writer = new Writer(function ($message, $args) {
            return vsprintf($message, $args);
        });

        $this->assertEquals("Hallo Wessel, Hoe gaat ie? Groetjes Darren", $writer->write("Hallo %s, Hoe gaat ie? Groetjes %s", "Wessel", "Darren"));
    }
}
