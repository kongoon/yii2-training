<?php
use yii\helpers\Html;

$text1 = "<h2>ทดสอบเข้ารหัส</h2> <p>a & b</p>";
$text2 = "&lt;h2&gt;ทดสอบถอดรหัส&lt;/h2&gt; &lt;p&gt;a &amp; b&lt;/p&gt;";

echo $text1;
echo Html::encode($text1);
echo "<hr>";

echo $text2;
echo Html::decode($text2);
