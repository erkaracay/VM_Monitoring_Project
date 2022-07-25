<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory(16)->create();

        Server::create([
            'ip' => '172.28.226.106',
            'name' => 'ott-nds-php-portal-aarslan-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Suphi Erkin Karaçay',
            'ip' => '127.0.0.1',
            'name' => 'ott-nds-php-portal-skaracay-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Ahmet Oğuz Koruyucu',
            'ip' => '172.28.226.108',
            'name' => 'ott-nds-php-portal-soduncu-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Ahmet Kutay Karacair',
            'ip' => '172.28.226.109',
            'name' => 'ott-nds-ucaas-portal-msahin-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Oğuzhan SARI',
            'ip' => '172.28.226.110',
            'name' => 'ott-nds-ucaas-portal-myondem-1',
            'user_id' => null
        ]);
        
        Server::create([
            // 'hostname' => 'Selçuk BERBER',
            'ip' => '172.28.226.111',
            'name' => 'ott-nds-ucaas-portal-sberber-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Sevki Oruç/Doğancan Çelik',
            'ip' => '172.28.226.113',
            'name' => 'ott-nds-ucaas-portal-mgulzelsever-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Özgür Pir',
            'ip' => '172.28.226.114',
            'name' => 'ott-nds-ucaas-portal-odemir-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Oğuzhan Osma',
            'ip' => '172.28.226.115',
            'name' => 'ott-nds-php-portal-hkiran-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Ataman TELCİ',
            'ip' => '172.28.226.116',
            'name' => 'ott-nds-php-portal-atelci-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Yunus Emre Ozan',
            'ip' => '172.28.226.117',
            'name' => 'ott-nds-ucaas-portal-yozan-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Erdem Salihoğlu',
            'ip' => '172.28.226.118',
            'name' => 'ott-nds-php-portal-esalih-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Aykut Hakki YURTMEN',
            'ip' => '172.28.226.120',
            'name' => 'ott-nds-ucaas-portal-ayurtmen-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Ubeydullah COBAN',
            'ip' => '172.28.226.121',
            'name' => 'ott-nds-ucaas-portal-ucoban-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Muhammed Taha Surmeli',
            'ip' => '172.28.226.124',
            'name' => 'ott-nds-php-portal-msurmeli-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Umit Demirci',
            'ip' => '172.28.226.125',
            'name' => 'ott-nds-php-portal-akan-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Faruk KALEDIBI',
            'ip' => '172.28.226.126',
            'name' => 'ott-nds-php-portal-kaledibi-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Adem Ali Durmuş',
            'ip' => '172.28.226.77',
            'name' => 'ott-nds-ucaas-portal-adurmus-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Enes Yerli TEPEHAN',
            'ip' => '172.28.226.82',
            'name' => 'ott-nds-php-portal-etepehan-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Akın Gündüz',
            'ip' => '172.28.226.89',
            'name' => 'ott-nds-php-portal-agunduz-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Serhat Can',
            'ip' => '172.28.226.98',
            'name' => 'ott-nds-ucaas-portal-otasci-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Sinan GUL',
            'ip' => '172.28.226.119',
            'name' => 'ott-nds-php-portal-sinang-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Berna İkiz',
            'ip' => '172.28.226.112',
            'name' => 'ott-nds-ucaas-portal-ogormel-1',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Şeyma Bulut',
            'ip' => '172.28.226.85',
            'name' => 'ott-nds-php-portal-alcelik',
            'user_id' => null
        ]);

        Server::create([
            // 'hostname' => 'Mert Dündar',
            'ip' => '172.28.226.107',
            'name' => 'ott-nds-php-portal-mdundar-1',
            'user_id' => null
        ]);
        

    }
}
