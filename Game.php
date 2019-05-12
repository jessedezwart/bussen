<?php

class Game {
    public $decks = 0;
    public $turns = 0;
    public $shots = 0;

    function checkChoice($choice, $field, $deck) {
        $newCard = $deck->takeCards(1);
        $newCard = $newCard[0];
        $currentCardValue = $field->getCardValue();
        $currentPosition = $field->getPosition();
        $shots = $field->getPosition() + 1;
    
        switch ($choice) {
            case "hoger":
                if ($currentCardValue < $newCard["value"]) {
                    $newPosition = $currentPosition + 1;
                    $shots = 0;
                } else {
                    echo $shots . " slokken drinken!\n";
                    $newPosition = 0;
                    
                }
                break;
            case "lager":
                if ($currentCardValue > $newCard["value"]) {
                    $newPosition = $currentPosition + 1;
                    $shots = 0;
                } else {
                    echo $currentPosition . " slokken drinken!\n";
                    $newPosition = 0;
                }
                break;
            case "paal":
                if ($currentCardValue == $newCard["value"]) {
                    $newPosition = $currentPosition + 1;
                    $shots = 0;
                } else {
                    $currentPosition *= 2;
                    echo $currentPosition . " slokken drinken!\n";
                    $newPosition = 0;
                }
                break;
        }
        
        $field->addCard($newCard);
        $field->setPosition($newPosition);
        $this->setTurns($this->getTurns() + 1);
        $this->setShots($this->getShots() + $shots);
    }

    function calculateChance($field, $deck) {
        $currentCardValue = $field->getCardValue();
        $higherCards = 0;
        $lowerCards = 0;
        $sameValueCards = 0;
        $deck = $deck->getDeck();
        $totalCards = 0;
    
        foreach ($deck as $card) {
            if ($card["value"] > $currentCardValue) {
                $higherCards += 1;
            } else if ($card["value"] < $currentCardValue) {
                $lowerCards += 1;
            } else if ($card["value"] == $currentCardValue) {
                $sameValueCards += 1;
            }
            $totalCards += 1;
        }
    
        $higherChance = round($higherCards / $totalCards * 100, 2);
        $lowerChance = round($lowerCards / $totalCards * 100, 2);
        $sameValueChance = round($sameValueCards / $totalCards * 100, 2);
        
        echo "Kans dat kaart hoger is: " . $higherChance . "%\n";
        echo "Kans dat kaart lager is: " . $lowerChance . "%\n";
        echo "Kans op paal: " . $sameValueChance . "%\n\n";
    }

    function setShots($shots) {
        $this->shots = $shots;
    }

    function getShots() {
        return $this->shots;
    }

    function setTurns($turns) {
        $this->turns = $turns;
    }

    function getTurns() {
        return $this->turns;
    }

    function checkGameOver($field) {
        if ($field->position == 7) {
            echo "Eruit!";
            exit();
        }
    }

    function checkNewDeck($deck) {
        if ($deck->getDeckCount() == 0) {
            //TODO: new deck
            echo "Deck op!";
            exit();
        }
    }
}