<?php

namespace LaravelFCM;

use GuzzleHttp\Client;
use Illuminate\Support\Manager;

class FCMManager extends Manager
{
    public function getDefaultDriver()
    {
        return $this->getContainer()[ 'config' ][ 'fcm.driver' ];
    }

    protected function createHttpDriver()
    {
        $config = $this->getContainer()[ 'config' ]->get('fcm.http', []);

        return new Client(['timeout' => $config[ 'timeout' ]]);
    }

    //
 /**
     * Get the app container
     *
     * @return \Illuminate\Contracts\Container\Container
     */
    public function getContainer()
    {
        // Laravel 7.x, 8.x support
        if (isset($this->container)) {
            return $this->container;
        }

        // "app" Does not exist anymore in 8.x
        return $this->app;
    }
}
