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
use Application\Entity\Category;

class widgetCategoryController extends AbstractHelper
{

    protected $category;

    public function __construct($category=null)
    {
        // pas de gestion d'exception pour la simplicité
        $this->category = $category;
    }

    public function setUCategory($category)
    {
        // pas de gestion d'exception pour la simplicité
        $this->category = $category;
    }

    public function __invoke($params = array())
    {
        $category = $this->category->getAll();

        return $category;
    }

}
