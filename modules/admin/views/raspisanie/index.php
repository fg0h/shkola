<?php

use app\models\Raspisanie;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RaspisanieSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Raspisanies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspisanie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Raspisanie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'time',
            'den_nedeli',
            'group_id',
            'student_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Raspisanie $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
