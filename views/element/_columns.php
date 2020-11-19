<?php
use yii\helpers\Url;
use app\models\Category;
use kartik\datetime\DateTimePicker;
use yii\helpers\StringHelper;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    //[
        //'class' => 'kartik\grid\SerialColumn',
        //'width' => '30px',
    //],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'category_id',
        'value'=> 'categoryName',
        'filter'=> Category::getList(),
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'description',
        'value' => function ($model) {
            return StringHelper::truncate($model->description, 100);
        }
    ],
    //[
        //'class'=>'\kartik\grid\DataColumn',
        //'attribute'=>'param_done',
    //],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'param_done',
        'label' => Yii::t('main', 'Progress'),
        'value' => function ($model) {
            $prots = floor($model->param_done*100/$model->param_all);
            return \yii\bootstrap\Progress::widget([
                'bars' => [
                    [
                        'percent' => $prots,
                        'label' => $prots . '%',
                        'options' => [
                            //'class' => 'progress-bar-success',
                            'class' => 'active progress-striped', 
                        ],
                        'barOptions' => [
                            'class' => 'progress-bar-success'
                        ],
                    ],
                ]
            ]);
        },
        /*'<div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>';
        },*/
        'format' => 'raw',
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