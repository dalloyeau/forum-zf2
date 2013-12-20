<?php
namespace Album\Form;
use Zend\Form\Form;

class DiscussionForm extends Form
{

    public function __construct()
    {
        parent::__construct();
        $this->setName('application');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        
        
        $this->add(array(
            'name' => 'titre',
            'attributes' => array(
                'type' => 'text',
                'label' => 'Title',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'label' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
    
}