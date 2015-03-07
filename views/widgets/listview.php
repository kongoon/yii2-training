<?php
use yii\widgets\ListView;
?>
<h1>widgets/listview</h1>

<?php
echo ListView::widget([
    'dataProvider'=>$dataProvider,
    'itemView'=>'_contact',
]);