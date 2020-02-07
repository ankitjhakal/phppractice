<!-- QUESTION: Make Rock, Paper, scissors using php in which one player is the user and second is computer -->
<!-- game strategy -->
<?php
    if(isset($_POST['User']))
    {
        $User = $_POST['User'];
        $Choosefrom= array('Rock', 'Paper', 'Scissors');
        $Choice= rand(0,2);
        $CPU=$Choosefrom[$Choice];
        if($User === $CPU)
        { echo "user choice:$User <strong> VS</strong> CPU choice:$CPU<br>";
          echo '<br>Result: Tie!';
        }
        else if($User === "Rock")
        {
          if($CPU === "Scissors")
           {  echo "user choice:$User <strong> VS</strong> CPU choice:$CPU<br>";
              echo '<br>Result: User wins';
           }
          else
           {  echo "user choice:$User <strong> VS</strong> CPU choice:$CPU<br>";
              echo '<br>Result: CPU wins';
           }
       }
       else if($User === "Paper")
       {
          if($CPU === "Rock")
           { echo "user choice:$User <strong> VS</strong> CPU choice:$CPU<br>";
             echo '<br>Result: User wins';
           }
          else
           { echo "user choice:$User <strong> VS</strong> CPU choice:$CPU<br>";
             echo '<br>Result: Computer wins';
           }
       }
      else if($User === "Scissors")
      {
         if($CPU === "Rock")
         {  echo "user choice:$User <strong> VS</strong> CPU choice:$CPU<br>";
            echo '<br>Result: CPU wins';
         }
         else
         {  echo "user choice:$User <strong> VS</strong> CPU choice:$CPU<br>";
            echo '<br>Result: User wins';
         }
      }
    echo "<br><br><strong>play again</strong>";
    include('rps.php');
    }

?>
