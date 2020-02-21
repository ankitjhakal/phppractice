


<?php
// Program to display URL of current page.

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";

// Here append the common URL characters.
$link .= "://";

// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];
$url_arr=explode('/',$link);
// Print the link
print_r($url_arr);



/*
if(!empty($_SERVER['PATH_INFO']))
{
    // Uri info does not contain docroot or index
    $uri = $_SERVER['PATH_INFO'];
}
else
{
    if(!empty($_SERVER['REQUEST_URI']) && !empty($_SERVER['HTTP_HOST']))
    {
       $fullUrl = 'http://'
                  . ((isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : '')
                  . ((isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '');
       echo $fullUrl."<br>";
       $uri = parse_url($fullUrl, PHP_URL_PATH);
       echo $uri."<br>";
    }
    else if(!empty($_SERVER['PHP_SELF']))
    {
       $uri = $_SERVER['PHP_SELF'];
    }
}

$baseUri = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
echo $baseUri."<br>";
$uri = str_replace($baseUri, '', $uri);
echo $uri;
*/
?>
