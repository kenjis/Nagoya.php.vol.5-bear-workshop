<?php

namespace Koriym\Work\Module;

use BEAR\Package\Module\Package\StandardPackageModule;
use Ray\Di\AbstractModule;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;
use Ray\Di\Di\Scope;

class AppModule extends AbstractModule
{
    /**
     * @var string
     */
    private $context;

    /**
     * @param string $context
     *
     * @Inject
     * @Named("app_context")
     */
    public function __construct($context = 'prod')
    {
        $this->context = $context;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new StandardPackageModule('Koriym\Work', $this->context, dirname(dirname(__DIR__))));

        $this->bind('Psr\Log\LoggerInterface')->toProvider('Koriym\Work\Module\Provider\MonologLoggerProvider')->in(Scope::SINGLETON);

        $this->bindInterceptor($this->matcher->any(), $this->matcher->annotatedWith('Koriym\Work\Annotation\Benchmark'), [$this->requestInjection('Koriym\Work\Interceptor\BenchMarker')]);

        // override module
        // $this->install(new SmartyModule($this));

        // $this->install(new AuraViewModule($this));

        // install application dependency
        // $this->install(new App\Dependency);

        // install application aspect
        // $this->install(new App\Aspect($this));
    }
}
