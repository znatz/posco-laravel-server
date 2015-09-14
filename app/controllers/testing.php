<?php

class Testing extends \BaseController
{


    public function index()
    {
        /*
                $receiptRecords = Receiptrecord::where('tableNO', "7")->get();
                foreach ($receiptRecords as $r) {
                    echo ($r->goodsTitle."<br/>");
                }
                $uuid = Uuid::generate(4);
                echo ($uuid->string);
            */
        return View::make('testing.index');
    }

    public function receiver()
    {
        $img= $_POST["img"];

        $img= preg_replace("/data:[^,]+,/i","",$img);

        $img= base64_decode($img);

        $image = imagecreatefromstring($img);

//        imagesavealpha($image, TRUE); // 透明色の有効
        imagesavealpha($image, FALSE); // 透明色の有効
//        imagepng($image ,'./guest.png');
        imagejpeg($image ,'./guest.jpg');

//        $url    = "http://posco-cloud.sakura.ne.jp/TEST/IOS/OrderSystem/public/guest.png";
        $url    = "http://posco-cloud.sakura.ne.jp/TEST/IOS/OrderSystem/public/guest.jpg";
        $skey   = "horElqyh-xKwQ15Ps0NThowV6M2ZjDkG";
        $apikey = "6d173282902519bacf1ae9fd7cfb3742";

//        https://apius.faceplusplus.com/v2/train/verify?api_secret=YOUR_API_SECRET&api_key=YOUR_API_KEY&person_name=Demoperson
//        https://apius.faceplusplus.com/v2/detection/detect?url=http://posco-cloud.sakura.ne.jp/TEST/IOS/OrderSystem/public/guest.png&api_secret=horElqyh-xKwQ15Ps0NThowV6M2ZjDkG&api_key=6d173282902519bacf1ae9fd7cfb3742&attribute=glass,pose,gender,age,race,smiling
        $html = file_get_contents('https://apius.faceplusplus.com/v2/detection/detect?url='.$url.'&api_secret='.$skey.'&api_key='.$apikey.'&attribute=glass,pose,gender,age,race,smiling');

        header('Content-type: application/json');
        echo json_encode( $html );


    }

    public function store()
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }

}