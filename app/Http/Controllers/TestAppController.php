<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\helpers\CodexToHtml;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Activity\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\ConnectedAccount;
use UniSharp\LaravelFilemanager\LfmPath;
use GuzzleHttp\Client;

class TestAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $block = array(
            'time' => 1610781113908,
            'blocks' =>
            array(
                0 =>
                array(
                    'type' => 'inlineImage',
                    'data' =>
                    array(
                        'url' => 'https://cdn1-production-images-kly.akamaized.net/6u6tYtb5Z0-U1zcxViND2ywtYps=/640x358/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3345042/original/060062100_1610258217-20210110-Serpihan-Pesawat-Sriwijaya-Air-SJ-182-8.jpg',
                        'caption' => 'Serpihan pesawat Sriwijaya Air SJ 182 yang dibawa KRI Kurau ditunjukkan di Dermaga JICT 2, Jakarta, Minggu (10/1/2021). Tim SAR Kopaska TNI AL menyerahkan serpihan pesawat Sriwijaya Air SJ 182 yang berhasil dievakuasi ke Basarnas, Kepolisian, dan KNKT. (Liputan6.com/Helmi Fithriansyah)',
                        'withBorder' => false,
                        'withBackground' => false,
                        'stretched' => false,
                    ),
                ),
                1 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => 'Liputan6.com, Jakarta Tim SAR gabungan melakukan perluasan pemantauan lewat udara terhadap korban dan puing pesawat jatuh Sriwijaya Air SJ 182. Hal itu menyesuaikan dengan kondisi pencarian yang telah memasuki hari ke delapan.',
                        'alignment' => 'left',
                    ),
                ),
                2 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => '"Karena itu bisa ada objek-objek pencarian yang terbawa arus, karenanya kita tetap memperluas. Terutama di sekitar Pulau Lancang, Pulau Laki, Pulau Bokor, Pulau Rambut, Pulau Untung Jawa, kemudian Tanjung Kait, dan sepanjang pantai utara," tutur Direktur Operasional Basarnas Rasman di JICT 2 Tanjung Priok, Jakarta Utara, Sabtu (16/1/2021).',
                        'alignment' => 'left',
                    ),
                ),
                3 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => 'Rasman menyebut, tim memetakan lokasi perluasan pencarian korban dan puing Sriwijaya Air dari udara dengan membaca arah angin. Sebab itu, wilayah pantai juga menjadi objek pengawasan.',
                        'alignment' => 'left',
                    ),
                ),
                4 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => '"Kemungkinan ada yang terbawa arus ke arah pantai, karena angin selama beberapa hari ini dari utara ke selatan," jelasnya. ',
                        'alignment' => 'left',
                    ),
                ),
                5 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => 'Sebelumnya, Tim Disaster Victim Identification (DVI) Polri kembali mengidentifikasi lima korban pesawat Sriwijaya Air PK SJ 182 dengan rute Jakarta-Pontianak, pada Jumat 15 Januari 2021.',
                        'alignment' => 'left',
                    ),
                ),
                6 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => '"Hari ini berhasil identifikasi korban sebanyak lima korban," tutur Karo Penmas Divisi Humas Polri Brigjen Rusdi Hartono terkait korban Sriwijaya Air SJ 182 di RS Bhayangkara Polri, Kramat Jati, Jakarta Timur, Jumat sore kemarin.',
                        'alignment' => 'left',
                    ),
                ),
                7 =>
                array(
                    'type' => 'header',
                    'data' =>
                    array(
                        'text' => 'Sampel DNA Sudah 62 Orang',
                        'level' => 2,
                    ),
                ),
                8 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => 'Rusdi merinci, lima korban yang berhasil diidentifikasi hari ini adalah Toni Ismail (59), Dinda Amelia (15), Isti Yudha Prastika (34), Putri Wahyuni (25), dan Rahmawati (59).',
                        'alignment' => 'left',
                    ),
                ),
                9 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => '"Tim menerima 155 kantong jenazah. Sampel DNA sudah untuk 62 korban, jadi sudah lengkap sampel DNA untuk seluruh korban. Sampel DNA sudah 140 sample DNA," jelas Rusdi.',
                        'alignment' => 'left',
                    ),
                ),
                10 =>
                array(
                    'type' => 'paragraph',
                    'data' =>
                    array(
                        'text' => 'Dengan penambahan lima tersebut, maka total jenazah korban Sriwijaya Air SJ 182 yang berhasil diidentifikasi sudah berjumlah 17 korban.',
                        'alignment' => 'left',
                    ),
                ),
            ),
            'version' => '2.19.1',
        );

        $content = CodexToHtml::instance()->generateHtmlOutput(json_encode($block));

        // return view('news', ['content' => $content]);
        //$role = Role::findByName('Admin');
        //$permission = Permission::create(['name' => 'edit articles']);

        //return $role->givePermissionTo('edit articles');
        //$permission->assignRole($role);
        // return Activity::all();

        // for ($i = 0; $i < 50; $i++) {
        //     $user = \App\Models\User::factory()->create();
        //     $user->syncRoles(['Guest']);
        //     $user = '';
        // }
        //$user = Auth::user()->bans;
        // $user->ban([
        //     'comment' => 'Enjoy your ban!',
        //     'expired_at' => '+1 minute',
        // ]);

        //dump($user);

        // $admin = Role::findByName('Admin', 'web');
        // $name_permissions = ['Permission', 'Role'];
        // foreach ($name_permissions as $key => $value) {
        //     foreach (['View', 'Create', 'Update', 'Show', 'Delete', 'Restore', 'Destroy'] as $keyname => $valuename) {
        //         ${strtolower($valuename) . '_' . strtolower($value)} = Permission::create(['name' => $valuename . ' ' . ucwords(strtolower($value)), 'guard_name' => 'web']);
        //         $admin->givePermissionTo(${strtolower($valuename) . '_' . strtolower($value)});
        //         ${strtolower($valuename) . '_' . strtolower($value)}->assignRole($admin);
        //     }
        // }
        // dump("oke");

        // $appNamespace = Container::getInstance()->getNamespace();
        // $modelNamespace = 'Models';

        // $models = collect(File::allFiles(app_path($modelNamespace)))->map(function ($item) use ($appNamespace, $modelNamespace) {
        //     $rel   = $item->getRelativePathName();
        //     $class = sprintf(
        //         '\%s%s%s',
        //         $appNamespace,
        //         $modelNamespace ? $modelNamespace . '\\' : '',
        //         implode('\\', explode('/', substr($rel, 0, strrpos($rel, '.'))))
        //     );
        //     return class_exists($class) ? $class : null;
        // })->filter(
        //     function ($model) {
        //         return !is_subclass_of($model, Illuminate\Database\Eloquent\Model::class);
        //     }
        // );

        // dump($models);
        // $user = new ConnectedAccount;
        // $models = collect($user->getConnection()->getSchemaBuilder()->getColumnListing($user->getTable()))->map(function ($item) use ($user) {
        //     $types = (object) [];
        //     $types->type = $user->getConnection()->getSchemaBuilder()->getColumnType($user->getTable(), $item);
        //     $types->name = $item;
        //     return $types;
        // })->filter(
        //     function ($model) {
        //         return (in_array($model->type, ['tinyint', 'smallint', 'mediumint', 'int', 'bigint', 'bit']));
        //     }
        // );

        //dump(Carbon::parse('December'));

        $url = 'https://assets.jalantikus.com/assets/cache/429/349/userfiles/2020/11/25/Cara-Cek-Tagihan-First-Media-1-8e6d3.jpg.webp';

        $client = new Client();
        $res = $client->request('GET', $url);

        dump($res->getBody()->getContents());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
