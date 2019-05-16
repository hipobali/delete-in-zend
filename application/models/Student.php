<?php

class Application_Model_Student extends Application_Model_Abstract {

public static function checkuser()
	{
		$db=self::getDb();
		$sql="SELECT
		St.id St_id,
		St.name St_name,

		St.address St_address 
        FROM student St
        LEFT JOIN phone Ph 
        ON St.id=Ph.student_id";
		$result=$db->fetchAll($sql);
		return $result;
	}
	public static function saveData($Data)
	{
		$db=self::getDb();
		try
     	{
     		$db->beginTransaction();
     		$db->insert('student', $Data);
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
	public static function deleteData($id)
    {
     	$db = self::getDb();
        try 
        {
            $db->beginTransaction();
            $db->delete('userform', 'id=' . $id);
            $db->commit();
        } 
        catch (Exception $e) 
        {
            $db->rollBack();
            return 'fail';
        }
    }
    public static function editData($id, $params = array())
    {
        $data = array();
        $data['name'] 	= $params['name'];
        $data ['email']	= $params['email'];
        $data['address']= $params['address'];
        $db = self::getDb();
        try 
        {
            $db->beginTransaction();
            $where = $db->quoteInto('id=?', $id);
            $db->update('userform', $data, $where);
            $db->commit();
        } 
        catch (Exception $e) 
        {
            $db->rollBack();
            throw new RuntimeException($e->getMessage());
        }
    }

}
