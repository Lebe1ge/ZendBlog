<?php
/**
 * Service
 * @package Application\Service
 * @author Bidoum
 *
 */
namespace Application\Service;

/**
 * Service
 *
 * @package Application\Service
 * @author auget
 *
 */
class UserService extends \Application\Service\AbstractService
{
    /**
     * Obtient un utilisateur par son email
     * @param string email
     * @return Application\Model\User
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