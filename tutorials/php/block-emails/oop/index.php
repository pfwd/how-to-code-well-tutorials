<?php
require_once 'EmailProcessor.php';
require_once 'Validators/ValidatorInterface.php';
require_once 'Validators/AddressValidator.php';
require_once 'Validators/DomainValidator.php';

$badEmails = [
    'foo@bar.com'
];

$badDomains = [
    'test.com'
];

$domainChecker = new DomainValidator($badDomains);
$addressCheck = new AddressValidator($badEmails);

$emailProcessor = new EmailProcessor();
// Step 1 Configure

$emailProcessor->addValidator($domainChecker);
$emailProcessor->addValidator($addressCheck);

if(isset($_POST['email'])) {
// Step 2 Check post
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email) {

        // Step 3 Process
        $emailProcessor->process($email);
    } else {
        echo 'Please enter valid email address';
    }
}




?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="email" value=""/>
    <input type="submit" value="send" />
</form>