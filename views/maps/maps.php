<?php
$this->title = "แสดงข้อมูลแบบแผนที่ Google Maps";

use yii\helpers\Html;
use yii\grid\GridView;

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;

$coord = new LatLng(['lat' => 15.39745881, 'lng' => 104.72004496]);
$map = new Map([
        'center' => $coord,
        'zoom' => 10,
        'width' => '100%',
        'height' => '500',
    ]);
foreach ($contacts as $s) {
    //echo $s->school_name;
    $coords = new LatLng(['lat' => $s->lat, 'lng' => $s->lng]);//กำหนด lat lng
    // สร้าง marker ในแผนที่
    $marker = new Marker([
        'position' => $coords,
    ]);

    // กำหนด InfoWindow ให้กับ Marker
    $marker->attachInfoWindow(
            new InfoWindow([
        'content' => '<h4>'.$s->fullname . '</h4>
                <table class="table table-bordered">
                <tr><td>ที่อยู่</td><td>' . $s->address .'</td>
            </tr>
            <tr><td>ตำบล</td><td>' . $s->tambon->tambon_name . '</td>
            </tr>
            <tr><td>อำเภอ</td><td>' . $s->tambon->district->district_name . '</td>
            </tr>
            <tr><td>จังหวัด</td><td>' . $s->tambon->province->province_name . '</td>
            </tr>
            <tr><td>รหัสไปรษณีย์</td><td>' . $s->zipcode . '</td>
            </tr>
            <tr><td>หมายเลขโทรศัพท์</td><td>' . $s->tel . '</td>
            </tr>
            <tr><td>ละติจูด</td><td>' . $s->lat . '</td>
            </tr>
            <tr><td>ลองติจูด</td><td>' . $s->lng . '</td>
            </tr>
            <tr><td>Email</td><td>'.$s->email . '</td>
            </tr>
            </table>'
            ])
    );

    // นำ Marker ที่ได้ใส่ในแผนที่
    $map->addOverlay($marker);
}

// กำหนดให้แสดงแผนที่
echo $map->display();