<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Metin2 Pvp Serverler alanında yaklaşık 12 yıldır hizmet veren sitemiz metin2 pvp tanıtımlarını emek, zor, kolay ve farmlık server altında yapmaktadır.">
    <meta name="keywords" content="metin2 pvp, metin2 pvp serverler, metin2 pvp server, pvp sunucu sıralaması">
    <title>Metin2 PvP Serverler - PVP Sunucu Sıralaması</title>
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/metin2pvp.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="main-navbar" id="mainNavbar">
        <div class="container">
            <div class="navbar-inner">
                <a href="/" class="navbar-brand">
                    <span class="brand-text">Metin2<span class="brand-accent">PVP</span></span>
                </a>
                <button class="navbar-toggler" id="navToggler">
                    <span></span><span></span><span></span>
                </button>
                <div class="navbar-menu" id="navbarMenu">
                    <ul class="nav-links">
                        <li><a href="/yeni-sunucular" class="nav-link-item">Yeni Sunucular</a></li>
                        <li><a href="/en-iyi-sunucular" class="nav-link-item">En İyi Sunucular</a></li>
                        <li><a href="/sunucu-ekle" class="nav-link-item">Sunucu Ekle</a></li>
                        <li><a href="/uye-ol" class="nav-link-item">Üye Ol</a></li>
                        <li><a href="/giris" class="nav-link-item">Giriş</a></li>
                    </ul>
                    <div class="nav-right">
                        <div class="nav-notification" id="notifDropdown">
                            <a href="javascript:void(0)" class="nav-link-item notif-trigger" id="notifTrigger">
                                <i class="fa-solid fa-bell"></i>
                                <span class="notif-badge">0</span>
                                Bildirimler
                            </a>
                            <div class="notif-dropdown" id="notifPanel">
                                <div class="notif-header">BİLDİRİMLER</div>
                                <div class="notif-body">
                                    <p class="notif-empty">Bildirim yok.</p>
                                </div>
                                <div class="notif-footer">
                                    <a href="#">Tüm Bildirimleri Gör</a>
                                </div>
                            </div>
                        </div>
                        <a href="/reklam-iletisim" class="nav-link-item">Reklam ve İletişim</a>
                        <div class="nav-lang" id="langDropdown">
                            <a href="javascript:void(0)" class="nav-link-item lang-trigger" id="langTrigger">
                                TR <i class="fa-solid fa-chevron-down"></i>
                            </a>
                            <div class="lang-dropdown" id="langPanel">
                                <a href="?lang=tr" class="lang-option active">TR</a>
                                <a href="?lang=en" class="lang-option">EN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-bg-overlay"></div>
        <div class="container">
            <h1 class="hero-title">PVP SUNUCU SIRALAMASI</h1>
            <div class="search-wrapper">
                <div class="search-bar">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" class="search-input" id="searchInput" placeholder="Ara" autocomplete="off">
                </div>
            </div>
        </div>
    </section>

    <!-- FILTER SECTION -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-wrapper">
                <div class="filter-header" id="filterToggle">
                    <span class="filter-label">Filtre: <strong>Tümü</strong></span>
                    <i class="fa-solid fa-chevron-down filter-arrow"></i>
                </div>
                <div class="filter-body" id="filterBody">
                    <div class="filter-group">
                        <h4 class="filter-group-title">Sunucu Tipi</h4>
                        <div class="filter-pills">
                            <?php foreach ($serverTypes as $i => $type): ?>
                                <button class="filter-pill <?= $i === 0 ? 'active' : '' ?>" data-filter="type" data-value="<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($type) ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="filter-group">
                        <h4 class="filter-group-title">Dil</h4>
                        <div class="filter-pills filter-pills-lang">
                            <?php foreach ($languages as $langGroup): ?>
                                <?php foreach ($langGroup as $lang): ?>
                                    <button class="filter-pill" data-filter="lang" data-value="<?= htmlspecialchars($lang) ?>"><?= htmlspecialchars($lang) ?></button>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VIP SERVERS SECTION -->
    <section class="vip-section">
        <div class="container">
            <div class="vip-grid">
                <?php foreach ($vipServers as $server): ?>
                <div class="server-card vip-card" data-type="<?= htmlspecialchars($server['type']) ?>">
                    <div class="vip-badge">VIP</div>
                    <div class="server-card-banner">
                        <img src="<?= $server['banner'] ?>" alt="<?= htmlspecialchars($server['name']) ?>" loading="lazy">
                        <div class="banner-overlay"></div>
                    </div>
                    <div class="server-card-content">
                        <h2 class="server-name"><?= htmlspecialchars($server['name']) ?></h2>
                        <div class="server-meta">
                            <div class="meta-row">
                                <span class="meta-label">Maks. Seviye:</span>
                                <span class="meta-value"><?= $server['maxLevel'] ?></span>
                            </div>
                            <div class="meta-row">
                                <span class="meta-label">Tip:</span>
                                <span class="meta-value"><?= htmlspecialchars($server['type']) ?></span>
                            </div>
                            <div class="meta-row">
                                <span class="meta-label">Açılış:</span>
                                <span class="meta-value"><?= htmlspecialchars($server['openDate']) ?></span>
                            </div>
                        </div>
                        <div class="server-description">
                            <p><?= htmlspecialchars($server['description']) ?></p>
                        </div>
                        <div class="server-card-footer">
                            <div class="server-comments">
                                <i class="fa-regular fa-comment"></i>
                                <span><?= $server['comments'] ?> Yorumlar</span>
                            </div>
                            <div class="server-stats">
                                <div class="stat-votes">
                                    <i class="fa-solid fa-arrow-up"></i>
                                    <span class="vote-count"><?= $server['votes'] ?></span>
                                </div>
                                <span class="stat-divider">/</span>
                                <div class="stat-clicks">
                                    <i class="fa-solid fa-eye"></i>
                                    <span class="click-count"><?= $server['clicks'] ?></span>
                                </div>
                            </div>
                        </div>
                        <a href="/server/<?= $server['id'] ?>" class="btn-more">Daha Fazla</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- RANKED SERVERS SECTION -->
    <section class="ranked-section">
        <div class="container">
            <?php foreach ($rankedServers as $server): ?>
            <div class="server-card ranked-card" data-type="<?= htmlspecialchars($server['type']) ?>">
                <div class="rank-badge <?= $server['rank'] <= 3 ? 'rank-top' : '' ?>">
                    <span class="rank-label">Sıra</span>
                    <span class="rank-number"><?= $server['rank'] ?></span>
                </div>
                <div class="ranked-card-inner">
                    <div class="ranked-banner">
                        <img src="<?= $server['banner'] ?>" alt="<?= htmlspecialchars($server['name']) ?>" loading="lazy">
                    </div>
                    <div class="ranked-content">
                        <h2 class="server-name"><?= htmlspecialchars($server['name']) ?></h2>
                        <div class="server-meta">
                            <div class="meta-row">
                                <span class="meta-label">Maks. Seviye:</span>
                                <span class="meta-value"><?= $server['maxLevel'] ?></span>
                            </div>
                            <div class="meta-row">
                                <span class="meta-label">Tip:</span>
                                <span class="meta-value"><?= htmlspecialchars($server['type']) ?></span>
                            </div>
                            <div class="meta-row">
                                <span class="meta-label">Açılış:</span>
                                <span class="meta-value"><?= htmlspecialchars($server['openDate']) ?></span>
                            </div>
                        </div>
                        <div class="server-description">
                            <p><?= htmlspecialchars($server['description']) ?></p>
                        </div>
                    </div>
                    <div class="ranked-right">
                        <div class="server-stats-vertical">
                            <div class="stat-votes">
                                <i class="fa-solid fa-arrow-up"></i>
                                <span class="vote-count"><?= $server['votes'] ?></span>
                            </div>
                            <span class="stat-divider">/</span>
                            <div class="stat-clicks">
                                <i class="fa-solid fa-eye"></i>
                                <span class="click-count"><?= $server['clicks'] ?></span>
                            </div>
                        </div>
                        <div class="server-comments">
                            <i class="fa-regular fa-comment"></i>
                            <span><?= $server['comments'] ?> Yorumlar</span>
                        </div>
                        <a href="/server/<?= $server['id'] ?>" class="btn-more">Daha Fazla</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- PAGINATION -->
    <section class="pagination-section">
        <div class="container">
            <div class="pagination-wrapper">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <a href="?page=<?= $i ?>" class="page-btn <?= $i === 1 ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about-section">
        <div class="container">
            <div class="about-card">
                <h2 class="section-title">METIN2PVP - NEDIR O?</h2>
                <div class="about-text">
                    <p>Metin2 Pvp Serverler alanında yaklaşık 12 yıldır hizmet veren sitemiz metin2 pvp tanıtımlarını emek, zor, kolay ve farmlık server altında yapmaktadır. Kendinize ait serveriniz varsa tanıta bilir yada metin2 server arıyorsanız sitemizde bulabilirsiniz!</p>
                </div>
                <div class="featured-highlight">
                    <h3>Bu yeni sunucuyu keşfet!</h3>
                    <div class="featured-meta">
                        <span>Açılış: <strong>13 Şubat 2026</strong></span>
                        <span>Maks. Seviye: <strong>99</strong></span>
                        <span>Tip: <strong>1-99 Zor Emek Server</strong></span>
                    </div>
                    <p class="featured-name">PetraMt2 1-99 PvP SERVER</p>
                    <a href="/server/1" class="btn-more">Daha Fazla</a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-card">
                <h3 class="stats-title">Navigasyon</h3>
                <div class="stats-grid">
                    <?php foreach ($stats as $stat): ?>
                    <div class="stat-item">
                        <span class="stat-label"><?= htmlspecialchars($stat['label']) ?> :</span>
                        <span class="stat-value counter" data-target="<?= $stat['value'] ?>">0</span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4 class="footer-heading">Bağlantılar</h4>
                    <ul class="footer-links">
                        <?php foreach ($footerLinks as $link): ?>
                        <li><a href="<?= $link['url'] ?>"><?= htmlspecialchars($link['text']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="footer-heading">Hızlı Erişim</h4>
                    <ul class="footer-links">
                        <li><a href="/yeni-sunucular"><i class="fa-solid fa-server"></i> Yeni Sunucular</a></li>
                        <li><a href="/en-iyi-sunucular"><i class="fa-solid fa-trophy"></i> En İyi Sunucular</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="footer-heading">Hakkımızda</h4>
                    <p class="footer-about-text">Metin2 PvP Serverler alanında yaklaşık 12 yıldır hizmet veren sitemiz, en güncel sunucu listelerini sizlere sunmaktadır.</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>2024 Tüm Hakları Saklıdır.</p>
            </div>
        </div>
    </footer>

    <!-- STICKY CTA BANNER -->
    <div class="sticky-cta" id="stickyCta">
        <div class="container">
            <div class="cta-inner">
                <p>Sunucunuz henüz bu sıralamada değil?</p>
                <a href="/sunucu-ekle" class="btn-cta">Şimdi Kayıt Ol!</a>
            </div>
        </div>
    </div>

    <!-- LOGIN MODAL -->
    <div class="modal-overlay" id="loginModal">
        <div class="modal-box">
            <button class="modal-close" id="modalClose">&times;</button>
            <h3 class="modal-title">Giriş Yap</h3>
            <form class="modal-form">
                <div class="form-group">
                    <label>Kullanıcı Adı</label>
                    <input type="text" class="form-input" placeholder="Kullanıcı adınız">
                </div>
                <div class="form-group">
                    <label>Şifre</label>
                    <input type="password" class="form-input" placeholder="Şifreniz">
                </div>
                <button type="submit" class="btn-submit">Giriş Yap</button>
            </form>
            <p class="modal-footer-text">Hesabınız yok mu? <a href="/uye-ol">Üye Ol</a></p>
        </div>
    </div>

    <script src="/assets/js/metin2pvp.js"></script>
</body>
</html>
