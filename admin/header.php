<?php
// header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If you store admin name in session, use it; else fallback text
$adminName  = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Singhania Admin';
$adminEmail = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : '';
?>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

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
