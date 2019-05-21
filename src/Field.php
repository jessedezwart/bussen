<?php
namespace Bussen;

class Field
{
    private $cards = [];

    public function __construct($cards)
    {
        $this->cards = $cards;
    }

    public function addCard($card, $position)
    {
        $this->cards[$position] = $card;
    }

    public function getCard($position)
    {
        return $this->cards[$position];
    }
}
