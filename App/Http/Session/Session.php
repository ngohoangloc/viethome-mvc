<?php

namespace App\Http\Session;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session as BaseSession;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;

class Session extends BaseSession
{

    public function __construct(SessionStorageInterface $storage = null, AttributeBagInterface $attributes = null, FlashBagInterface $flashes = null, callable $usageReporter = null)

    {
        parent::__construct($storage, $attributes, $flashes, $usageReporter);
    }

    /**
     * Hàm dùng để set hoặc get flash messages
     *
     * @param string $name
     * @param string $message
     * @return array|null
     */
    public function getFlash($name, $default = null)
    {
        return $this->getFlashBag()->get($name, $default);
    }

    /**
     * Set flash message
     *
     * @param string $name
     * @param string $message
     * @return \App\Http\Session\Session
     */
    public function setFlash($name, $message)
    {
        $this->getFlashBag()->add($name, $message);
        $this->save();
        return $this;
    }

    /**
     * Get all flash messages from session
     *
     * @return array|null
     */
    public function getFlashes()
    {
        return $this->getFlashBag()->all();
    }

    /**
     * Kiểm tra nếu có $name tồn tại trong Flash session
     *
     * @param string $name
     * @return boolean
     */
    public function hasFlash($name)
    {
        return $this->getFlashBag()->has($name);
    }
}
