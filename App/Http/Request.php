<?php


namespace App\Http;

use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Request as BaseRequest;

class Request extends BaseRequest
{

    /**
     * Lấy các tham số submit bởi POST or GET
     * Nếu $key bằng null sẽ trả về tất cả các tham số submit bởi POST and GET
     *
     * @return string
     */
    public function all($key = null, $default = null)
    {
        if ($key) {
            return $this->get($key, $default) ?? $this->post($key, $default);
        }

        $result =  array_merge($this->query->all(), $this->request->all());
        $key = ltrim($this->getPathInfo(), "/");
        unset($result[$key]);
        return $result;
    }

    /**
     * Lấy tham số $key submit bởi POST method
     * 
     * @param string|int|float|bool|null $default The default value if the input key does not exist
     *
     * @return string|int|float|bool|null
     */
    public function post($key, $default = null)
    {
        return $this->request->get($key, $default);
    }

    /**
     * Lấy tham số $key submit bởi GET method
     * Returns a scalar input value by name.
     *
     * @param string|int|float|bool|null $default The default value if the input key does not exist
     *
     * @return string|int|float|bool|null
     */
    public function get($key, $default = null)
    {
        return $this->query->get($key, $default);
    }

    /**
     * Trả về cookie
     *
     * @param string $key
     * @param mixed $default
     * @return string|int|float|bool|null
     */
    public function cookie($key, $default = null)
    {
        return $this->cookies->get($key, $default);
    }

    /**
     * Lấy tất cả cookies
     *
     * @return string|int|float|bool|null
     */
    public function cookies()
    {
        return $this->cookies->all();
    }

    /**
     * Kiểm tra nếu ajax request.
     *
     * @return bool
     */
    public function ajax()
    {
        return $this->isXmlHttpRequest();
    }

    /**
     * Kiểm tra nếu là pjax request.
     *
     * @return bool
     */
    public function pjax()
    {
        return $this->headers->get('X-PJAX') == true;
    }

    /**
     * Get the URL (no query string) for the request.
     *
     * @return string
     */
    public function url()
    {
        return rtrim(preg_replace('/\?.*/', '', $this->getUri()), '/');
    }

    /**
     * Get the full URL for the request.
     *
     * @return string
     */
    public function fullUrl()
    {
        $query = Arr::query($this->getQuery()); //$this->getQueryString();

        $question = $this->getBaseUrl() . $this->getPathInfo() === '/' ? '/?' : '?';

        return $query ? $this->url() . $question . $query : $this->url();
    }

    /**
     * Get the full URL for the request with the added query string parameters.
     *
     * @param  array  $query
     * @return string
     */
    public function fullUrlWithQueryString(array $query)
    {
        $question = $this->getBaseUrl() . $this->getPathInfo() === '/' ? '/?' : '?';
        return count($this->getQuery()) > 0
            ? $this->url() . $question . Arr::query(array_merge($this->getQuery(), $query))
            : $this->url() . $question . Arr::query($query);
    }

    /**
     * Retrieve a query string item from the request.
     *
     * @param  string|null  $key
     * @param  string|array|null  $default
     * @return string|array|null
     */
    public function getQuery($key = null, $default = null)
    {
        $query = null;
        if (is_null($key)) {
            $query = $this->query->all();
        } else {
            $query =  $this->query->get($key, $default);
        }
        $key = ltrim($this->getPathInfo(), "/");
        unset($query[$key]);
        return $query;
    }

    /**
     * Trả về base url và giao thức http/https 
     * ==> http://mvc.local
     *
     * @return void
     */
    public function baseUrl()
    {
        return $this->getSchemeAndHttpHost();
    }

    // /**
    //  * Trả về URL với query string
    //  * http://mvc.local/admin/users?page=1&filter=type
    //  *
    //  * @return void
    //  */
    // public function fullUrlWithQuery()
    // {
    //     return $this->fullUrlWithQueryString($this->getQuery());
    // }
}
