<?php 
 class Application_Model_StudentData extends Application_Model_Abstract {
     public static function saveData($data)
     {
         $db=self::getDb();
         try
         {
            $db->beginTransaction();
            $db->insert('post', $data);
           $lastInsertId = $db->lastInsertId('id');
           $db->commit();
           return $lastInsertId;    
         }
         catch (Exception $e)
         {
             $db->rollBack();
             throw new RuntimeException($e->getMessage());
         }
     }
       public function getData(){   
		$db=self::getDb();
		$sql="SELECT
		St.id St_id,
		St.name St_name,
        St.email St_email,
		St.address St_address,
        St.phone St_phone 
        FROM post St";
        $result=$db->fetchAll($sql);
		return $result;
       }
       public static function deleteData($id)
       {
            $db = self::getDb();
           try 
           {
               $db->beginTransaction();
               $db->delete('post', 'id=' . $id);
               $db->commit();
           } 
           catch (Exception $e) 
           {
            }
}
 }