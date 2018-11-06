<?php
/**
 * Created by PhpStorm.
 * User: qeruyua
 * Date: 2018/11/6
 * Time: 19:27
 */
function encrypt($sStr){
    $key = md5('records');
    $decrypted = openssl_encrypt($sStr,'AES-256-ECB',$key,OPENSSL_RAW_DATA);
    return base64_encode($decrypted);
}
function decrypt($sStr){
    $key = md5('records');
    $decrypted = openssl_decrypt(base64_decode($sStr), 'AES-256-ECB', $key,OPENSSL_RAW_DATA);
    return $decrypted;
}
 ?>

