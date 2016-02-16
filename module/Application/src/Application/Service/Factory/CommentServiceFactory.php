<?php
namespace Application\Service\Factory;

use Application\Service\CommentService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CommentServiceFactory implements FactoryInterface
{
    /**
     * (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     * @param ServiceLocatorInterface $serviceLocator
     * @return Application\Service\ApplicationService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $commentRepository = $entityManager->getRepository('Application\Entity\Comment');
        return new CommentService($entityManager, $commentRepository);
    }
}