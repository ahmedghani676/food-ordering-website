<?php
require('stripe-php-master/init.php');

$PublishableKey="pk_test_51K2LnOIvqrtDbzhCwBTLDFRnGQ3c9TpcAMnSUjj6Ygf0VpUntuvmNw48yzifKvysJzPIjwbQwinm8OYRVQFEc4IV00VHfA8J7J";
$secretKey="sk_test_51K2LnOIvqrtDbzhCENh08GsaFSGkISdLq3UktriomWFsPNQ1ZmBzHpAgnQtJzmwYOVrdws0SF00EK8ZKSJ1Ex9Ch005U0YCnZ3";
\Stripe\Stripe::setApiKey($secretKey);
?>