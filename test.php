<?php
$hashed_password = '$2y$10$2gPH76XIJrxZmLbfSXGWs.pM6hTC0z8ZJ62d3NV7kV2KLaKhEWN9a';
$plain_password = 'careerlink';

if (password_verify($plain_password, $hashed_password)) {
    echo "The password matches.";
} else {
    echo "The password does not match.";
}
?>
