<?php

class TestController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->layout->setLayout('layout');
    }

    public function testAction()
    {
        $this->_helper->layout->setLayout('layout');
    }
    
}