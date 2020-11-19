<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Element */
?>
<div class="element-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value'=> $model->categoryName,
            ],
            'description:ntext',
            'param_done',
            'param_all',
            //'created_at',
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y.m.d H:i:s'],
            ],
        ],
    ]) ?>

</div>
