<?php
//引入key文件
include './libs/key.php';

//待加密的字符
$str = 'a';

//使用公钥加密
$status = openssl_public_encrypt(str_pad($str, 4, "\0", STR_PAD_LEFT), $encodeStr, $publicKey, OPENSSL_NO_PADDING);
//var_dump($status);

//$encodeStr 加密后的字符串 base64_encode后是  1fBvZg==   l1
//查base64表得原始的二进制是 0100000//todp
echo "密文base64后是：" . base64_encode($encodeStr) . "\r\n";
//var_dump(base64_encode($encodeStr));


$status = openssl_private_decrypt($encodeStr, $decryptedStr, $privateKey, OPENSSL_NO_PADDING);
echo '解密后明文是：' . $decryptedStr . "\r\n";


//echo "53 " . base_convert(53, 10, 2) . "\r\n";
//echo "31 " . base_convert(31, 10, 2) . "\r\n";
//echo "1 " . base_convert(1, 10, 2) . "\r\n";
//echo "47 " . base_convert(47, 10, 2) . "\r\n";
//echo "25 " . base_convert(25, 10, 2) . "\r\n";
//echo "32 " . base_convert(32, 10, 2) . "\r\n";

//echo ' ' . base_convert('11010101', 2, 10);
//echo ' ' . base_convert('11110000', 2, 10);
//echo ' ' . base_convert('01101111', 2, 10);
//echo ' ' . base_convert('01100110', 2, 10);
//echo ' ' . base_convert('00000000', 2, 10);
//echo ' ' . base_convert('00000000', 2, 10);

//由密文及其对应关系可得 密文即为 11010101 11110000 01101111 01100110 即10进制的 3589304166
//echo base_convert('11010101111100000110111101100110',2,10); //3589304166

//现在有了密文 我们笔算一下 明文对应的数字是 ???
//解密过程
//c^d ≡ m (mod n)    3589304166^1388291369 % 3901353457 == m(明文数字)
//得到 明文的数字是
echo gmp_pow(3589304166,3901353457);
//echo gmp_intval(gmp_div_qr(gmp_pow(3589304166,3901353457),3901353457));




