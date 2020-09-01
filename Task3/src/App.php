<?php

declare(strict_types=1);

namespace Recruitment\ApiConsumeTask;

use Recruitment\ApiConsumeTask\Controller\MainController;
use Recruitment\ApiConsumeTask\Interfaces\Config;
use Recruitment\ApiConsumeTask\Interfaces\Output;
use Recruitment\ApiConsumeTask\Model\User;
use Recruitment\ApiConsumeTask\Service\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class App
{
    protected $config;
    protected $output;
    protected $router;

    public function __construct(Output $output, Config $config)
    {
        $this->output = $output;
        $this->config = $config;
        $this->router = new Router();
    }

    public function run()
    {
        try {
            $currentUser = new User();
            $currentUser->clientId = $this->config->getSingleValue('BigCommerce.clientId');
            $currentUser->clientSecret = $this->config->getSingleValue('BigCommerce.clientSecret');
            $currentUser->storeHash = $this->config->getSingleValue('BigCommerce.storeHash');
            $currentUser->save();

            $loader = new FilesystemLoader(__DIR__.'/View/');
            $twig = new Environment($loader, [
                'cache' => __DIR__.'/../var/twig_cache/',
                'auto_reload' => true,
            ]);

            $class = new MainController($twig);
            $action = $this->router->method.'Action';

            if (method_exists($class, $action)) {
                $class->$action();
            } else {
                echo 'Action Not Found';
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            $this->output->print('Error occurred: '.$e->getMessage());
        }
    }
}
