<?php

if (!function_exists('config'))
{
    /**
     * Đọc giá trị trong App/config/*
     * 
     * @param string $key
     * @return array|string|mixed
     */
    function config($key)
    {
        /**
         * @var array|mixed
         */
        $config = $GLOBALS['config'];

        return $config->get($key);
    }
}

if (!function_exists('redirect')) 
{
    function redirect($location)
    {
        if (ob_get_level()) {
            ob_end_clean();
        }

        header('Location: '. $location);
        exit;
    }
}

if (!function_exists('session')) {
    /**
     * @return \App\Http\Session\Session
     */
    function session() {
        $session = $GLOBALS['session'];
        return $session;
    }
}

if (!function_exists('cookie')) {

    /**
     * @return \Symfony\Component\HttpFoundation\InputBag
     */
    function cookie() {
        $cookies = request()->cookies;
        return $cookies;
    }
}

if (!function_exists('request')) {
    /**
     * @return \App\Http\Request
     */
    function request() {

        /**
         * @var \App\Http\Request
         */
        $request = $GLOBALS['request'];

        return $request;
    }
}


if (!function_exists('check_login')) {
    function check_login() {
        
        if (session()->has('user') || request()->cookie('credentials')){
            return true;
        }
        return false;
    }
}

if (!function_exists('encrypt')) {
    function encrypt($pure_string, $encryption_key) {
        $ciphering = "AES-128-CTR";

        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $encryption_iv = '1234567891011121';

        $encryption = openssl_encrypt(
            $pure_string,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );
        return $encryption;
    }
}

if (!function_exists('decrypt')) {
    function decrypt($encrypted_string, $encryption_key)
    {
        $ciphering = "AES-128-CTR";

        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $decryption_iv = '1234567891011121';

        $decryption = openssl_decrypt(
            $encrypted_string,
            $ciphering,
            $encryption_key,
            $options,
            $decryption_iv
        );

        return $decryption;
    }
}

if (!function_exists('password_encrypt')) {
    function password_encrypt($password) {
        $options = [
            'cost'  =>  12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}

if (!function_exists('password_check')) {
    function password_check($password, $password_hash) {
        return password_verify($password, $password_hash);
    }
}

if (!function_exists('auth')) {
    function auth() {
        if (session()->has('user')){
            $userSerialized = session()->get('user');

            return unserialize($userSerialized);
        }
        else if(request()->cookie('credentials')){

            session()->set('user', decrypt(request()->cookie('credentials'), ENCRYPTION_KEY));

            return unserialize(decrypt(request()->cookie('credentials'), ENCRYPTION_KEY));
        }else{
            return null;
        }
        
    }
}

class FLASH
{
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const INFO =  'info';
    public const ERROR = 'error';
}