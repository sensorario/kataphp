<?php

require 'Game.php';
require 'Player.php';
require 'IChoice.php';
require 'Paper.php';

$game = new \PaperRockScissors\Game();
$game->addPlayer(new \PaperRockScissors\Player(new \PaperRockScissors\Paper()));
$game->addPlayer(new \PaperRockScissors\Player(new \PaperRockScissors\Paper()));

echo (string)(bool)$game->isGameTied();
