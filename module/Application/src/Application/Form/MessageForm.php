<?php
namespace Application\Form;
use Zend\Form\Form;

class MessageForm extends Form
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
            'name' => 'idDiscussion',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'message',
            'attributes' => array(
                'type' => 'text',
                'label' => 'Message',
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