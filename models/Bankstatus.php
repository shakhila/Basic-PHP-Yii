<?
//global model

namespace app\models;  //panggil semua model
use yii\base\Model;
use yii\helpers\Arrayhelper;

class Bankstatus extends Model
{
    public function listCategory()
    {
        $modelCategory = Category::find()
        ->where(['status' => '1'])
        ->all();

        $listCategory = ArrayHelper::map($modelCategory, 'id', 'category');

        return $listCategory;
    }
}

?>