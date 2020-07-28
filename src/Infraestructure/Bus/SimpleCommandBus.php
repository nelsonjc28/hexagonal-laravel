<?php


namespace Crud_users\Infraestructure\Bus;

use Crud_users\Application\Contracts\Command;
use Crud_users\Infraestructure\Bus\Contracts\CommandBus;
use Crud_users\Application\Contracts\Container;

class SimpleCommandBus implements CommandBus
{
    const COMMAND_PREFIX = 'Command';
    const HANDLER_PREFIX = 'Handler';
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;

    }

    public function execute($command)
    {
        $this->resolveHandler($command)->__invoke($command);
    }

    public function resolveHandler(Command $command)
    {
        $this->container->make($this->getHandlerClass($command));
    }

    public function getHandlerClass(Command $command)
    {
        return str_replace(self::COMMAND_PREFIX, self::HANDLER_PREFIX, get_class($command));
    }
}
