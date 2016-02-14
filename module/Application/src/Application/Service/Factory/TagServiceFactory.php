<?php
namespace Application\Service\Factory;

use Application\Service\UserService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TagServiceFactory implements FactoryInterface
{
    /**
     * (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     * @return Application\Service\ApplicationService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $userRepository = $entityManager->getRepository('Application\Entity\Tag');

        return new UserService($entityManager, $userRepository);
    }
}