<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Application for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;
use Application\Form\CommentForm;
use Application\Entity\Comment;

class widgetCategory extends AbstractHelper
{
    protected $entitymanager;
    protected $category;

    public function __construct($sm) {
        $this->entitymanager = $sm->getServiceLocator()->get('Application\Service\CategoryService');
    }

    public function __invoke($params = array())
    {
        return $this->getHtml($this->entitymanager->getAll());
    }

    public function getHtml($category){
        $html = '<ul class="alt">';
        foreach($category as $cat){
            $html .= '<li><h4><a href="'.$this->view->url('list_category_page', array('slug' => $cat->slug)) .'">'.$cat->name.'</a></h4></li>';
        }
        $html .= '</ul>';

        return $html;
    }

}
