<!--     There are 10 seats and 7 boys and 3 girls. Now arrange the students in an array in such a manner that no 2 girls sit together. The input array will be like this:

  $array = array(0-> array(‘name’ => <student_name>, ‘gender’ => ‘M/F’)...........);
Output array: $output = array(‘name1’, ‘name2’......); -->
<?php
$students = array
  (
  array("name"=>"1","gender"=>"m"),
  array("name"=>"2","gender"=>"f"),
  array("name"=>"3","gender"=>"f"),
  array("name"=>"4","gender"=>"f"),
  array("name"=>"5","gender"=>"m"),
  array("name"=>"6","gender"=>"m"),
  array("name"=>"7","gender"=>"m"),
  array("name"=>"8","gender"=>"m"),
  array("name"=>"9","gender"=>"m"),
  array("name"=>"10","gender"=>"m")
);
$arrlength = count($students);
$f=array();
$m=array();
// divide in groups according to gander
for($x = 0; $x < $arrlength; $x++)
{
  if($students[$x]['gender']=="m")
  {
    array_push($m,$students[$x]['name']);
  }
  else {
    array_push($f,$students[$x]['name']);
  }
}
$flen = count($f);
$mlen = count($m);
if($flen>$mlen)
{
  $min=$mlen;
}
else {
  $min=$flen;
}
$output=array();
// loop till less member array
for($x = 0; $x < $min; $x++)
{
  array_push($output,$f[$x]);
  array_push($output,$m[$x]);
  array_shift($m);
}
// merge output array with remaining member array
print_r(array_merge($output,$m));


?>
