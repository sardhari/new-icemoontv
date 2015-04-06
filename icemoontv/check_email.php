<?php

if (isset($_POST['email'])) {
    $url = "https://qa.icemoon.tv/aui/spring/registration/isEmailAvailable.action?email=" . $_POST['email'];
    $post = array();
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $result = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($result, true);

    echo (($response=='1')?1:0);
}
?>