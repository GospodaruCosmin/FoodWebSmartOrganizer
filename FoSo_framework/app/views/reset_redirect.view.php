<?php
// Wait for 5 seconds before redirecting
$delay = 5;

// URL to redirect to
$redirect_url = "http://localhost/Facultate/Proiect/FoSo_framework/public/login";

// Set the HTTP headers
header("Refresh: $delay; URL=$redirect_url");

// Display a message to the user
echo "<p>We've sent you an e-mail regarding your request!</p>";
echo "<p>You will be redirected to $redirect_url in $delay seconds. If you are not automatically redirected, please click <a href='$redirect_url'>here</a>.</p>";
?>