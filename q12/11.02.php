<!-- There is a multidimensional array containing the following fields -
product id, selling date, price and category
For the same product id, there can be different selling prices.
For the same category, there can be different products
 -->
<?php
$inputarray = array(
  array('pd' => 'pd1', 'sp' => '5', 'sd' => '4thFeb', 'ct' => 'C1'),
  array('pd' => 'pd1', 'sp' => '15', 'sd' => '5thFeb', 'ct' => 'C1'),
  array('pd' => 'pd2', 'sp' => '50', 'sd' => '4thFeb', 'ct' => 'C1'),
  array('pd' => 'pd3', 'sp' => '40', 'sd' => '6thFeb', 'ct' => 'C2'),
  array('pd' => 'pd2', 'sp' => '75', 'sd' => '3rdFeb', 'ct' => 'C1'),
  array('pd' => 'pd2', 'sp' => '65', 'sd' => '7thFeb', 'ct' => 'C1'),
  array('pd' => 'pd4', 'sp' => '190', 'sd' => '8thFeb', 'ct' => 'C2'),
  );

print_r($inputarray);
//coversion of string into timestamp.
foreach ($inputarray as $key => $value) {
  $inputarray[$key]['sd']=strtotime($value['sd']);
}
//sort array first by catagory ,second product id then date
$columns_1 = array_column($inputarray, 'pd');
$columns_2 = array_column($inputarray, 'sd');
$columns_3 = array_column($inputarray, 'ct');
array_multisort($columns_3, SORT_ASC,$columns_1, SORT_ASC, $columns_2, SORT_ASC, $inputarray);
echo "====><strong>table</strong><br>";
echo "<br><table width=100% border=1><tr><th>pd</th><th>tsp</th><th>sd</th><th>ct</th></tr>";
foreach ($inputarray as $key => $value) {
  echo "<tr><td>".$inputarray[$key]['pd']."</td><td>".$inputarray[$key]['sp']."</td><td>". date("Y-m-d",$inputarray[$key]['sd'])."</td><td>".$inputarray[$key]['ct']."</td></tr>";
  }
echo "</table><br>";
//add the sd of two consecutive row
$previd=null;
foreach ($inputarray as $key => $value) {
   if($inputarray[$key]['pd'] == $previd) {
     $inputarray[$key]['sp']=$x+$inputarray[$key]['sp'];
     $x= $inputarray[$key]['sp'];
     $previd=$value['pd'];
   }
   else {
     $previd=$value['pd'];
     $x=$value['sp'];
  }
     $inputarray[$key]['ct']=$inputarray[$key]['ct']."-".$inputarray[$key]['pd'];
 }

echo "====><strong>table</strong><br>";
  echo "<br><table width=100% border=1><tr><th>pd</th><th>tsp</th><th>sd</th><th>ct</th></tr>";
  foreach ($inputarray as $key => $value) {
  echo "<tr><td>".$inputarray[$key]['pd']."</td><td>".$inputarray[$key]['sp']."</td><td>". date("d-m-y",$inputarray[$key]['sd'])."</td><td>".$inputarray[$key]['ct']."</td></tr>";
  }
  echo "</table><br>";
?>
