<?php

if (!isset($active)) {
    $active = 'analytics';
}
?>
<aside class="admin-sidebar" aria-label="Admin navigation">
    <button class="sidebar-toggle btn" type="button" aria-expanded="true" aria-controls="adminSidebarNav"
        onclick="
            const s=document.getElementById('adminSidebarNav');
            const ex=this.getAttribute('aria-expanded')==='true';
            this.setAttribute('aria-expanded', String(!ex));
            s.classList.toggle('collapsed', ex);
          ">
        ☰ Menu
    </button>

    <nav id="adminSidebarNav" class="nav <?php echo ($active ? 'has-active' : ''); ?>">
        <a class="nav-item <?php echo $active === 'analytics' ? 'active' : ''; ?>" href="/admin/analytics.php">
            <span class="ico">📊</span>
            <span class="label">Analytics</span>
            <span class="badge" data-admin-kpi="alerts" title="Status">●</span>
        </a>

        <a class="nav-item <?php echo $active === 'products' ? 'active' : ''; ?>" href="/admin/products.php">
            <span class="ico">🛍️</span>
            <span class="label">Products</span>
            <span class="badge count" id="sb_product_count">0</span>
        </a>

        <a class="nav-item <?php echo $active === 'users' ? 'active' : ''; ?>" href="/admin/users.php">
            <span class="ico">👤</span>
            <span class="label">Users</span>
            <span class="badge count" id="sb_user_count">0</span>
        </a>

        <div class="hr"></div>
        <div class="nav-caption">Shortcuts</div>

        <button class="nav-item btn-link" type="button" onclick="document.dispatchEvent(new CustomEvent('admin:new',{detail:'product'}))">
            <span class="ico">＋</span><span class="label">New product</span>
        </button>
        <button class="nav-item btn-link" type="button" onclick="document.dispatchEvent(new CustomEvent('admin:new',{detail:'user'}))">
            <span class="ico">＋</span><span class="label">New user</span>
        </button>

        <div class="hr"></div>
        <a class="nav-item" href="/index.php" target="_blank" rel="noopener">
            <span class="ico">↗</span><span class="label">View site</span>
        </a>
    </nav>
</aside>

<style>
    
    .admin-sidebar {
        border-right: var(--outline);
        background: rgba(255, 255, 255, .03);
        padding: 12px;
        position: relative
    }

    .admin-sidebar .sidebar-toggle {
        display: none;
        margin-bottom: 8px
    }

    .admin-sidebar .nav {
        display: grid;
        gap: 6px
    }

    .admin-sidebar .nav-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border-radius: 12px;
        border: 1px solid transparent;
        background: transparent;
        color: 
        text-align: left
    }

    .admin-sidebar .nav-item:hover {
        border: var(--outline);
        background: rgba(255, 255, 255, .04)
    }

    .admin-sidebar .nav-item.active {
        border: var(--outline);
        background: linear-gradient(180deg, rgba(198, 163, 79, .18), rgba(198, 163, 79, .10))
    }

    .admin-sidebar .nav-caption {
        color: var(--muted);
        font-weight: 700;
        padding: 6px 2px 2px
    }

    .admin-sidebar .ico {
        width: 24px;
        display: inline-grid;
        place-items: center
    }

    .admin-sidebar .badge {
        margin-left: auto;
        font-size: 11px;
        line-height: 1;
        border-radius: 999px;
        padding: 3px 7px;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .06);
        color: 
    }

    .admin-sidebar .badge.count {
        background: linear-gradient(180deg, rgba(198, 163, 79, .22), rgba(198, 163, 79, .10));
        border-color: rgba(198, 163, 79, .35)
    }

    .admin-sidebar .btn-link {
        border: none;
        background: transparent;
        cursor: pointer
    }

    
    @media(max-width:980px) {
        .admin-sidebar {
            position: sticky;
            top: 58px;
            z-index: 40;
            border-right: none;
            border-bottom: var(--outline);
            background: rgba(0, 0, 0, .35);
            backdrop-filter: blur(8px)
        }

        .admin-sidebar .sidebar-toggle {
            display: inline-block
        }

        .admin-sidebar .nav.collapsed {
            display: none
        }

        .admin-sidebar .nav-item {
            padding: 10px 12px
        }
    }
</style>

<script>
    
    (function() {
        try {
            const raw = localStorage.getItem('heritage_admin_db_v1');
            if (!raw) return;
            const db = JSON.parse(raw);
            const pc = document.getElementById('sb_product_count');
            const uc = document.getElementById('sb_user_count');
            if (pc) pc.textContent = (db.products || []).length;
            if (uc) uc.textContent = (db.users || []).length;
        } catch (e) {}
    })();
</script>