<?php

namespace AppBundle\EventListener;

use AppBundle\Api\ApiProblem;
use AppBundle\Api\ApiProblemException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use AppBundle\Api\ResponseFactory;
use Psr\Log\LoggerInterface;

class ApiExceptionSubscriber implements EventSubscriberInterface
{
    private $debug;
    private $responseFactory;
    private $logger;

    public function __construct($debug, ResponseFactory $responseFactory, LoggerInterface $logger)
    {
        $this->debug = $debug;
        $this->responseFactory = $responseFactory;
        $this->logger = $logger;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if (strpos($event->getRequest()->getPathInfo(), '/api') !== 0) {
            return;
        }
        $e = $event->getException();
        if ($e instanceof ApiProblemException) {
            $apiProblem = $e->getApiProblem();
        } else {
            $statusCode = $e instanceof HttpExceptionInterface ? $e->getStatusCode() : 500;

            // allow 5XX errors to be thrown by Symfony
            // so we have more info to fix issues
            if ($this->debug && $statusCode >= 500) {
                return;
            }

            // If not in debug mode then we need to log errors
            // so we can debug easier
            $this->logException($e);

            $apiProblem = new ApiProblem($statusCode);

            /* For 4XX errors we can show that info to client
             * Otherwise, it could be some sensitive
             * exception, which should not be exposed
             */
            if ($e instanceof HttpExceptionInterface) {
                $apiProblem->set('detail', $e->getMessage());
            }
        }

        $response = $this->responseFactory->createResponse($apiProblem);

        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::EXCEPTION => 'onKernelException'
        );
    }

    /**
     * On production API this listener overwrites default listener
     * so for internal error 5XX there will be
     * nice message but no other info for debuging
     * So we need to log those errors on Production
     *
     * @param \Exception $exception
     */
    private function logException(\Exception $exception)
    {
        $message = sprintf('Uncaught PHP Exception %s: "%s" at %s line %s', get_class($exception), $exception->getMessage(), $exception->getFile(), $exception->getLine());
        $isCritical = !$exception instanceof HttpExceptionInterface || $exception->getStatusCode() >= 500;
        $context = array('exception' => $exception);
        if ($isCritical) {
            $this->logger->critical($message, $context);
        } else {
            $this->logger->error($message, $context);
        }
    }

}