<?php
namespace Application\Form;
use Zend\Form\Form;

class PostForm extends Form
{
    public function __construct($name = null)
    {
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
            'type' => 'Zend\Form\Element\Select',
            'name' => 'category_id',
            'options' => array(
                'label' => 'Categorie',
                'empty_option' => 'Selectionner une categorie',
                'value_options' => array(
                    '0' => 'French',
                    '1' => 'English',
                    '2' => 'Japanese',
                    '3' => 'Chinese',
                ),
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
}