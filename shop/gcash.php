<?php
$gcash_account_number = '1234567890'; // Replace with your GCash account number
$amount = 100; // The transaction amount
$transaction_id = uniqid(); // Generate a unique transaction ID

// Generate the GCash deep link
$gcash_deep_link = "gcash://open-inapp?amount={$amount}&target={$gcash_account_number}&ref={$transaction_id}";

// Redirect the user to the GCash deep link
header("Location: $gcash_deep_link");
?>