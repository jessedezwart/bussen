<?php

class Player {

    function waitForInput() {
        $input = readline("What ya gonna do? ");
        for ($i=0; $i<80; $i++) {
            echo "\n";
        }

        switch ($input) {
            case "hoger":
                return "hoger";
            case "lager":
                return "lager";
            case "paal";
                return "paal";
            default:
                waitForInput();
        }
    }
    
}