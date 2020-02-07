<!-- QUESTION: Make Rock, Paper, scissors using php in which one player is the user and second is computer -->
<!-- user's choice in game -->
<?php
      echo '<form action="game.php" method="post" />
            <input type="radio" name="User" value="Rock" title="Rock" />Rock <br /><br />
            <input type="radio" name="User" value="Paper" title="Paper" />Paper <br /><br />
            <input type="radio" name="User" value="Scissors" title="Scissors" />Scissors <br /><br />
            <input type="submit" name="form_submit" value="submit"/>
            </form> ';
?>
