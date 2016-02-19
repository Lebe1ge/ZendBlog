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

class widgetTag extends AbstractHelper
{
    protected $entitymanager;
    protected $tag;

    public function __construct($sm) {
        $this->entitymanager = $sm->getServiceLocator()->get('Application\Service\TagService');
    }

    public function __invoke($params = array())
    {
        return $this->getHtml($this->entitymanager->getAll());
    }

    public function getHtml($tags){
        $html = '<ul class="icons">';
        foreach($tags as $tag){
            $html .= '<li><h4><a href="'.$this->view->url('list_tag_page', array('slug' => $tag->slug)) .'">'.$tag->name.'</a></h4></li>';
        }
        $html .= '</ul>';

        return $html;
    }

}
