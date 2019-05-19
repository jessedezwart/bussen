<?php
require_once("Player.php");
require_once("Card.php");
require_once("Deck.php");
require_once("Field.php");
//require_once("statCounter.php");

/**
 * Runs the game
 */
class Game {
    private $gameState = "playing";
    private $player;
    private $deck;
    private $field;
    private $statCounter;


    function __construct() {
        $this->player = new Player;
        $this->deck = new Deck;

        $cardsForField = [];
        for ($i = 0; $i < 7; $i++) { 
            $cardsForField[] = $this->deck->takeCard();
        }
        $this->field = new Field($cardsForField);
        //$this->statCounter = new StatCounter;
    }


    function makeMove($choice) {
        //store card values in variables for later comparision
        $newCard = $this->deck->takeCard();
        $newCardValue = $newCard->getValue();
        $currentPosition = $this->player->getPosition();
        $currentCard = $this->field->getCard($currentPosition);
        $currentCardValue = $currentCard->getValue();

        //add the card to the field
        $this->field->addCard($newCard, $this->player->getPosition());
    
        //check the input
        switch ($choice) {
            case "higher":
                if ($currentCardValue < $newCardValue) {
                    $this->player->nextPosition();
                    return 0;
                } else {
                    $this->player->resetPosition();
                    return $currentPosition;
                }
                break;
            case "lower":
                if ($currentCardValue > $newCardValue) {
                    $this->player->nextPosition();
                    return 0;
                } else {
                    $this->player->resetPosition();
                    return $currentPosition;
                }
                break;
            case "tie":
                if ($currentCardValue == $newCardValue) {
                    $this->player->nextPosition();
                    return 0;
                } else {
                    $this->player->resetPosition();
                    return $currentPosition;
                }
                break;
        }
    }
}