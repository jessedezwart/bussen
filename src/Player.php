<?php
namespace Bussen;

class Player
{
    private $position = 0;
    
    public function getPosition()
    {
        return $this->position;
    }

    public function nextPosition()
    {
        $this->position += 1;
    }

    public function resetPosition()
    {
        $this->position = 0;
    }
}
