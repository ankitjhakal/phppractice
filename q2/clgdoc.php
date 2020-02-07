<?php
// defining a array for college
$arr=array(
	1 => 'skit'
	2 => 'poornima',
);

// defining a class for data object
class data
{
	public $doc_name;
	public $doc_type;
	public $doc_college;
	public $sent;
	public $sent_status;
}

// creation of array of object
$doc=array();
$doc[0] = new data();
$doc[1] = new data();
$doc[0]->doc_name = 'abc.txt';
$doc[0]->doc_type = 'A';
$doc[0]->doc_college = 1;
$doc[0]->sent = 1;
$doc[1]->doc_name = 'xyz.txt';
$doc[1]->doc_type = 'B';
$doc[1]->doc_college = 1;
$doc[1]->sent = 0;

/* 
*function to display document of clg
*@parameter : first input: array $x(contains details about clg ),second input: array $y(contains details about documents)
*@return :nothing.
*/
function display_doc($x, $y) {
	// Condition to check sent_status
	for ($i=0; $i < count($y); $i++) {
		if ($y[$i]->sent == 1) {
			$y[$i]->sent_status="Success";
		}
		else {
			$y[$i]->sent_status="Fail";
		}
	}

	// Displaying data on the basis of doc_college for every college
	for ($i=0; $i < count($x); $i++) {
		echo "<br>";
		echo "\$coll[college_id]->college_name='". $x[$i+1] ."';";
		echo "<br>";
		echo "\$coll[college_id]->college_id='". ($i+1) ."';";
		foreach ($y as $key => $value) {
			if ($y[$key]->doc_college == ($i+1)) {
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_name ='". $y[$key]->doc_name ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_type ='". $y[$key]->doc_type ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->sent_status ='". $y[$key]->sent_status ."';";
			}
			// if doc_college is null then it will displayed for every college
			elseif ($y[$key]->doc_college == null) {
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_name ='". $y[$key]->doc_name ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_type ='". $y[$key]->doc_type ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->sent_status ='". $y[$key]->sent_status ."';";
			}
		}

	}
}

display_doc($arr, $doc);
?>
