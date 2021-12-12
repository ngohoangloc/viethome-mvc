<?php

namespace App\Http;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response as BaseResponse;

class Response extends BaseResponse
{

    /**
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     */
    public function __construct(?string $content = '', int $status = 200, array $headers = [])
    {
        parent::__construct($content, $status, $headers);
    }

    /**
     * Tạo cookie trên trình duyệt 
     *
     * @param string $name
     * @param string $value
     * @param integer $expires
     * @param string $path
     * @param string $domain
     * @param bool $secure
     * @return \App\Http\Response
     */
    public function setCookie($name, $value, $expires = 0, $path = '/', $domain = null, $secure = null)
    {
        $cookie = new Cookie($name, $value, $expires, $path, $domain, $secure);

        $this->headers->setCookie($cookie);
        $this->send();

        return $this;
    }

    /**
     * Xoa cookie trên trình duyệt
     *
     * @param string $name
     * @return \App\Http\Response
     * 
     */
    public function deleteCookie($name)
    {
        $this->headers->setCookie(new Cookie($name, null, time() - 100000));
        $this->send();
        return $this;
    }
}
