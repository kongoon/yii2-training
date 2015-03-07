<?php
use yii\widgets\DetailView;
?>
<h1>widgets/detailview</h1>

<?php
echo DetailView::widget([
    'model'=>$model,
    'attributes'=>[
        'fullname',
        'address:html',
        [
            'label'=>'ตำบล',
            'value'=>$model->tambon->tambon_name,
        ],
        [
            'label'=>'อำเภอ',
            'value'=>$model->tambon->district->district_name,
        ],
        [
            'label'=>'จังหวัด',
            'value'=>$model->tambon->province->province_name,
        ],
        'zipcode',
        'email',
        'tel',
        'created:datetime' 
    ]
]);