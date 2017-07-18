<?php
$location = 'http://www.peterfisher.me.uk';
$redirect = true;

if($redirect && !empty($location)){
    header('Location: '. $location);
    exit;
}

echo "We haven't redirected ";

