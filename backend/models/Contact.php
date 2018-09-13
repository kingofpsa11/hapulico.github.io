<?php 
namespace backend\models;

use yii\db\ActiveRecord;
/**
 * 
 */
class Contact extends ActiveRecord
{
	
	public static function tableName()
	{
		return 'contact';
	}

	public function rules()
	{
		return [
			[['name','email','subject','body'],'required'],
			[['name','subject'],'string','max'=>255],
			['email','string','max'=>100],
			['body','safe'],
			['email','email'],
			[['created_at','updated_at'],'integer'],
		];
	}
}
 ?>