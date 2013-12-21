<?php
namespace Application\Form;
use Zend\Form\Form;

class DiscussionForm extends Form
{

    public function __construct()
    {
        parent::__construct();
        $this->setName('discussion');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        
        
        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type' => 'text',
                'label' => 'title',
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