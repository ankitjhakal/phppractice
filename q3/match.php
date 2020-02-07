<!-- TOURNAMENT related questions highest scorer .... -->
<?php
error_reporting( E_WARNING );
$matches=array('1'=>array('csk'=>array('a'=>'10','b'=>'2','c'=>'12','d'=>'13','e'=>'0'),'rcb'=>array('f'=>'1','g'=>'2','h'=>'2','i'=>'3','j'=>'10')),
               '2'=> array('csk' => array('a' =>'10' ,'b'=>'2','c'=>'2','d'=>'3','e'=>'10'),'mi' => array('k'=>'11','l'=>'12','m'=>'12','n'=>'13','o'=>'10')),
               '3'=> array('csk' => array('a' =>'10' ,'b'=>'21','c'=>'22','d'=>'23','e'=>'20'),'srh' => array('p'=>'11','q'=>'2','r'=>'2','s'=>'3','t'=>'10')),
               '4'=> array('mi' => array('k' =>'10' ,'l'=>'2','m'=>'12','n'=>'13','o'=>'0'),'rcb' => array('f'=>'12','g'=>'23','h'=>'12','i'=>'13','j'=>'0')),
               '5'=> array('mi' => array('k' =>'1' ,'l'=>'2','m'=>'3','n'=>'4','o'=>'5'),'srh' => array('p'=>'1','q'=>'2','r'=>'22','s'=>'13','t'=>'12')),
               '6'=> array('srh' => array('p' =>'0' ,'q'=>'2','r'=>'12','s'=>'3','t'=>'0'),'rcb' => array('f'=>'1','g'=>'2','h'=>'2','i'=>'3','j'=>'17')),
             );
//highest score soultion
// total of scores scored by each player
$player=array();
foreach ($matches as $key1=>$value1)
{
  foreach ($value1 as $key2=>$value2)
    {
      foreach ($value2 as $key3=>$value3)
      {
        $player[$key3]=$player[$key3]+$matches[$key1][$key2][$key3];
      }
    }
}

echo "<strong>QUESTION 1 => HIGHEST SCORER</strong><br>";
print_r($player);
echo "<br><br><strong>ANSWER 1:</strong>";
$max=max($player);

foreach ($player as $key => $value) {
 if($value==$max)
 {
   echo "<strong>  highest scorer :</strong>".$key."<br><br>";
 }
}

// tournament winner code
//given one point which team socre more
echo "<br><br><strong>QUESTION 2 => TOURNAMENT RESULT</strong><br>";
$arr=array();
foreach ($matches as $key=>$value1)
{   echo "<strong>match</strong>".$key."<br>";
    $prev=0;
    foreach ($value1 as $key1=>$val)
    {
      $total=array_sum($val);
      if($prev==0)
      { $prevkey=$key1;
        $prev=$total;
      }
      echo $key1."total :".$total."<br>";
    }
    if($prev>$total)
   {
    $arr[$prevkey]=$arr[$prevkey]+1;
   }
   else
   {
     $arr[$key1]=$arr[$key1]+1;
   }
 }
echo "<br><br><strong>team points</strong><br>";
print_r($arr);
echo "<br>";
$max=max($arr);
$count=0;
echo "<br><strong>ANSWER 2</strong><br>";
//if two team score equal points then tournament tied else top team will win the tournament
foreach ($arr as $key => $value) {
 if($value==$max)
 { $count=$count+1;
   echo "top team :".$key."<br>";
 }
}
if($count>1)
{
  echo "<strong>tournament tied </strong>";
}
else {
  echo "<strong>TOURNAMENT WINNER</strong>";
}

// max in a match
$maxtotal=0;
echo "<br><br><strong>QUESTION 3 => MAX SCORE IN A MATCH</strong>";
foreach ($matches as $key=>$value1)
{
   $sum=0;
// sum of scores scored by players in a team
    foreach ($value1 as $val)
    {
      $sum=$sum+ array_sum($val);
    }
    echo "<br>".$sum;
    if($maxtotal<$sum)
    {
      $maxtotal=$sum;
    }
}
echo "<br><br><strong>ANSWER 3 :</strong><strong>max score</strong>".$maxtotal."<br><br>";

?>
