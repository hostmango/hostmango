<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $data = [];

        // VIP Servers
        $data['vipServers'] = [
            [
                'id'          => 1,
                'name'        => 'PETRAMT2 1-99 PVP SERVER',
                'slug'        => 'petramt2',
                'maxLevel'    => 99,
                'type'        => '1-99 Zor Emek Server',
                'openDate'    => '13 Şubat 2026',
                'comments'    => 0,
                'votes'       => '17.249',
                'clicks'      => '23.746',
                'description' => 'PetraMt2 1-99 PvP SERVER',
                'banner'      => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=340&fit=crop',
                'images'      => [],
            ],
            [
                'id'          => 2,
                'name'        => 'LOVAMT2 1-105 PVP SERVER',
                'slug'        => 'lovamt2',
                'maxLevel'    => 105,
                'type'        => '1-105 Emek Server',
                'openDate'    => '24 Ekim 2025',
                'comments'    => 0,
                'votes'       => '17.793',
                'clicks'      => '32.035',
                'description' => 'LovaMt2 1-105 Oyun Yapısı İle Açılıyor !',
                'banner'      => 'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=600&h=340&fit=crop',
                'images'      => [],
            ],
            [
                'id'          => 3,
                'name'        => 'ROHAN2 - 1-120 GLOBAL SERVER',
                'slug'        => 'rohan2',
                'maxLevel'    => 120,
                'type'        => '1-120 Global Server',
                'openDate'    => '18 Temmuz 2025',
                'comments'    => 0,
                'votes'       => '5.036',
                'clicks'      => '21.841',
                'description' => 'Rohan2 (1-120) Sunucuları Birleşti! Hemen kayıt ol ve indir! Yeni Sunucu YOK!',
                'banner'      => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=600&h=340&fit=crop',
                'images'      => [],
            ],
            [
                'id'          => 4,
                'name'        => 'LOVAMT2 1-105 OTO AVSIZ !',
                'slug'        => 'lovamt2-2',
                'maxLevel'    => 105,
                'type'        => '1-105 Emek Server',
                'openDate'    => '21 Mart 2025',
                'comments'    => 2,
                'votes'       => '10.218',
                'clicks'      => '28.698',
                'description' => 'Metin2 PvP Serverler öncüsü LovaMt2\'yi hemen oyna !',
                'banner'      => 'https://images.unsplash.com/photo-1552820728-8b83bb6b2b28?w=600&h=340&fit=crop',
                'images'      => [],
            ],
            [
                'id'          => 5,
                'name'        => 'KAFALAR METIN2 1 - 99 L 2008 TARZI EMEK SERVER',
                'slug'        => 'kafalar-metin2',
                'maxLevel'    => 99,
                'type'        => '1-99 Zor Emek Server',
                'openDate'    => '19 Aralık 2025',
                'comments'    => 24,
                'votes'       => '19.704',
                'clicks'      => '48.096',
                'description' => 'Kafalar Metin2 1-105 Emek Server , Yeni açıldı ! Hemen ÜCRETSİZ OYNA !',
                'banner'      => 'https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=600&h=340&fit=crop',
                'images'      => [],
            ],
            [
                'id'          => 6,
                'name'        => 'USBMT2 1-105 PVP SERVER',
                'slug'        => 'usbmt2',
                'maxLevel'    => 105,
                'type'        => '1-105 Emek Server',
                'openDate'    => '06 Şubat 2026',
                'comments'    => 0,
                'votes'       => '32.329',
                'clicks'      => '66.677',
                'description' => 'UsbMt2 1-105 PvP SERVER',
                'banner'      => 'https://images.unsplash.com/photo-1535223289827-42f1e9919769?w=600&h=340&fit=crop',
                'images'      => [],
            ],
        ];

        // Ranked Servers
        $data['rankedServers'] = [
            [
                'id'          => 7,
                'rank'        => 1,
                'name'        => 'MIAMT2',
                'slug'        => 'miamt2',
                'maxLevel'    => 105,
                'type'        => 'VSLİK Server',
                'openDate'    => '17 Ocak 2026',
                'comments'    => 5,
                'votes'       => '217',
                'clicks'      => '538',
                'description' => '105 Level MiaMt2 | Kostüm yok, market yok! Tamamen WS\'lik, adil rekabet, saf nostalji ve gerçek Metin2 heyecanı',
                'banner'      => 'https://images.unsplash.com/photo-1542751110-97427bbecf20?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 8,
                'rank'        => 2,
                'name'        => '🐬SULTANMT2🐬20.02.2026',
                'slug'        => 'sultanmt2',
                'maxLevel'    => 120,
                'type'        => 'VSLİK Server',
                'openDate'    => '20 Şubat 2026',
                'comments'    => 0,
                'votes'       => '2',
                'clicks'      => '6',
                'description' => '🐬SULTANMT2🐬20.02.2026',
                'banner'      => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 9,
                'rank'        => 3,
                'name'        => 'REVENGE2 | EP SATIŞI YOK EMEK SERVER',
                'slug'        => 'revenge2',
                'maxLevel'    => 99,
                'type'        => '1-99 Zor Emek Server',
                'openDate'    => '13 Şubat 2026',
                'comments'    => 0,
                'votes'       => '51',
                'clicks'      => '1',
                'description' => 'Ep satışsız emek server',
                'banner'      => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 10,
                'rank'        => 4,
                'name'        => 'YARRA2',
                'slug'        => 'yarra2',
                'maxLevel'    => 31,
                'type'        => 'VSLİK Server',
                'openDate'    => '15 Şubat 2026',
                'comments'    => 0,
                'votes'       => '1',
                'clicks'      => '5',
                'description' => '1 lvl başla 31 lvl bitir yeni tarz',
                'banner'      => 'https://images.unsplash.com/photo-1509198397868-475647b2a1e5?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 11,
                'rank'        => 5,
                'name'        => 'VALERIN2',
                'slug'        => 'valerin2',
                'maxLevel'    => 99,
                'type'        => '1-99 Zor Emek Server',
                'openDate'    => '27 Şubat 2026',
                'comments'    => 0,
                'votes'       => '1',
                'clicks'      => '3',
                'description' => 'Valerin2 1-99 Hard-Emek',
                'banner'      => 'https://images.unsplash.com/photo-1614294149010-950b698f72c0?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 12,
                'rank'        => 6,
                'name'        => 'VALERIN2',
                'slug'        => 'valerin2-2',
                'maxLevel'    => 99,
                'type'        => '1-99 Zor Emek Server',
                'openDate'    => '27 Şubat 2026',
                'comments'    => 1,
                'votes'       => '1',
                'clicks'      => '4',
                'description' => 'Valerin2 1-99 Hardschool 27 ŞUBAT CUMA 21:00',
                'banner'      => 'https://images.unsplash.com/photo-1614294149010-950b698f72c0?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 13,
                'rank'        => 7,
                'name'        => 'DESTAN2 OFFICIAL 65-250 PVP SERVER YENI AÇILDI !',
                'slug'        => 'destan2',
                'maxLevel'    => 250,
                'type'        => '65-250 PvP Server',
                'openDate'    => '06 Şubat 2026',
                'comments'    => 0,
                'votes'       => '0',
                'clicks'      => '13',
                'description' => 'Destan2 yüksek online sayısı ile artık sizlerle! Tüm oyuncularımıza hayırlı ve keyifli oyunlar dileriz.',
                'banner'      => 'https://images.unsplash.com/photo-1560419015-7c427e8ae5ba?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 14,
                'rank'        => 8,
                'name'        => '1-99 KOLAY EMEK SERVER NESNE MARKET YOK TR DE TEK',
                'slug'        => 'kolay-emek',
                'maxLevel'    => 99,
                'type'        => '1-99 Zor Emek Server',
                'openDate'    => '09 Şubat 2026',
                'comments'    => 0,
                'votes'       => '1',
                'clicks'      => '19',
                'description' => 'Kolay 1-99 emek sunucusu 1 günde 90 LVL olabilirsiniz. Sıkıcı olmayan dengeli farm sistemi. NESNE MARKET YOKTUR AÇILMAZ',
                'banner'      => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 15,
                'rank'        => 9,
                'name'        => 'EMEKMT2 SITE :WWW.EMEK.METIN2.IN',
                'slug'        => 'emekmt2',
                'maxLevel'    => 99,
                'type'        => '1-99 Zor Emek Server',
                'openDate'    => '02 Şubat 2026',
                'comments'    => 2,
                'votes'       => '73',
                'clicks'      => '296',
                'description' => '1-99 ORTA-KOLAY EMEK SERVER. FARM&WS',
                'banner'      => 'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=400&h=230&fit=crop',
            ],
            [
                'id'          => 16,
                'rank'        => 10,
                'name'        => 'NEXUS2',
                'slug'        => 'nexus2',
                'maxLevel'    => 120,
                'type'        => '1-120 Global Server',
                'openDate'    => '20 Şubat 2026',
                'comments'    => 0,
                'votes'       => '1',
                'clicks'      => '42',
                'description' => '55-120 ORTA EMEK NEXUS2',
                'banner'      => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=400&h=230&fit=crop',
            ],
        ];

        // Server type filters
        $data['serverTypes'] = [
            'Tümü',
            '1-120 PvP Server',
            '1-105 Emek Server',
            '1-99 Zor Emek Server',
            '1-120 Global Server',
            '65-250 PvP Server',
            'VSLİK Server',
        ];

        // Language filters
        $data['languages'] = [
            ['English', 'German', 'Romanian', 'Turkish', 'Portuguese', 'French', 'Italian', 'Polish'],
            ['Spanish', 'Hungarian', 'Czech', 'Avestan', 'Danish', 'Greek', 'Dutch', 'Russian'],
        ];

        // Stats
        $data['stats'] = [
            ['label' => 'Sunucu Sayısı', 'value' => 156],
            ['label' => 'Yorum Sayısı', 'value' => 342],
            ['label' => 'Beğeni Sayısı', 'value' => 1205],
            ['label' => 'Link Sayısı', 'value' => 89],
            ['label' => 'Günlük Ziyaretçi', 'value' => 2450],
            ['label' => 'Haftalık Ziyaretçi', 'value' => 15800],
        ];

        // Footer links
        $data['footerLinks'] = [
            ['text' => 'Reklam ve İletişim', 'url' => '/reklam-iletisim'],
            ['text' => 'Blog', 'url' => '/blog'],
            ['text' => 'Metin2 GameMaster (GM) Kodları', 'url' => '#'],
            ['text' => 'Metin2 PvP Server nedir ?', 'url' => '#'],
            ['text' => 'Metin2 Simya Nedir ?', 'url' => '#'],
            ['text' => 'Yohara Nedir ? - Metin2', 'url' => '#'],
            ['text' => 'Metin2 Boss Kodları 2024 - Metin2 PvP Boss kodları', 'url' => '#'],
            ['text' => 'Metin2 Oto Tuş İndir ( 2025 ) Güvenli !', 'url' => '#'],
            ['text' => 'Metin2 PvP indir', 'url' => '#'],
        ];

        return view('frontend/home', $data);
    }

    public function yeniSunucular()
    {
        return $this->index();
    }

    public function enIyiSunucular()
    {
        return $this->index();
    }

    public function sunucuEkle()
    {
        return $this->index();
    }

    public function uyeOl()
    {
        return $this->index();
    }

    public function giris()
    {
        return $this->index();
    }

    public function reklamIletisim()
    {
        return $this->index();
    }

    public function blog()
    {
        return $this->index();
    }

    public function serverDetay($id = null)
    {
        return $this->index();
    }
}
