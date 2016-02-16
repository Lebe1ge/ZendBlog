<?php
namespace Application\Form;
use Zend\Form\Form;

class CommentForm extends Form
{
    public function __construct($name = null)
    {
        // On ne veut pas tenir compte du parametre $name,
        // On va le surcharger via le contructeur du parent
        parent::__construct('Comment');

        $this->add(array(
            'name' => 'comment_id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'post_id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'email',
            'options' => array(
                'label' => 'email',
            ),
        ));

        $this->add(array(
            'name' => 'content',
            'type' => 'textarea',
            'options' => array(
                'label' => 'content',
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