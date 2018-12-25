<?php

namespace App\Services\Gd;

class Rsa
{
    /**
     * 使用商户或者五维公钥加密数据
     * @param $data
     * @param bool $keyType true == self  false = 五维平台
     * @return mixed
     */
    public static function publicEncrypt($data, $keyType = true)
    {
        $publicKey = $keyType ? openssl_pkey_get_public(file_get_contents(config('hyweb.mer_rsa_public_key_dir'))) : openssl_pkey_get_public(self::formatPublicKey(config('hyweb.plat_rsa_public_key')));
        //padding选OPENSSL_NO_PADDING需要手动填充
        openssl_public_encrypt(str_pad($data, 128, "\0", STR_PAD_LEFT), $encodeData, $publicKey, OPENSSL_NO_PADDING);
        $encodeData = base64_encode($encodeData);
        return $encodeData;
    }

    /**
     * 使用商户或者五维公钥解密数据
     * @param $encrypted
     * @param bool $keyType $keyType true == self  false = 五维平台
     * @return mixed
     */
    public static function publicDecrypt($encrypted, $keyType = true)
    {
        $publicKey = $keyType ? openssl_pkey_get_public(file_get_contents(config('hyweb.mer_rsa_public_key_dir'))) : openssl_pkey_get_public(self::formatPublicKey(config('hyweb.plat_rsa_public_key')));
        openssl_public_decrypt(base64_decode($encrypted), $decodeData, $publicKey, OPENSSL_NO_PADDING);
        return $decodeData;
    }

    /**
     * 使用商户私钥加密数据
     * @param $data
     * @return string
     */
    public static function privateEncrypt($data)
    {
        $privateKey = openssl_pkey_get_private(file_get_contents(config('hyweb.mer_rsa_private_key_dir')));
        //padding选OPENSSL_NO_PADDING需要 去掉填充内容
        openssl_public_encrypt(str_pad($data, 128, "\0", STR_PAD_LEFT), $encodeData, $privateKey, OPENSSL_NO_PADDING);
        return base64_encode($encodeData);
    }

    /**
     * 使用商户私钥解密数据
     * @param $encrypted
     * @return string
     */
    public static function privateDecrypt($encrypted)
    {
        $privateKey = openssl_pkey_get_private(file_get_contents(config('hyweb.mer_rsa_private_key_dir')));
        openssl_private_decrypt($encrypted, $decodeData, $privateKey, OPENSSL_NO_PADDING);
        return ltrim($decodeData, "\0");
    }


    /**
     * RSA签名
     * @param string $data
     * @return mixed
     */
    public static function sign(string $data)
    {
        return openssl_sign($data, $sign, openssl_pkey_get_private(file_get_contents(config('hyweb.mer_rsa_private_key_dir'))), OPENSSL_ALGO_MD5) ? base64_encode($sign) : null;
    }

    /**
     * 验签
     * @param string $data
     * @param string $sign
     * @return bool
     */
    public static function verifySign(string $data, string $sign)
    {
        return (bool)openssl_verify($data, $sign, openssl_pkey_get_public(self::formatPublicKey(config('hyweb.plat_rsa_public_key'))), OPENSSL_ALGO_MD5);
    }

    private static function formatPublicKey($keyContent)
    {
        return "-----BEGIN PUBLIC KEY-----\n" . chunk_split($keyContent, 64, "\n") . "-----END PUBLIC KEY-----";
    }


}