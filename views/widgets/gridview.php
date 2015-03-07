<?php
use yii\grid\GridView;
?>
<h1>widgets/gridview</h1>

<?php
echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        ['class'=>'yii\grid\SerialColumn'],
        'fullname',
    ]
]);