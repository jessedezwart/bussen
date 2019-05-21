<?php
namespace Bussen;

class Card
{
    private $value = 0;
    private $suit = "";

    public function getValue()
    {
        return $this->value;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setSuit($suit)
    {
        $this->suit = $suit;
    }
}
