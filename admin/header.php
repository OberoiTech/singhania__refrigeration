<?php
// header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If you store admin name in session, use it; else fallback text
$adminName  = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Singhania Admin';
$adminEmail = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : '';
?>
<script src="js/jquery-3.2.1.min.js"></script>

<header class="app-header sr-header">
    <!-- Brand / Logo -->
    <a class="app-header__logo sr-logo" href="dashboard.php">
        <!-- <span class="sr-logo-mark">S</span> -->
        <span class="sr-logo-text">
            <span class="sr-logo-sub">Admin Panel</span>
            <span class="sr-logo-main">Singhania</span>
        </span>
    </a>

    <!-- Sidebar toggle -->
    <a class="app-sidebar__toggle sr-toggle" href="#" data-toggle="sidebar" aria-label="Toggle Sidebar">
        <span class="sr-toggle-line"></span>
        <span class="sr-toggle-line"></span>
        <span class="sr-toggle-line"></span>
    </a>

    <!-- Right side nav -->
    <ul class="app-nav sr-nav">
        <!-- Name + email (optional) -->
        <li class="sr-user-meta">
            <span class="sr-user-name"><?php echo htmlspecialchars($adminName); ?></span>
            <?php if (!empty($adminEmail)) : ?>
                <span class="sr-user-email"><?php echo htmlspecialchars($adminEmail); ?></span>
            <?php endif; ?>
        </li>

        <!-- User Menu -->
        <li class="dropdown">
            <a class="app-nav__item sr-avatar-trigger" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <span class="sr-avatar-circle">
                    <i class="fa fa-user"></i>
                </span>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="profile.php">
                        <i class="fa fa-user fa-lg"></i> Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="logout.php">
                        <i class="fa fa-sign-out fa-lg"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>

