<?php
require_once("Deck.php");
require_once("Field.php");
require_once("Game.php");
require_once("Player.php");

$time_start = microtime(true); 

$potjes = 0;
$beurten = 0;
$slokken = 0;
$highestTurns = 0;
$highestShots = 0;
while($potjes < 140) {
    $deck = new Deck();
    $startingCards = $deck->takeCards(7);
    $field = new Field($startingCards);
    $game = new Game();
    $player = new Player();

    while(true) {
        $input = $game->calculateChance($field, $deck);
        //$field->displayField();
        //$input = $player->waitForInput();
        $game->checkChoice($input, $field, $deck);
        if ($game->checkNewDeck($deck)) {
            $deck = new Deck();
        }
        if ($game->checkGameOver($field)) {
            break;
        }
        
    }
    $beurten += $game->getTurns();
    if ($game->getTurns() > $highestTurns) {
        $highestTurns = $game->getTurns();
    }
    $slokken += $game->getShots();
    if ($game->getShots() > $highestShots) {
        $highestShots = $game->getShots();
    }

    $potjes += 1;
    // echo "Aantal beurten: " . $game->turns . "\n";
    // echo "Aantal slokken: " . $game->shots . "\n";
}
$avgBeurten = $beurten / $potjes;
$avgSlokken = $slokken / $potjes;
$time_end = microtime(true);

$execution_time = ($time_end - $time_start);
echo 'Uitvoertijd: ' . $execution_time . PHP_EOL;
echo 'Potjes per seconde: ' . 100000 / $execution_time . PHP_EOL . PHP_EOL;
echo 'Hoogste beurten: ' . $highestTurns. PHP_EOL;
echo 'Hoogste slokken: ' . $highestShots. PHP_EOL;
echo 'Gemiddelde beurten: ' . $avgBeurten. PHP_EOL;
echo 'Gemiddelde slokken: ' .$avgSlokken;