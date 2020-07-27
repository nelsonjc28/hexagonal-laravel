<?php
namespace Crud_users\Infraestructure\Bus\Contracts;

use Crud_users\Infraestructure\Bus\Contracts\Container;
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
        $this->container->make($class);
    }
}
