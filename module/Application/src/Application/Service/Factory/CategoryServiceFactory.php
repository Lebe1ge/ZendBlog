<?php
namespace Application\Service\Factory;

use Application\Service\CategoryService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CategoryServiceFactory implements FactoryInterface
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
        $categoryRepository = $entityManager->getRepository('Application\Entity\Category');
        return new CategoryService($entityManager, $categoryRepository);
    }
}