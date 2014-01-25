Implementation
--------------

This implementation of PaperRockScissors aims to put responsibility to Choices. Object that implement Choice interface can be defined object as defined in "Clean Code". Clean Code define Objects as elements that "expose behavior and hide data". The behavior of Paper is that wins versus Rock, Rock wins versus Scissors and Scissors wins versus Paper. "This make it easy to add new kinds of objects without changing existing behaviors." This means that if I'll try to implement Paper Rock Scissors evoution (Rock, Paper, Scissors, Lizard, Spock) I need to reimplement behavior in each implementation of Choice.
