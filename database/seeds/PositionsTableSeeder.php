<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $release_id = 1;

        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '1',
            'position' => '1',
            'title' => '鶏と蛇と豚',
            'artist' => '椎名林檎',
            'length' => '3:02',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '2',
            'position' => '2',
            'title' => '獣ゆく細道',
            'artist' => '椎名林檎と宮本浩次',
            'length' => '3:40',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '3',
            'position' => '3',
            'title' => 'マ・シェリ',
            'artist' => '椎名林檎',
            'length' => '3:38',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '4',
            'position' => '4',
            'title' => '駆け落ち者',
            'artist' => '椎名林檎と櫻井敦司',
            'length' => '3:05',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '5',
            'position' => '5',
            'title' => 'どん底まで',
            'artist' => '椎名林檎',
            'length' => '2:20',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '6',
            'position' => '6',
            'title' => '神様、仏様',
            'artist' => '椎名林檎と向井秀徳',
            'length' => '3:37',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '7',
            'position' => '7',
            'title' => 'ＴＯＫＹＯ',
            'artist' => '椎名林檎',
            'length' => '3:43',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
                'type' => 'track',
                'order' => '8',
                'position' => '8',
                'title' => '長く短い祭',
                'artist' => '椎名林檎と浮雲',
                'length' => '4:09',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
                'type' => 'track',
                'order' => '9',
                'position' => '9',
                'title' => '至上の人生',
                'artist' => '椎名林檎',
                'length' => '4:08',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '10',
            'position' => '10',
            'title' => '急がば回れ',
            'artist' => '椎名林檎とヒイズミマサユ機',
            'length' => '2:56',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '11',
            'position' => '11',
            'title' => 'ジユーダム',
            'artist' => '椎名林檎',
            'length' => '2:56',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '12',
            'position' => '12',
            'title' => '目抜き通り',
            'artist' => '椎名林檎とトータス松本',
            'length' => '3:13',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '13',
            'position' => '13',
            'title' => 'あの世の門',
            'artist' => '椎名林檎',
            'length' => '3:01',
        ]);

        $release_id = 2;

        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'head',
            'order' => '1',
            'title' => 'DISC-1 35 38 52 9000 / 139 41 39 3000',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '2',
            'position' => '1',
            'title' => '忘れられないの',
            'length' => '3:58',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '3',
            'position' => '2',
            'title' => 'マッチとピーナッツ',
            'length' => '4:30',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '4',
            'position' => '3',
            'title' => '陽炎',
            'length' => '4:33',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '5',
            'position' => '4',
            'title' => '多分、風。',
            'length' => '4:52',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '6',
            'position' => '5',
            'title' => '新宝島',
            'length' => '5:05',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '7',
            'position' => '6',
            'title' => 'モス',
            'length' => '4:05',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '8',
            'position' => '7',
            'title' => '「聴きたかったダンスミュージック、リキッドルームに」',
            'length' => '3:56',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '9',
            'position' => '8',
            'title' => 'ユリイカ (Shotaro Aoy ama Remix)',
            'length' => '6:40',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '10',
            'position' => '9',
            'title' => 'セプテンバー',
            'subtitle' => '-東京 version-',
            'length' => '4:54',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'head',
            'order' => '11',
            'title' => 'DISC-2 43 03 18 9000 / 141 19 17 5000',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '12',
            'position' => '1',
            'title' => 'グッドバイ',
            'length' => '4:43',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '13',
            'position' => '2',
            'title' => '蓮の花',
            'subtitle' => '-single version-',
            'length' => '4:45',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '14',
            'position' => '3',
            'title' => 'ユリイカ',
            'length' => '5:37',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '15',
            'position' => '4',
            'title' => 'ナイロンの糸',
            'length' => '5:08',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '16',
            'position' => '5',
            'title' => '茶柱',
            'length' => '3:46',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '17',
            'position' => '6',
            'title' => 'ワンダーランド',
            'length' => '4:54',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '18',
            'position' => '7',
            'title' => 'さよならはエモーション',
            'length' => '4:19',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '19',
            'position' => '8',
            'title' => '834.194',
            'length' => '7:11',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '20',
            'position' => '9',
            'title' => 'セプテンバー',
            'subtitle' => '-札幌 version-',
            'length' => '5:38',
        ]);
        
        $release_id = 3;

        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'index',
            'order' => '1',
            'position' => '0',
            'title' => '隠しトラック',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'subtrack',
            'order' => '2',
            'title' => 'ドッキング',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'subtrack',
            'order' => '3',
            'title' => 'Danny',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'subtrack',
            'order' => '4',
            'title' => 'My Best Friends',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '5',
            'position' => '1',
            'title' => 'ガラスのブルース',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '6',
            'position' => '2',
            'title' => 'くだらない唄',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '7',
            'position' => '3',
            'title' => 'アルエ',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '8',
            'position' => '4',
            'title' => 'リトルブレイバー',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '9',
            'position' => '5',
            'title' => 'ノーヒットノーラン',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '10',
            'position' => '6',
            'title' => 'とっておきの唄',
        ]);
        DB::table('positions')->insert([
            'release_id' => $release_id,
            'type' => 'track',
            'order' => '11',
            'position' => '7',
            'title' => 'ナイフ',
        ]);
    }
}
