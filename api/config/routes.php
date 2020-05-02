<?php
declare(strict_types=1);

use App\Controller\HomeController;
use Slim\App;

return static function(App $app) {
    $app->get('/', HomeController::class);
};