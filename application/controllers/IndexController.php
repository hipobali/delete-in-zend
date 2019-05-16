<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->layout->setLayout('layout');
    }

    public function indexAction()
    {
          // create new session
         // $session = new Zend_Session_Namespace();
        // $name=$this->$getRequest()->$getPost->name;
        // $email=$thsi->$getRequest()->$gePost()->email;
        // $address=$this->$getRequest()->$getPost()->address;
        // $phone=$this->$getRequest()->$getPost()->phone;

        // $Data= array();
        // $Data['name']=$name;
        // $Data['email']=$email;
        // $Data['address']=$address;
        // $Data['phone']=$phone;
        // $saveData= Application_Model_StudentData::saveData($Data);

        $this->_helper->layout->setLayout('layout'); 
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost();
            $saveData=Application_Model_StudentData::saveData($data);
            $this->redirect('/');
        }
        $dataList = Application_Model_StudentData::getData(); 
        $this->view->studentData = $dataList; 
        
}
    public function deleteAction(){
        
        $dataList = Application_Model_StudentData::getData(); 
        $this->view->studentData = $dataList; 
             // delete alert action
      //  $this->view->isDelete = 0;
     //   $del = $session->action;
      //  $session->action = '';
      //  if($del == 'delete'){
     //       $this->view->isDelete = 1;
     //   }

          // get id to delete
        
          $id = $this->getRequest()->getParam('id', '');
          if($id == '') return ; // id must not be empty
          if(!is_numeric($id)) return ; // id must be numeric
  
          //$session->action = 'delete';
  
          // do delete
          Application_Model_StudentData::deleteData($id);
          $this->redirect('/');
          // redirect after delete
         // $this->redirect('/index?del=1');
    }
}