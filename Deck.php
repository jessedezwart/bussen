<?php

class Deck {

    public $deck = [];

    function __construct() {
        $this->createDeck();
    }

    function createDeck() {
        $deck = [];
        for ($i = 1; $i<53; $i++) {
            if ($i<14) {
                $deck[$i]["suit"] = "Hearts";
            }
            if ($i>13 && $i<27) {
                $deck[$i]["suit"] = "Spades";
            }
            if ($i>26 && $i<39) {
                $deck[$i]["suit"] = "Diamonds";
            }
            if ($i>38) {
                $deck[$i]["suit"] = "Clubs";
            }
        }
        $card = 1;
        for ($i=1; $i<5; $i++) {
            for ($c=1; $c<14; $c++) {
                $deck[$card]["value"] = $c;
                $card++;
            }
        }
        shuffle($deck);
        $this->deck = $deck;
    }


    function takeCards($amount) {
        $cards = [];
        for ($i=0; $i<$amount; $i++) {
            $cards[] = $this->deck[count($this->deck)-1];
            array_pop($this->deck);
        }

        return $cards;
    }

    function getDeck() {
        return $this->deck;
    }

    function getDeckCount() {
        return count($this->deck);
    }

    
}