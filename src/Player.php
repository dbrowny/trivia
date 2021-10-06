<?php

class Player
{
    private Place $place;
    private int $purses;
    private bool $penaltyBox;
    private bool $isGettingOutOfPenaltyBox;
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->place = new Place();
        $this->purses = 0;
        $this->penaltyBox = false;
        $this->isGettingOutOfPenaltyBox = false;
    }

    public function setGettingOutPenaltyBox($status)
    {
        $this->isGettingOutOfPenaltyBox = $status;
    }

    public function isGettingOutOfPenaltyBox(): bool
    {
        return $this->isGettingOutOfPenaltyBox;
    }

    public function isInPenaltyBox(): bool
    {
        return $this->penaltyBox;
    }

    public function setPenaltyBox($status)
    {
        $this->penaltyBox = $status;
    }

    public function addPurses($count)
    {
        $this->purses += $count;
    }

    public function getPurses(): int
    {
        return $this->purses;
    }

    public function getPlace(): Place
    {
        return $this->place;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function didWin(): bool
    {
        return ($this->getPurses() == 6);
    }

    public function getCurrentCategory(): string
    {
        return match ($this->getPlace()->get()) {
            0, 4, 8 => Questions::POP,
            1, 5, 9 => Questions::SCIENCE,
            2, 6, 10 => Questions::SPORTS,
            default => Questions::ROCK,
        };
    }
}