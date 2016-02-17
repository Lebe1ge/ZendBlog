<?php
namespace Application\Form;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Form\Form;

class PostForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
        // On ne veut pas tenir compte du parametre $name,
        // On va le surcharger via le contructeur du parent
        parent::__construct('Post');

        $this->add(array(
            'name' => 'post_id',
            'type' => 'Hidden',
        ));

        /*$this->add(
            array(
                'name' => 'csrf',
                'type' => 'Csrf',
            )
        );
        */

        $this->add(array(
            'name' => 'title',
            'type' => 'text',
            'options' => array(
                'label' => 'Titre',
            ),
        ));

        $this->add(array(
            'name' => 'content',
            'type' => 'textarea',
            'options' => array(
                'label' => 'Contenue',
            ),
        ));

        $this->add(array(
            'name' => 'author',
            'type' => 'text',
            'options' => array(
                'label' => 'Auteur',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'category_id',
            'options' => array(
                'label' => 'Categorie',
                'object_manager' => $this->getObjectManager(),
                'target_class'   => 'Application\Entity\Category',
                'property'       => 'name',
                'empty_option' => 'Selectionner un catégorie',
            )
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectMultiCheckbox',
            'name' => 'tags',
            'options' => array(
                'label' => 'Tags',
                'object_manager' => $this->getObjectManager(),
                'target_class'   => 'Application\Entity\Tag',
                'property'       => 'name',
            )
        ));

        // Le bouton Submit
        $this->add(array(
            'name' => 'submit',        // Nom du champ
            'type' => 'Submit',        // Type du champ
            'attributes' => array(     // On va définir quelques attributs
                'value' => 'Ajouter',  // comme la valeur
                'id' => 'submit',      // et l'id
            ),
        ));
    }

    /**
     * Set the object manager
     *
     * @param ObjectManager $objectManager
     * @return $this
     */
    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
        return $this;
    }

    /**
     * Get the object manager
     *
     * @return ObjectManager
     */
    public function getObjectManager() {
        return $this->objectManager;
    }
}