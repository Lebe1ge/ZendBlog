<?php
/**
 * Service
 * @package Application\Service
 * @author Bidoum
 *
 */
namespace Application\Service;
use Application\Entity\User;

/**
 * Service
 *
 * @package Application\Service
 * @author auget
 *
 */
class UserService extends AbstractService
{
    /**
     * Obtient tous les utilisateurs
     * @param string email
     * @return Application\Entity\User
     *
     */

    public function getAll(){

        return $this->getRep()->findAll();
    }

    /**
     * Obtient un utilisateur par son email
     * @param string email
     * @return Application\Entity\User
     *
     */

    public function getByEmail($email)
    {
        $qb = $this->getEm()->createQueryBuilder();

        $qb->select(array('u'))
            ->from('Application\Model\User', 'u')
            ->where(
                $qb->expr()->eq('u._email', '?1')
            )
            ->setParameters(array(1 => $email))
        ;

        $query = $qb->getQuery();

        return $query->getSingleResult();
    }
}