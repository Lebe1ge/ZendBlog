<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Application for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

class UserController extends \ZfcUser\Controller\UserController
{

    public function __construct($redirectCallback) {
        parent::__construct($redirectCallback);
    }

    public function loginAction()
    {
        return parent::loginAction();
    }

    public function logoutAction()
    {
        return parent::logoutAction();
    }


    public function authenticateAction()
    {
        $authResult = parent::authenticateAction();

        $userEntity = $this->zfcUserAuthentication()->getIdentity();
        if ($this->getRole($userEntity->getId()) != 'Admin') {
            return $this->redirect()->toRoute('zfcadmin');
        }

        return $authResult;
    }

}
