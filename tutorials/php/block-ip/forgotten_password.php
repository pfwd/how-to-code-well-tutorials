<?php
session_start();

$threshold = 5;

/**
 * @param $value
 * @param int $threshold
 * @return bool
 */
function isOverThreshold($value, $threshold = 7){
    return ($value < $threshold) ? false : true;
}

function resetCounter(){
    $_SESSION['forgotten_password']['counter'] = 1;
}

if(isset($_SESSION['forgotten_password'])){
    if(isset($_SESSION['forgotten_password']['counter'])) {
        $counter = $_SESSION['forgotten_password']['counter'];
        $_SESSION['forgotten_password']['counter']++;
    }
} else{
    $_SESSION = [
        'forgotten_password' => [
            'counter' => 1
        ]
    ];
}

//resetCounter();
$counter = $_SESSION['forgotten_password']['counter'];
if(isOverThreshold($counter, $threshold)){
    $_SESSION['message'] = 'You are over the threshold try again later';
    header('Location: /login.php');
    die;
}

?>
<h1>Forgotten Password</h1>

<label>Email address</label><br/>
<input type="text" name="email_address"><br/>
<input type="submit" value="Send link"><br/>
<br/>