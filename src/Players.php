<?php

class Players extends ArrayObject
{
    private int $current;

    public function __construct()
    {
        $this->current = 0;
    }

    public function get($pos = false): mixed
    {
        if ($pos === false) {
            $pos = $this->current;
        }

        return $this->offsetGet($pos);
    }

    public function next(): void
    {
        ++$this->current;

        if ($this->current >= $this->count()) {
            $this->current = 0;
        }
    }
}
