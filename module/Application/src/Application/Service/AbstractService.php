<?php
namespace Application\Service;

/**
 * Service layer - Abstract class
 *
 * @package Application\Service
 * @author Bidoum
 *
 */
abstract class AbstractService{

    /**
     * @var \Doctrine\ORM\EntityManager L'entity manager
     */
    private $_em;
    /**
     * @var \Doctrine\ORM\EntityRepository Le repository
     */
    private $_rep;

    /**
     * Constructeur
     * @param \Doctrine\ORM\EntityManager $em L'Entity manager
     * @param \Doctrine\ORM\EntityRepository $rep Le repository
     */
    public function __construct(\Doctrine\ORM\EntityManager $em, \Doctrine\ORM\EntityRepository $rep)
    {
        $this->_em = $em;
        $this->_rep = $rep;
    }

    /**
     * Obtient l'entity manager
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm()
    {
        return $this->_em;
    }

    /**
     * Obtient le repository
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRep()
    {
        return $this->_rep;
    }

}
?>