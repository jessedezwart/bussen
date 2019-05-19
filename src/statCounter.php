<?php

class StatCounter {
    private $deckCount;
    private $turnCount;
    private $shotCount;

    function getDeckCount() {
        return $this->deckCount;
    }

    function getTurnCount() {
        return $this->turnCount;
    }

    function getShotCount() {
        return $this->shotCount;
    }

    function addDeckToCount() {
        $this->deckCount += 1;
    }

    function addTurnToCount() {
        $this->turnCount += 1;
    }

    function addShotsToCount($amount) {
        $this->shotCount += $amount;
    }

    function calculateChance($deck, $field, $player) {
        //TODO: this function
    }
}