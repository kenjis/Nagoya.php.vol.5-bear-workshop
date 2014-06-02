<?php
namespace Koriym\Work\Provider;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Ray\Di\ProviderInterface;

class MonologLoggerProvider implements ProviderInterface
{
    use \BEAR\Sunday\Inject\LogDirInject;
    
    public function get()
    {
        $log = new Logger('monolog');
        $log->pushHandler(new StreamHandler($this->logDir.'/debug.log', Logger::DEBUG));
//        $log->debug('MonologLoggerProvider: new Logger()');
        
        return $log;
    }
}
