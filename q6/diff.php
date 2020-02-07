<?php
//2. Write a PHP function to compares two multidimensional arrays and final_arrayurns the difference.
//navbar for all projects

//hard coded array data for comparison
$array1 = array(
    'a1' => array(
    	'a_fname' => 'ankit',
    	'a_lname' => 'jhakal'),
    'b1' => array(
    	'b_fname' => 'Hello',
    	'b_lname' => 'World'),
    'c1' => array(
    	'c_fname' => 'Hey',
    	'c_lname' => 'John'));
$array2 = array(
    'b1' => array(
    	'b_fname' => 'Hello'),
    'c1' => array(
    	'c_lname' => 'John'),
	  'd1' => array(
		  'd_fname' => 'Suresh'));
// array comparison of array one from array two
foreach($array1 as $key => $arr)
{
    //if same key is in another array then will check further otherwise directly store as diff
    if(isset($array2[$key]))
    {   //array_diff(to, from)
        $final_array[] = array_diff($arr, $array2[$key]);
    }
    else
    {
        //exists in one array add it to final_arrayurn array
        $final_array[] = $arr;
    }
}
//same loop for array two from array one
foreach($array2 as $key => $arr)
{
    if(isset($array1[$key]))
    {
        if(!isset($final_array[$key])) $final_array[$key] = array_diff($arr, $array1[$key]);
    }
    else
    {
        //exists in one array add it to final_arrayurn array
        $final_array[] = $arr;
    }
}
echo '<br>';
echo "Array 1";
echo '<br>';//table for display array 1
echo '<table border = "1px">';
echo '<th> Key </th><th> Type </th><th> Value </th>';
// final array print in table
foreach($array1 as $key => $value)
{   //check if val is an array of final o/p
    if(is_array($value))
    {
        foreach($value as $val => $u)
        {
            echo '<tr><td>';
            echo $key . " </td><td>" . $val . "</td><td>" . $u . "<br></td></tr>";
        }
    }
}
echo '</table>';
echo '<br>';//table for display array 2
echo "Array 2";
echo '<br>';echo '<table border = "1px">';
echo '<th> Key </th><th> Type </th><th> Value </th>';
// final array print in table
foreach($array2 as $key => $value)
{   //check if val is an array of final o/p
    if(is_array($value))
    {
        foreach($value as $val => $u)
        {
            echo '<tr><td>';
            echo $key . " </td><td>" . $val . "</td><td>" . $u . "<br></td></tr>";
        }
    }
}
echo '</table>';echo '<br>';//get output in table
echo "Output";
echo '<br>';echo '<table border = "1px">';
echo '<th> Key </th><th> Type </th><th> Value </th>';
// final array print in table
foreach($final_array as $key => $value)
{   //check if val is an array of final o/p
    if(is_array($value))
    {
        foreach($value as $val => $u)
        {
            echo '<tr><td>';
            echo $key . " </td><td>" . $val . "</td><td>" . $u . "<br></td></tr>";
        }
    }
}
echo '</table>';
?>
