<?php
namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;

trait DisablesExceptionHandling
{
    protected $oldExceptionHandler;

    protected function disableExceptionHandling() : self
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });

        return $this;
    }

    protected function withoutExceptionHandling() : self
    {
        return $this->disableExceptionHandling();
    }

    protected function withExceptionHandling() : self
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }

    /**
     * Set an expected exception.
     *
     * @param string $class
     *
     * @return $this
     */
    public function expectException($class) : self
    {
        $this->disableExceptionHandling();
        $this->setExpectedException($class);

        return $this;
    }
}