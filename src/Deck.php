<?php
namespace Bussen;
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Deck
{
    private $cards = [];
    
    public function __construct()
    {
        for ($i = 1; $i<53; $i++) {
            $card = new Card;
            if ($i<14) {
                $card->setSuit("Hearts");
            }
            if ($i>13 && $i<27) {
                $card->setSuit("Spades");
            }
            if ($i>26 && $i<39) {
                $card->setSuit("Diamonds");
            }
            if ($i>38) {
                $card->setSuit("Clubs");
            }
            $this->cards[$i] = $card;
        }
        
        for ($c = 0; $c < 4; $c++) {
            for ($i = 1; $i < 14; $i++) {
                $currentCard = $this->cards[key($this->cards)];
                $currentCard->setValue($i);
                next($this->cards);
            }
        }

        shuffle($this->cards);
    }

    public function takeCard()
    {
        $card = end($this->cards);
        array_pop($this->cards);
        
        return $card;
    }

    public function countCardsInDeck()
    {
        return count($this->cards);
    }
}
