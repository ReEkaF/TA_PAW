<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="body_light">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar__header">
            <a href="#" class="sidebar__brand">
                <img src="../asset/img/sportease.png" />
            </a>
            <button class="sidebar__toggler">
                <img src="../asset/img/sportease.png" alt="Menu" />
            </button>
        </div>
        <nav class="sidebar__body">
            <ul class="sidebar__menu-list">
                <li class="sidebar__menu-item">
                    <a href="<?= FOLDER_PATH ?>/app/admin/manajemen_produk.php" class="sidebar__menu-link sidebar__menu-link_active">
                        <img src="../asset/img/icons/home-primary.png" alt="Dashboard"/>
                        Dashboard
                    </a>
                </li>
                <li class="sidebar__menu-item">
                    <a href="javascript:void(0)" class="sidebar__menu-link sidebar__menu-link_collapse">
                        <img src="../asset/img/icons/document-black.png" alt="Dashboard" />
                        Manajemen Produk
                        <img src="../asset/img/icons/chevron-right-black.png" alt="See" />
                    </a>
                </li>
                <li class="sidebar__menu-item">
                    <a href="javascript:void(0)" class="sidebar__menu-link sidebar__menu-link_collapse">
                        <img src="../asset/img/icons/copy-document-black.png" alt="Dashboard" />
                        Manajemen Kategori
                        <img src="../asset/img/icons/chevron-right-black.png" alt="See" />
                    </a>
                    
                </li>
                <li class="sidebar__menu-item">
                    <a href="javascript:void(0)" class="sidebar__menu-link sidebar__menu-link_collapse">
                        <img src="../asset/img/icons/flame-black.png" alt="Dashboard" />
                        Transactions
                        <img src="../asset/img/icons/chevron-right-black.png" alt="See" />
                    </a>
                    <ul class="sidebar__menu-list">
                        <li class="sidebar__menu-item">
                            <a href="./transactions/index.html" class="sidebar__menu-link"></a>
                        </li>
                        <li class="sidebar__menu-item">
                            <a href="./transactions/history.html" class="sidebar__menu-link">
                                History
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <a href="./transactions/index.html" class="sidebar__cta">
                View all transactions
                <img src="../asset/img/icons/arrow-right-light.png" alt="See" />
            </a>
        </nav>
    </div>
    <!-- End Sidebar -->
    <div class="page-wrapper">
            <!-- topbar -->
            <div class="topbar">
                <div class="container container_partner topbar__container">
                    <div class="topbar__left">
                    </div>
                    <div class="topbar__right">
                        <a href="#" class="topbar__notification"
                            ><img
                                src="../asset/img/icons/bell.png"
                                alt="Notification"
                        /></a>
                        <div class="topbar__profile">
                            <a
                                href="javascript:void(0)"
                                class="topbar__profile-toggler"
                            >
                                <img
                                    src="../asset/img/profiles/profile-2.png"
                                    alt=""
                                    class="topbar__profile-img"
                                />
                                <span class="topbar__profile-name"
                                    >Muhammad Ali</span
                                >
                                <img
                                    src="../asset/img/icons/chevron-right-black.png"
                                    alt="See"
                                    class="topbar__profile-dropdown-img"
                                />
                            </a>
                            <div class="topbar__profile-menu-list">
                                <a
                                    href="./profile.html"
                                    class="topbar__profile-menu-link"
                                    ><img
                                        src="../asset/img/icons/person-primary.png"
                                        alt=""
                                    />
                                    View profile</a
                                >
                                <a
                                    href="./change-password.html"
                                    class="topbar__profile-menu-link"
                                    ><img
                                        src="../asset/img/icons/lock-primary.png"
                                        alt=""
                                    />
                                    Change password</a
                                >
                                <hr class="topbar__profile-menu-divider" />
                                <a
                                    href="./login.html"
                                    class="topbar__profile-menu-link"
                                    ><img
                                        src="../asset/img/icons/arrow-right-primary.png"
                                        alt=""
                                    />
                                    Logout</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end topbar -->
</body>
</html>
