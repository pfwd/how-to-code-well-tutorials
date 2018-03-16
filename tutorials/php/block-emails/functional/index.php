<?php
/**
 * Created by PhpStorm.
 * User: peterfisher
 * Date: 15/03/2018
 * Time: 14:25
 */
$badEmails = [
    'foo@bar.com'
];

$badDomains = [
  'test.com'
];

$isBadDomain = true;
$isBadAddress = true;

$emailTo = '';
$emailSubject = '';
$emailMessage = '';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if($email){
    $isBadDomain = isBadDomain($email, $badDomains);
    $isBadAddress = isBadAddress($email, $badEmails);

    if(false === $isBadAddress && false === $isBadDomain){
        mail($emailTo, $emailSubject, $emailMessage);
        echo 'Sending email';
    }else{
        echo 'Cannot send email';
    }

}


function isBadDomain($email , $badDomains){
    $isBad = true;
    $parts = preg_split('/@/', $email);
    if($parts[1]){
        if(false === in_array($parts[1], $badDomains)){
            $isBad = false;
        }
    }
    return $isBad;
}

function  isBadAddress($email, $badEmails){
    $isBad = true;
    if (false === in_array($email, $badEmails)) {
        $isBad = false;
    }
    return $isBad;
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="email" value=""/>
    <input type="submit" value="send" />
</form>