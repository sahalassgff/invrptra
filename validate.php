<?php
$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'secret' => '6LdtXH4qAAAAAFv5nNM_asFuqZ6r3hu52AWC6rpa',
    'response' => $_POST['g-recaptcha-response']
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = json_decode(curl_exec(($ch)));
return $response->success;