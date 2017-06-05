<?php

class Security {
    public static function encrypt($input, $key) {
        $input = base64_encode($input);
        $key = substr(openssl_digest(openssl_digest($key, 'sha1', true), 'sha1', true), 0, 16);
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        $size = mcrypt_enc_get_block_size($td);
        $input = Security::pkcs5_pad($input, $size);
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $data = mcrypt_generic($td, $input);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $data = base64_encode($data);
        return $data;
    }

    private static function pkcs5_pad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    public static function decrypt($sStr, $sKey) {
        $sKey = substr(openssl_digest(openssl_digest($sKey, 'sha1', true), 'sha1', true), 0, 16);
        $decrypted= mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            $sKey,
            base64_decode($sStr),
            MCRYPT_MODE_ECB
        );

        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s - 1]);
        $decrypted = substr($decrypted, 0, -$padding);
        $decrypted = base64_decode($decrypted);

        return $decrypted;
    }
}

 $key = "12345678";
 $data = '{"orderNo":"1234"}';

 $value = Security::encrypt($data, $key);
 echo "加密：：" . $value . '<br/>';
 echo Security::decrypt($value, $key);