<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Server::create([
            'hostname' => 'Enes Yerli Tepehan',
            'ip' => '172.28.226.106',
            'name' => 'ott-nds-php-portal-aarslan-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-24'
        ]);

        Server::create([
            'hostname' => 'Ahmet Oğuz Koruyucu',
            'ip' => '172.28.226.108',
            'name' => 'ott-nds-php-portal-soduncu-1',
            'availability' => 'unavailable',
            'available_on' => '2022-06-30'
        ]);

        Server::create([
            'hostname' => 'Ahmet Kutay Karacair',
            'ip' => '172.28.226.109',
            'name' => 'ott-nds-ucaas-portal-msahin-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-13'
        ]);

        Server::create([
            'hostname' => 'Oğuzhan SARI',
            'ip' => '172.28.226.110',
            'name' => 'ott-nds-ucaas-portal-myondem-1',
            'availability' => 'available',
            'available_on' => '2022-07-09'
        ]);
        
        Server::create([
            'hostname' => 'Selçuk BERBER',
            'ip' => '172.28.226.111',
            'name' => 'ott-nds-ucaas-portal-sberber-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-12'
        ]);

        Server::create([
            'hostname' => 'Sevki Oruç/Doğancan Çelik',
            'ip' => '172.28.226.113',
            'name' => 'ott-nds-ucaas-portal-mgulzelsever-1',
            'availability' => 'available',
            'available_on' => '2022-07-26'
        ]);

        Server::create([
            'hostname' => 'Özgür Pir',
            'ip' => '172.28.226.114',
            'name' => 'ott-nds-ucaas-portal-odemir-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-28'
        ]);

        Server::create([
            'hostname' => 'Oğuzhan Osma',
            'ip' => '172.28.226.115',
            'name' => 'ott-nds-php-portal-hkiran-1',
            'availability' => 'unavailable',
            'available_on' => '2022-06-29'
        ]);

        Server::create([
            'hostname' => 'Ataman TELCİ',
            'ip' => '172.28.226.116',
            'name' => 'ott-nds-php-portal-atelci-1',
            'availability' => 'available',
            'available_on' => '2022-07-10'
        ]);

        Server::create([
            'hostname' => 'Yunus Emre Ozan',
            'ip' => '172.28.226.117',
            'name' => 'ott-nds-ucaas-portal-yozan-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-07'
        ]);

        Server::create([
            'hostname' => 'Erdem Salihoğlu',
            'ip' => '172.28.226.118',
            'name' => 'ott-nds-php-portal-esalih-1',
            'availability' => 'unavailable',
            'available_on' => '2022-06-29'
        ]);

        Server::create([
            'hostname' => 'Aykut Hakki YURTMEN',
            'ip' => '172.28.226.120',
            'name' => 'ott-nds-ucaas-portal-ayurtmen-1',
            'availability' => 'unavailable',
            'available_on' => '2022-06-30'
        ]);

        Server::create([
            'hostname' => 'Ubeydullah COBAN',
            'ip' => '172.28.226.121',
            'name' => 'ott-nds-ucaas-portal-ucoban-1',
            'availability' => 'available',
            'available_on' => '2022-07-29'
        ]);

        Server::create([
            'hostname' => 'Muhammed Taha Surmeli',
            'ip' => '172.28.226.124',
            'name' => 'ott-nds-php-portal-msurmeli-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-04'
        ]);

        Server::create([
            'hostname' => 'Umit Demirci',
            'ip' => '172.28.226.125',
            'name' => 'ott-nds-php-portal-akan-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-08'
        ]);

        Server::create([
            'hostname' => 'Faruk KALEDIBI',
            'ip' => '172.28.226.126',
            'name' => 'ott-nds-php-portal-kaledibi-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-11'
        ]);

        Server::create([
            'hostname' => 'Adem Ali Durmuş',
            'ip' => '172.28.226.77',
            'name' => 'ott-nds-ucaas-portal-adurmus-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-21'
        ]);

        Server::create([
            'hostname' => 'Enes Yerli TEPEHAN',
            'ip' => '172.28.226.82',
            'name' => 'ott-nds-php-portal-etepehan-1',
            'availability' => 'available',
            'available_on' => '2022-06-30'
        ]);

        Server::create([
            'hostname' => 'Akın Gündüz',
            'ip' => '172.28.226.89',
            'name' => 'ott-nds-php-portal-agunduz-1',
            'availability' => 'available',
            'available_on' => '2022-08-31'
        ]);

        Server::create([
            'hostname' => 'Serhat Can',
            'ip' => '172.28.226.98',
            'name' => 'ott-nds-ucaas-portal-otasci-1',
            'availability' => 'available',
            'available_on' => '2022-07-31'
        ]);

        Server::create([
            'hostname' => 'Sinan GUL',
            'ip' => '172.28.226.119',
            'name' => 'ott-nds-php-portal-sinang-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-31'
        ]);

        Server::create([
            'hostname' => 'Berna İkiz',
            'ip' => '172.28.226.112',
            'name' => 'ott-nds-ucaas-portal-ogormel-1',
            'availability' => 'available',
            'available_on' => '2022-06-30'
        ]);

        Server::create([
            'hostname' => 'Şeyma Bulut',
            'ip' => '172.28.226.85',
            'name' => 'ott-nds-php-portal-alcelik',
            'availability' => 'unavailable',
            'available_on' => '2022-07-24'
        ]);

        Server::create([
            'hostname' => 'Mert Dündar',
            'ip' => '172.28.226.107',
            'name' => 'ott-nds-php-portal-mdundar-1',
            'availability' => 'unavailable',
            'available_on' => '2022-07-24'
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
