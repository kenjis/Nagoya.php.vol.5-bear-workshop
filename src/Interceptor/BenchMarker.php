<?php
namespace Koriym\Work\Interceptor;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;
use Psr\Log\LoggerInterface;
use Ray\Di\Di\Inject;

class BenchMarker implements MethodInterceptor
{
    private $logger;
    
    /**
     * @Inject
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    
    public function invoke(MethodInvocation $invocation)
    {
        $start = microtime(true);
        $result = $invocation->proceed(); // 元のメソッドの実行
        $time = microtime(true) - $start;

        $this->logger->debug(sprintf('%f sec elapsed', $time));

        return $result;

    }
}
