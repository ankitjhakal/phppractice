<?php
$student=array(array("id"=>"1","name"=>"a","dob"=>"1580812642","grade"=>"12","marks"=>array("h"=>"12","e"=>"22","s"=>"24")),
               array("id"=>"2","name"=>"b","dob"=>"1580812642","grade"=>"11","marks"=>array("h"=>"18","e"=>"17","s"=>"24")),
             array("id"=>"3","name"=>"c","dob"=>"1580812642","grade"=>"12","marks"=>array("h"=>"12","e"=>"22","s"=>"24")),
           array("id"=>"4","name"=>"d","dob"=>"1580812642","grade"=>"10","marks"=>array("h"=>"0","e"=>"18","s"=>"24")));
$subject=array( "12"=>array(array("name" => "hindi","code" =>"h","mm" => "20"),
                            array("name" => "english","code" =>"e","mm" => "20"),
                            array("name" => "science","code" =>"s","mm" => "20")),
                "11"=>array(array("name" => "hindi","code" =>"h","mm" => "20"),
                            array("name" => "english","code" =>"e","mm" => "20"),
                            array("name" => "science","code" =>"s","mm" => "20")),
                "10"=>array(array("name" => "hindi","code" =>"h","mm" => "20"),
                            array("name" => "english","code" =>"e","mm" => "20"),
                            array("name" => "science","code" =>"s","mm" => "20")));

//A student is considered pass only if he clears 40% of his subjects.

foreach ($student as $key=>$value)
{
  $gra=$value['grade'];
  $arr=$value['marks'];
  $count=0;
  foreach ($arr as $key1=>$val)
  {
    for($x=0;$x<3;$x++)
    {
      // if subject code match then add a new attribute in student array with mm(minimum marks) column
    if($subject[$gra][$x]['code']==$key1)
    { $student[$key]['mm'][$key1]=$subject[$gra][$x]['mm'];
    //increment count for getting result which is more then 40 %
      if($subject[$gra][$x]['mm']<=$arr[$key1])
      {
        $count=$count+1;
      }
    }
    }
  }
  //if count more then 2 means its more then 40%
  if($count>=2)
  {
    $student[$key]['res']="pass";
  }

  else
  {
    $student[$key]['res']="fail";
  }
}
//table for final result
echo "<strong>FINAL RESULT</strong><br><table width=100% border=1 text-align=center><tr><th>name</th><th>dob</th><th>grade</th><th>subjects</th><th>result</th></tr>";
foreach ($student as $key=>$value)
{
  $arr=$value['marks'];
  $student[$key]['dob']=date('m/d/Y', $student[$key]['dob']);
  echo "<tr><td>".$student[$key]['name']."</td><td>".$student[$key]['dob']."</td><td>".$student[$key]['grade']."</td><td>";
  foreach ($arr as $key1=>$val)
  {
  echo $key1."(".$student[$key]['marks'][$key1].",".$student[$key]['mm'][$key1].")"."<br>";
  }
 echo "</td><td>".$student[$key]['res']."</td></tr>";
}
echo "</table><br>";

//We have a function that takes grade as input and returns subject, subject code and minimum required marks to pass the subject.
// first input grade of a student(int) then in second parameter is that array means subject(array).
//it returns array datail about minmarks to be obtained,subject code, and subject name.
function subdata (int $a,$array) {
    return $array[$a];
}
echo "<strong>ANSWER 2</strong><br>";
$show=subdata(12,$subject);
echo "<br><table width=100% border=1><tr><th>subjectname</th><th>subject code</th><th>mm</th></tr>";
foreach ($show as $key=>$value)
{
echo "<tr><td>".$value['name']."</td><td>".$value['code']."</td><td>".$value['mm']."</td></tr>";
}
echo "</table><br>";

//We have another function that takes student id and returns the subject code and their obtained marks.
//first input is about student id(int) then that array means student(array) and if id match return marks detail array 
function studata (int $a,$array) {
  foreach ($array as $key=>$value)
  {
    if($array[$key]['id']==$a)
    {
    return $array[$key]["marks"];
    }
  }
}
echo "<br><br><br><strong>ANSWER 3</strong><br>";
print_r(studata(2,$student));



 ?>