<style>
/* ===== Local admin icons, independent of external FontAwesome fonts ===== */
.fa::before {
    content: "";
    display: inline-block;
    width: 1em;
    height: 1em;
    vertical-align: -0.14em;
    background: currentColor;
    -webkit-mask: var(--sr-icon, none) center / contain no-repeat;
    mask: var(--sr-icon, none) center / contain no-repeat;
}
.fa-dashboard::before,
.fa-tachometer::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M4 4h7v7H4V4zm9 0h7v7h-7V4zM4 13h7v7H4v-7zm9 0h7v7h-7v-7z'/%3E%3C/svg%3E"); }
.fa-home::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M3 11l9-8 9 8v10h-6v-6H9v6H3V11z'/%3E%3C/svg%3E"); }
.fa-phone::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.8-.4 1.2-.3 1.3.4 2.6.6 4 .6.8 0 1.4.6 1.4 1.4v3.5c0 .8-.6 1.4-1.4 1.4C10.3 22 2 13.7 2 3.4 2 2.6 2.6 2 3.4 2H7c.8 0 1.4.6 1.4 1.4 0 1.4.2 2.7.6 4 .1.4 0 .9-.3 1.2l-2.1 2.2z'/%3E%3C/svg%3E"); }
.fa-envelope-open::before,
.fa-envelope-open-o::before,
.fa-envelope::before,
.fa-envelope-o::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M3 5h18v14H3V5zm9 8.2L5.8 7H5v1.2l7 7 7-7V7h-.8L12 13.2z'/%3E%3C/svg%3E"); }
.fa-graduation-cap::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M12 3L1 8l11 5 9-4.1V17h2V8L12 3zM5 12v4.2c0 1.7 3.1 3.3 7 3.3s7-1.6 7-3.3V12l-7 3.2L5 12z'/%3E%3C/svg%3E"); }
.fa-file-text-o::before,
.fa-file-text::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M6 2h9l5 5v15H6V2zm8 1.8V8h4.2L14 3.8zM8 12h8v2H8v-2zm0 4h8v2H8v-2z'/%3E%3C/svg%3E"); }
.fa-users::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm6 1a5 5 0 0 0-1.5.2A7.5 7.5 0 0 1 17 18v1h5v-1.5A5.5 5.5 0 0 0 16.5 12H15zm-6 1c-4 0-7 2.3-7 5.2V20h14v-1.8C16 15.3 13 13 9 13zm7-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/%3E%3C/svg%3E"); }
.fa-user::before,
.fa-user-o::before,
.fa-user-circle::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0 2c-4.4 0-8 2.4-8 5.4V22h16v-2.6c0-3-3.6-5.4-8-5.4z'/%3E%3C/svg%3E"); }
.fa-files-o::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M5 3h11v4h4v14H5V3zm2 2v14h11V9h-4V5H7zM3 7h2v14h12v2H3V7z'/%3E%3C/svg%3E"); }
.fa-cube::before,
.fa-archive::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M12 2l9 5v10l-9 5-9-5V7l9-5zm0 2.3L6.3 7.5 12 10.7l5.7-3.2L12 4.3zm-7 5v6.5l6 3.3v-6.6L5 9.3zm14 0l-6 3.2v6.6l6-3.3V9.3z'/%3E%3C/svg%3E"); }
.fa-pencil-square-o::before,
.fa-edit::before,
.fa-pencil::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M4 17.2V21h3.8L18.9 9.9l-3.8-3.8L4 17.2zM21.7 7c.4-.4.4-1 0-1.4l-2.3-2.3a1 1 0 0 0-1.4 0l-1.8 1.8L20 8.8 21.7 7z'/%3E%3C/svg%3E"); }
.fa-list::before,
.fa-th-list::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M4 5h4v4H4V5zm6 1h10v2H10V6zM4 10h4v4H4v-4zm6 1h10v2H10v-2zM4 15h4v4H4v-4zm6 1h10v2H10v-2z'/%3E%3C/svg%3E"); }
.fa-plus::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M11 4h2v7h7v2h-7v7h-2v-7H4v-2h7V4z'/%3E%3C/svg%3E"); }
.fa-trash::before,
.fa-trash-o::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M6 7h12l-1 15H7L6 7zm3-4h6l1 2h4v2H4V5h4l1-2z'/%3E%3C/svg%3E"); }
.fa-check-circle::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm-1.2 14.5L6.7 12.4l1.4-1.4 2.7 2.7 5.1-5.2 1.4 1.5-6.5 6.5z'/%3E%3C/svg%3E"); }
.fa-sign-out::before,
.fa-sign-in::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M10 17v-3H3v-4h7V7l5 5-5 5zm2 4v-2h7V5h-7V3h9v18h-9z'/%3E%3C/svg%3E"); }
.fa-lock::before,
.fa-unlock::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M6 10V8a6 6 0 1 1 12 0v2h2v12H4V10h2zm2 0h8V8a4 4 0 0 0-8 0v2z'/%3E%3C/svg%3E"); }
.fa-clock-o::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 5v5l4 2-1 1.7-5-3V7h2z'/%3E%3C/svg%3E"); }
.fa-window-restore::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M4 7h13v13H4V7zm3-3h13v13h-2V6H7V4z'/%3E%3C/svg%3E"); }
.fa-circle-o::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M12 5a7 7 0 1 1 0 14 7 7 0 0 1 0-14zm0 3a4 4 0 1 0 0 8 4 4 0 0 0 0-8z'/%3E%3C/svg%3E"); }
.fa-angle-right::before,
.fa-angle-left::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M9 4l8 8-8 8-2-2 6-6-6-6 2-2z'/%3E%3C/svg%3E"); }
.fa-shield::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M12 2l8 3v6c0 5-3.4 9.4-8 11-4.6-1.6-8-6-8-11V5l8-3z'/%3E%3C/svg%3E"); }
.fa-wrench::before,
.fa-cogs::before { --sr-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M22 6.7l-4.2 4.2-2.7-2.7L19.3 4A6 6 0 0 0 11 11.5L3.3 19.2a2 2 0 1 0 2.8 2.8l7.7-7.7A6 6 0 0 0 22 6.7z'/%3E%3C/svg%3E"); }

/* ===== Top header bar ===== */
.sr-header {
    background: linear-gradient(90deg, #0891b2, #16a34a);
    box-shadow: 0 10px 26px rgba(15, 23, 42, 0.22);
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    display: flex;
    align-items: center;
    padding: 0 18px;
}

/* ===== Logo block ===== */
.sr-logo {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 0;
    background: transparent;
    font-size: 16px;
    text-decoration: none !important;
}

.sr-logo-mark {
    width: 36px;
    height: 36px;
    border-radius: 14px;
    display: grid;
    place-items: center;
    font-weight: 800;
    font-size: 18px;
    color: #0f172a;
    background: radial-gradient(circle at top, #e0f2fe, #ffffff);
    box-shadow:
        0 10px 24px rgba(15, 23, 42, 0.25),
        0 0 0 1px rgba(15, 23, 42, 0.08);
}

.sr-logo-text {
    display: flex;
    flex-direction: column;
    line-height: 1.1;
}

.sr-logo-sub {
    font-size: 11px;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: rgba(226, 232, 240, 0.9);
}

.sr-logo-main {
    font-size: 17px;
    font-weight: 800;
    color: #ffffff;
}

/* ===== Sidebar toggle ===== */
.sr-toggle {
    margin-left: 16px;
    margin-right: auto;
    display: inline-flex;
    flex-direction: column;
    justify-content: center;
    gap: 4px;
    width: 30px;
    height: 30px;
    border-radius: 999px;
    background: rgba(15, 23, 42, 0.14);
    box-shadow: 0 4px 10px rgba(15, 23, 42, 0.3);
}

.sr-toggle::before {
    content: none !important;
    display: none !important;
}

.sr-toggle-line {
    height: 2px;
    width: 16px;
    border-radius: 999px;
    background: #e5f4ff;
    margin: 0 auto;
}

/* ===== Right nav ===== */
.sr-nav {
    display: flex;
    align-items: center;
    margin-left: auto;
}

.sr-user-meta {
    margin-right: 14px;
    text-align: right;
}

.sr-user-name {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #f9fafb;
}

.sr-user-email {
    display: block;
    font-size: 11px;
    color: rgba(226, 232, 240, 0.8);
}

/* Avatar button */
.sr-avatar-trigger {
    padding: 0 0 0 6px;
}

.sr-avatar-circle {
    width: 34px;
    height: 34px;
    border-radius: 999px;
    display: grid;
    place-items: center;
    background: rgba(15, 23, 42, 0.9);
    color: #e5e7eb;
    box-shadow:
        0 8px 18px rgba(15, 23, 42, 0.45),
        0 0 0 1px rgba(15, 23, 42, 0.6);
}

/* Make dropdown a bit nicer */
.settings-menu.dropdown-menu {
    font-size: 13px;
}
.settings-menu .dropdown-item {
    padding: 6px 14px;
}

/* Small screens */
@media (max-width: 576px) {
    .sr-user-meta {
        display: none;
    }
}
</style>
