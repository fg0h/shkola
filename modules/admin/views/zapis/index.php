<?php

use app\models\zapis;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ZapisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Zapis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zapis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Zapis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'surname',
            'patronymic',
            'email:email',
            //'strana',
            //'gorod',
            //'course_id',
            //'group_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, zapis $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
