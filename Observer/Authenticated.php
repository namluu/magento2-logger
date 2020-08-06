<?php
namespace Namluu\CustomLogger\Observer;

use Magento\Customer\Model\Customer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class Authenticated implements ObserverInterface
{
    /** @var LoggerInterface  */
    protected $logger;

    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {

        /** @var Customer $customer */
        $customer = $observer->getModel();
        if ($customer->getId()) {
            $email = $customer->getEmail();
            $message = sprintf(' %s has been logged in.', $customer->getName());

            $this->logger->debug($message, [
                'email' => $email,
            ]);
        }

        return $this;
    }
}
