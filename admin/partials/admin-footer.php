<?php

?>
</main>
</div>

<footer class="admin-footer">
    <small>© <?= date('Y') ?> Heritage — Admin Panel</small>
    <div class="spacer"></div>
    <small class="muted">v1.0 (frontend only)</small>
</footer>

<script src="/admin/assets/admin.js"></script>
</body>

</html>

<style>
    .admin-footer {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 16px;
        margin-top: auto;
        border-top: var(--outline);
        background: linear-gradient(180deg, rgba(0, 0, 0, .45), rgba(0, 0, 0, .25));
        backdrop-filter: blur(6px);
        font-size: 12px;
        color: var(--muted)
    }

    .admin-footer .spacer {
        flex: 1
    }
</style>