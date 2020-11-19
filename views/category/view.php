<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
?>
<div class="category-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y.m.d H:i:s'],
            ],
        ],
    ]) ?>

</div>
