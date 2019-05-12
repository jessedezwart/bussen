<?php

class Field {

    public $field = [];
    public $position = 0;

    function __construct($cardArr) {
        for ($i=0; $i<7; $i++) {
            $this->field[$i][] = $cardArr[$i];
        }
    }

    function addCard($card) {
        $this->field[$this->position][] = $card;
    }

    function displayField() {
        $field = $this->getField();
        foreach ($field as $key => $spot) {
            foreach ($spot as $card) {
             echo $this->prettyPrintCard($card["value"]) . " -> ";
            }
            if ($key == $this->position) {
                echo " ?";
            }
            echo "\n";
        }
    }

    function getField() {
        return $this->field;
    }

    function getCardValue() {
        return $this->field[$this->position][count($this->field[$this->position])-1]["value"];
    }

    function setPosition($position) {
        $this->position = $position;
    }

    function getPosition () {
        return $this->position;
    }

    function prettyPrintCard($card) {
        $cardValue = $card;
        if ($cardValue < 10) {
            $cardValue = $cardValue + 1;
        } else if ($cardValue == 10) {
            $cardValue = "J";
        } else if ($cardValue == 11) {
            $cardValue = "Q";
        } else if ($cardValue == 12) {
            $cardValue = "H";
        } else if ($cardValue == 13) {
            $cardValue = "A";
        }
        return $cardValue;
    }
}