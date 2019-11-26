<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Events');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, //kalau x nak search, komenkan 
        'columns' => [
            ['header' => 'No.',
                'class' => 'yii\grid\SerialColumn'
            ],

            //'id',
            //'id_category',
           // [
                // //'label' => 'Category ID', 
                // 'label' => $searchModel->getAttributeLabel('id_category'), //dari model
                // //'attribute' => 'category_name',
                // //'value' => 'category.category', //sama function dengan value bawah
                // 'value' => function ($model){
                //     $category = $model->categoryEvents->category;
                //     return $category;
                // }
            //],
            [
                'label' => 'Category',
                //'attribute' =>
                'value'=>function ($model)
                {
                    foreach ($model->categoryEvents as $value)
                    {
                        $data .= $value->category->category.'<br>'.'<br>';  //concat (masuk satu satu untuk combine jadi 1 sentence)

                    }
                    return $data;
                },
                'format' =>'html',
            ],
            'title', // mewakili label, value, attribute ->label(event model)
            'description',
            'time',
            'date',
            //'status',
            //'created_at',
            //'updated_at',

            ['header' => 'Action',
                'class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
