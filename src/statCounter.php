<?php

class StatCounter
{
    private $deckCount;
    private $turnCount;
    private $shotCount;

    public function getDeckCount()
    {
        return $this->deckCount;
    }

    public function getTurnCount()
    {
        return $this->turnCount;
    }

    public function getShotCount()
    {
        return $this->shotCount;
    }

    public function addDeckToCount()
    {
        $this->deckCount += 1;
    }

    public function addTurnToCount()
    {
        $this->turnCount += 1;
    }

    public function addShotsToCount($amount)
    {
        $this->shotCount += $amount;
    }

    public function calculateChance($deck, $field, $player)
    {
        //TODO: this function
    }
}
