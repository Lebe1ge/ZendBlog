<?php
namespace Application\Form;
use Zend\Form\Form;

class TagForm extends Form
{
    public function __construct($name = null)
    {
        // On ne veut pas tenir compte du parametre $name,
        // On va le surcharger via le contructeur du parent
        parent::__construct('Tag');

        $this->add(array(
            'name' => 'tag_id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Nom',
            ),
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
}