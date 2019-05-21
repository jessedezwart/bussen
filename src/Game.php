<?php
namespace Bussen;
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

/**
 * Runs the game
 */
class Game
{
    private $gameState = "playing";
    private $player;
    private $deck;
    private $field;
    private $statCounter;


    public function __construct()
    {
        $this->player = new Player;
        $this->deck = new Deck;
        $this->statCounter = new StatCounter;

        $cardsForField = [];
        for ($i = 0; $i < 7; $i++) {
            $cardsForField[] = $this->deck->takeCard();
        }
        $this->field = new Field($cardsForField);
    }


    public function makeMove($choice)
    {
        //check if deck still has cards, if not, create a new deck
        if ($this->deck->countCardsInDeck() == 0) {
            $this->deck = new Deck;
            $this->statCounter->addDeckToCount();
        }

        //store card values in variables for later comparision
        $newCard = $this->deck->takeCard();
        $newCardValue = $newCard->getValue();
        $currentPosition = $this->player->getPosition();
        $currentCard = $this->field->getCard($currentPosition);
        $currentCardValue = $currentCard->getValue();

        //add the card to the field
        $this->field->addCard($newCard, $this->player->getPosition());
    
        //add turn to statcounter
        $this->statCounter->addTurnToCount();

        //check the input
        switch ($choice) {
            case "higher":
                if ($currentCardValue < $newCardValue) {
                    $this->player->nextPosition();
                    return 0;
                } else {
                    $this->player->resetPosition();
                    $this->statCounter->addShotsToCount($currentPosition);
                    return $currentPosition;
                }
                break;
            case "lower":
                if ($currentCardValue > $newCardValue) {
                    $this->player->nextPosition();
                    return 0;
                } else {
                    $this->player->resetPosition();
                    $this->statCounter->addShotsToCount($currentPosition);
                    return $currentPosition;
                }
                break;
            case "tie":
                if ($currentCardValue == $newCardValue) {
                    $this->player->nextPosition();
                    return 0;
                } else {
                    $this->player->resetPosition();
                    $this->statCounter->addShotsToCount($currentPosition);
                    return $currentPosition;
                }
                break;
        }
    }
}
