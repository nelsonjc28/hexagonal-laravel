<?php
namespace Crud_users\Infraestructure\Bus;

use Crud_users\Application\Contracts\Container;
use Illuminate\Container\Container  as IoC;

final class LaravelContainer implements Container
{
    private $container;

    public function __construct(Ioc $container)
    {
        $this->container = $container;
    }

    public function make($class)
    {
        return $this->container->make($class);
    }
}
