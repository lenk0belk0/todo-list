<?php
declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;

return static function(App $app, ContainerInterface $container) {
    $app->addErrorMiddleware(true, true, true);
};
