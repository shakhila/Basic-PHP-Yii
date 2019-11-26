<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryEvent */

$this->title = Yii::t('app', 'Create Category Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
