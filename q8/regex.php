<!-- Write a regular expression in PHP to extract all the words that are in Caps except your name from a string. -->
<?php
    $string = "HELLO how are You SIR I AM KUNAL, how Do YOU do?<br><br>";
    echo $string;
    $result = array();
    $word = explode(" ", $string);
    foreach($word as $key => $value)
    {
        if($value != "KUNAL" && preg_match('/^[A-Z]+$/', $value))
        {
           array_push($result, $value);
        }
    }
    echo "<b>SORTED VALUES :</b><br><br>";
    if (is_array($result))
    {
		foreach ($result as $key => $value)
		{
			echo $value . "<br>";
		}
	}
?>
