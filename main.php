<?php
require_once("Deck.php");
require_once("Field.php");
require_once("Game.php");
require_once("Player.php");

$deck = new Deck();
$startingCards = $deck->takeCards(7);
$field = new Field($startingCards);
$game = new Game();
$player = new Player();

while(true) {
    $game->calculateChance($field, $deck);
    $field->displayField();
    $input = $player->waitForInput();
    $game->checkChoice($input, $field, $deck);
    $game->checkGameOver($field);
    $game->checkNewDeck($deck);

    echo "Aantal beurten: " . $game->turns . "\n";
    echo "Aantal slokken: " . $game->shots . "\n";
}