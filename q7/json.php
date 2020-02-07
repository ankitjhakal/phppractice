<?php
$url = "https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/services";
// get all content of link
$contents = file_get_contents($url);
//now decode it from json content
$json=json_decode($contents);
for ($i=0;$i<7;$i++)
{
	echo "<h1>" . $json->data[$i]->attributes->title . "</h1>";
	print_r($json->data[$i]->attributes->body->processed);
	print_r($json->data[$i]->attributes->field_services->processed);
	$img = $json->data[$i]->relationships->field_image->links->related->href;
	$imgapi = file_get_contents($img);
	$imgjson = json_decode($imgapi);
	$url = $imgjson->data->attributes->uri->url;
	if (isset($url))
	{
		echo '<img src="https://ir-revamp-dev.innoraft-sites.com'.$url.'"height = "300px" width = "300px"><br>';
	}
}
?>
