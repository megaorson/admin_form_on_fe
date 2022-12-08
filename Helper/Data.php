<?php

namespace Megaorson\CustomForm\Helper;


use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Psr\Log\LoggerInterface;

class Data extends AbstractHelper
{
    /**
     * @var LoggerInterface
     */
    protected $requestLogger;

    /**
     * @var LoggerInterface
     */
    protected $responseLogger;

    /**
     * @var LoggerInterface
     */
    protected $errorLogger;

    /**
     * Data constructor.
     * @param LoggerInterface $requestLogger
     * @param LoggerInterface $responseLogger
     * @param LoggerInterface $errorLogger
     * @param Context $context
     */
    public function __construct(
        LoggerInterface $requestLogger,
        LoggerInterface $responseLogger,
        LoggerInterface $errorLogger,
        Context $context
    ) {
        parent::__construct($context);
        $this->requestLogger = $requestLogger;
        $this->responseLogger = $responseLogger;
        $this->errorLogger = $errorLogger;
    }

    /**
     * @return LoggerInterface
     */
    public function getRequestLogFile()
    {
        return $this->requestLogger;
    }

    /**
     * @return LoggerInterface
     */
    public function getResponseLogFile()
    {
        return $this->responseLogger;
    }

    /**
     * @return LoggerInterface
     */
    public function getErrorLogFile()
    {
        return $this->errorLogger;
    }
}
