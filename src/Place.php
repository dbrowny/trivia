<?php

class Place
{
    private int $position;

    public function __construct()
    {
        $this->position = 0;
    }

    public function moveBy($steps): void
    {
        $this->position += $steps;

        if ($this->position > 11) {
            $this->moveBy(-12);
        }
    }

    public function __toString()
    {
        return (string)$this->get();
    }

    public function get(): int
    {
        return $this->position;
    }
}
