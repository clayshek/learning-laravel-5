<?php

namespace App\Billing;

class Stripe

// Using a service provider (App\Providers\AppServiceProvider.php)
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }
}