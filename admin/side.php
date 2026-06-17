<?php
// Detect current page for active state
$currentPage = basename($_SERVER['PHP_SELF']);

function isActive($files)
{
    global $currentPage;
    if (is_array($files)) {
        return in_array($currentPage, $files) ? ' active' : '';
    }
    return ($currentPage === $files) ? ' active' : '';
}

function isExpanded($files)
{
    global $currentPage;
    return in_array($currentPage, $files) ? ' is-expanded' : '';
}
?>

<aside class="app-sidebar sr-sidebar">
    <style>
        /* Sidebar dark theme overrides */
        .sr-sidebar {
            background: radial-gradient(circle at top left, #0f172a 0, #020617 45%, #020617 100%);
            color: #e5e7eb;
            box-shadow: 4px 0 24px rgba(15, 23, 42, 0.7);
            border-right: 1px solid rgba(148, 163, 184, 0.25);
        }

        .app-sidebar__user {
            padding: 18px 18px 14px;
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
        }

        .app-sidebar__user-name {
            font-size: 13px;
            font-weight: 600;
            color: #e5e7eb;
        }

        .app-sidebar__user-designation {
            font-size: 11px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .app-menu {
            padding: 10px 0 16px;
        }

        .app-menu__item {
            position: relative;
            color: #9ca3af;
            font-size: 13px;
            padding: 10px 18px;
            border-radius: 0;
            border-left: 3px solid transparent;
            transition: background 0.14s ease, color 0.14s ease, border-color 0.14s ease, padding-left 0.14s ease;
        }

        .app-menu__item .app-menu__icon {
            color: #fff;
            margin-right: 10px;
            width: 18px;
            text-align: center;
            transition: color 0.14s ease, transform 0.14s ease;
        }

        .app-menu__label {
            letter-spacing: 0.02em;
        }

        .treeview-indicator {
            color: #4b5563;
            transition: transform 0.16s ease, color 0.14s ease;
        }

        /* Hover state */
        .app-menu__item:hover {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.18), transparent);
            color: #e5e7eb;
            border-left-color: #38bdf8;
            padding-left: 22px;
        }

        .app-menu__item:hover .app-menu__icon {
            color: #38bdf8;
            transform: translateX(1px);
        }

        .app-menu__item:hover .treeview-indicator {
            color: #e5e7eb;
        }

        /* Active state */
        .app-menu__item.active {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.26), rgba(15, 23, 42, 0.95));
            color: #f9fafb;
            border-left-color: #38bdf8;
            font-weight: 600;
            padding-left: 22px;
        }

        .app-menu__item.active .app-menu__icon {
            color: #38bdf8;
        }

        .treeview.is-expanded > a.app-menu__item {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.2), rgba(15, 23, 42, 0.98));
            color: #e5e7eb;
            border-left-color: #38bdf8;
        }

        .treeview.is-expanded > a.app-menu__item .treeview-indicator {
            transform: rotate(90deg);
            color: #e5e7eb;
        }

        /* Child menu */
        .treeview-menu {
            background: rgba(15, 23, 42, 0.96);
            padding: 4px 0 6px;
        }

        .treeview-menu .treeview-item {
            font-size: 12px;
            padding: 7px 40px;
            color: #9ca3af;
            display: block;
            border-left: 2px solid transparent;
            transition: background 0.12s ease, color 0.12s ease, border-color 0.12s ease, padding-left 0.12s ease;
        }

        .treeview-menu .treeview-item .icon {
            font-size: 7px;
            margin-right: 8px;
            color: #4b5563;
        }

        .treeview-menu .treeview-item:hover {
            background: rgba(30, 64, 175, 0.6);
            color: #f9fafb;
            border-left-color: #38bdf8;
            padding-left: 44px;
        }

        .treeview-menu .treeview-item:hover .icon {
            color: #bae6fd;
        }
    </style>

    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">Singhania Admin</p>
            <p class="app-sidebar__user-designation">Admin Panel</p>
        </div>
    </div>

    <ul class="app-menu">
        <!-- Dashboard -->
        <li>
            <a class="app-menu__item<?php echo isActive('dashboard.php'); ?>" href="dashboard.php">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        <!-- Enquiry Master -->
        <li class="treeview<?php echo isExpanded(['enquiry-details.php']); ?>">
            <a class="app-menu__item<?php echo isActive('enquiry-details.php'); ?>" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-phone"></i>
                <span class="app-menu__label">Enquiry Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="enquiry-details.php">
                        <i class="icon fa fa-circle-o"></i> Enquiry Details
                    </a>
                </li>
            </ul>
        </li>

        <!-- Services Master -->
        <li class="treeview<?php echo isExpanded(['add-services.php','services-details.php']); ?>">
            <a class="app-menu__item<?php echo isActive(['add-services.php','services-details.php']); ?>" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Services Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="add-services.php"><i class="icon fa fa-circle-o"></i> Add Services</a></li>
                <li><a class="treeview-item" href="services-details.php"><i class="icon fa fa-circle-o"></i> Services Details</a></li>
            </ul>
        </li>

        <!-- Teams Master -->
        <li class="treeview<?php echo isExpanded(['add-teams.php','teams-details.php']); ?>">
            <a class="app-menu__item<?php echo isActive(['add-teams.php','teams-details.php']); ?>" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Teams Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="add-teams.php"><i class="icon fa fa-circle-o"></i> Add Team</a></li>
                <li><a class="treeview-item" href="teams-details.php"><i class="icon fa fa-circle-o"></i> Teams Details</a></li>
            </ul>
        </li>

        <!-- Configuration Master -->
        <li class="treeview<?php echo isExpanded(['configuration-details.php']); ?>">
            <a class="app-menu__item<?php echo isActive(['configuration-details.php']); ?>" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">Configuration Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="configuration-details.php"><i class="icon fa fa-circle-o"></i> Configuration Details</a></li>
            </ul>
        </li>

        <!-- Pages Master -->
        <li class="treeview<?php echo isExpanded(['menu-details.php','submenu-details.php','banners-details.php']); ?>">
            <a class="app-menu__item<?php echo isActive(['menu-details.php','submenu-details.php','banners-details.php']); ?>" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-files-o"></i>
                <span class="app-menu__label">Pages Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="menu-details.php"><i class="icon fa fa-circle-o"></i> Menu Details</a></li>
                <li><a class="treeview-item" href="submenu-details.php"><i class="icon fa fa-circle-o"></i> SubMenu Details</a></li>
                <li><a class="treeview-item" href="banners-details.php"><i class="icon fa fa-circle-o"></i> Banners Details</a></li>
            </ul>
        </li>

        <!-- Products Master -->
        <li class="treeview<?php echo isExpanded(['add-products.php','products-details.php']); ?>">
            <a class="app-menu__item<?php echo isActive(['add-products.php','products-details.php']); ?>" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cube"></i>
                <span class="app-menu__label">Products Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="add-products.php"><i class="icon fa fa-circle-o"></i> Add Product</a></li>
                <li><a class="treeview-item" href="products-details.php"><i class="icon fa fa-circle-o"></i> Products Details</a></li>
            </ul>
        </li>

        <!-- Blogs Master -->
        <li class="treeview<?php echo isExpanded(['category-details.php','add-blog.php','blogs-details.php']); ?>">
            <a class="app-menu__item<?php echo isActive(['category-details.php','add-blog.php','blogs-details.php']); ?>" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-pencil-square-o"></i>
                <span class="app-menu__label">Blogs Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="category-details.php" rel="noopener"><i class="icon fa fa-circle-o"></i> Category Details</a></li>
                <li><a class="treeview-item" href="add-blog.php" rel="noopener"><i class="icon fa fa-circle-o"></i> Add Blog</a></li>
                <li><a class="treeview-item" href="blogs-details.php"><i class="icon fa fa-circle-o"></i> Blog Details</a></li>
            </ul>
        </li>

        <!-- Training Master -->
        <li class="treeview<?php echo isExpanded(['training-details.php']); ?>">
            <a class="app-menu__item<?php echo isActive(['training-details.php']); ?>" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-graduation-cap"></i>
                <span class="app-menu__label">Training Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="training-details.php"><i class="icon fa fa-circle-o"></i> Training Details</a></li>
            </ul>
        </li>
    </ul>
</aside>
