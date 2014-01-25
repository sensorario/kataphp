Implementation
--------------

This implementation aims to move behavior in DataStructure\WinRules (I am not sure this is a datas tructure :-/). The fact is that I had forced implementation of objects instead of a muddled design. Also, I forced objects readability:

    I want create a game with two player
    The Game is won by player ...
    The Game is lost by player ...

    PaperRockScissors\SecondTry\Game::createWithPlayers(Player $playerOne, Player $playerTwo);
    PaperRockScissors\SecondTry\Game::isWonBy(Player $playerOne);
    PaperRockScissors\SecondTry\Game::isLostBy(Player $playerTwo);

or

    A Player can select ...
    A Player has selected
    A Player wins versus another Player?

    PaperRockScissors\SecondTry\DataStructure\WinRules\Player::select($selection);
    PaperRockScissors\SecondTry\DataStructure\WinRules\Player::hasSelected();
    PaperRockScissors\SecondTry\DataStructure\WinRules\Player::winVersus(Player $playerTwo);
