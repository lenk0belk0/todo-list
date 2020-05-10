<?php
declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

return [
    'config' => [
        'debug' => (bool) getenv('APP_ENV_DEV')
    ],
    'EntityManager' => static function (DI\Container $container) {
        $isDevMode = $container->get('config')['debug'];
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(
            [ __DIR__ . '/../src' ],
            $isDevMode,
            $proxyDir,
            $cache,
            $useSimpleAnnotationReader
        );

        // TODO change to postgresql
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../var/db.sqlite',

        );

        return EntityManager::create($conn, $config);
    },
    // TODO add logger
    EntityManagerInterface::class => DI\get('EntityManager')
];