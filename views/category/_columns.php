<?php
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    //[
       // 'class' => 'kartik\grid\SerialColumn',
       // 'width' => '30px',
    //],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'updated_at',
        'format' => ['date', 'php:Y.m.d H:i:s'],
        'filter' => DateTimePicker::widget([
            'model'=>$searchModel,
            'attribute'=>'up_picker',
            'type' => DateTimePicker::TYPE_BUTTON,
            'layout' => '{picker} {remove} {input}',
            //'saveFormat' => 'php:U',
            'options' => [
                'type' => 'text',
                'readonly' => true,
                'class' => 'text-muted small',
                'style' => 'border:none;background:none',
                'placeholder' => Yii::t('main', 'Select operating time'),
            ],
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'yyyy.MM.dd hh:i:ss',
                'todayHighlight' => true,
                'autoclose' => true,
            ],
        ]),
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>Yii::t('kvgrid', 'View'),'data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>Yii::t('kvgrid', 'Update'), 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>Yii::t('kvgrid', 'Delete'), 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>Yii::t('kvgrid', 'Are you sure?'),
                          'data-confirm-message'=>Yii::t('kvgrid', 'Are you sure you want to delete this item')], 
    ],

];   