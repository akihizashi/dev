<?php

use Faker\Generator as Faker;

$factory->define(App\Shop::class, function (Faker $faker) {
    return [
      'name' => 'Product '. rand(1000, 10000),
      'code' => $faker->ean8,
      'image' => $faker->randomElement(['disc1.jpg', 'disc2.jpg', 'disc3.jpg', 'disc4.jpg', 'disc5.jpg', 'disc6.jpg', 'disc7.jpg', 'disc8.jpg', 'disc9.jpg', 'disc10.jpg', 'disc11.jpg']),
      'category' => $faker->randomElement(['CD', 'DVD', 'Album']),
      'reposition' => rand(1, 99),
      'price' => rand(1000, 5000),
      'release' => $faker->date('Y-m-d'),
      'description' => '<p>今年11月にNEW YORKにて開催の「Fate/Stay Night [Heaven’s    Heel] Special Event」にAimerの出演が決定しました！
                        </p><p>
                        ■公演名：Fate/Stay Night [Heaven’s Heel] Special Event Featuring Aimer @ Anime NYC
                        </p><p>

                        ■会場：Javits Center （655 W 34th St., New York, NY 10001）</p><p>


                        ■開催日：2018/11/17/ (Sat) 　※Anime NYC開催日程：2018/11/16 (Fri) ～ 2018/11/18/(Sun)
                        </p><p>

                        ■チケット情報：Anime NYCオフィシャルサイトにてご確認ください。http://animenyc.com/tickets/
                        ※Fateスペシャルイベントには、Anime NYCのコンベンションバッジと、その他スペシャルイベントチケットが必要になります。
                        ※Fateスペシャルイベントチケットの販売は、8/15より販売開始。
                        </p>',
      'created_at' => new Datetime,
      'updated_at' => new Datetime,
    ];
});
