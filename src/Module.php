<?php

namespace MobileAppToSite;

use App\Factory\DoctrineInjector;
use App\Listener\ConfigurableDoctrineEntityDependencyInjector;
use App\Listener\LastLoggedInTime;
use App\Listener\RenewalAuthListener;
use AppApi\DiscountRules\Listener\DiscountPercentListener;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
