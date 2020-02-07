<!-- make a chessboard design-->
<?php
echo "<table width=100% border=1>";
for($r=1;$r<=8;$r++)
{
  echo "<tr>";
  for($c=1;$c<=8;$c++)
  {
    $sum=$r+$c;
    //if sum is even color it white else black.
    if($sum%2==0)
    {
      echo "<td height=70px width=30px bgcolor=#FFFFFF></td>";
    }
    else
    {
       echo "<td height=70px width=30px bgcolor=#000000></td>";
    }
  }
  echo "</tr>";

}
echo "</table>";
 ?>
