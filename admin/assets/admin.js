





(function killMiniCart() {
    const SELECTORS = ['.mini-cart', '
    const nuke = (root = document) => SELECTORS.forEach(s => root.querySelectorAll(s).forEach(el => el.remove()));
    nuke();
    const mo = new MutationObserver(ms => ms.forEach(m => m.addedNodes && m.addedNodes.forEach(n => { if (n.nodeType === 1) nuke(n); })));
    mo.observe(document.documentElement, { childList: true, subtree: true });
    window.addEventListener('click', (e) => { const t = e.target.closest('[data-open="mini-cart"],.open-mini-cart,.cart-trigger,.header-cart'); if (t) { e.preventDefault(); e.stopPropagation(); } }, true);
})();


const DB_KEY = 'heritage_admin_db_v1';

function seedDB() {
    return {
        users: [
            { id: 1, name: 'Amal Perera', email: 'amal@example.com', role: 'admin', status: 'active' },
            { id: 2, name: 'Nilanthi Jayasuriya', email: 'nilanthi@example.com', role: 'artisan', status: 'active' },
            { id: 3, name: 'Ishara Fernando', email: 'ishara@example.com', role: 'customer', status: 'active' }
        ],
        products: [
            { id: 101, name: 'Ambalangoda Mask', sku: 'MASK-001', price: 12000, stock: 8, category: 'Masks', status: 'active' },
            { id: 102, name: 'Handloom Saree', sku: 'HL-044', price: 18500, stock: 5, category: 'Handloom', status: 'active' },
            { id: 103, name: 'Clay Pot', sku: 'CLAY-012', price: 3500, stock: 20, category: 'Pottery', status: 'active' },
            { id: 104, name: 'Beeralu Lace', sku: 'BL-010', price: 5600, stock: 12, category: 'Lace', status: 'hidden' }
        ],
        orders: [
            { id: 'ORD-001', productId: 101, qty: 2, total: 24000, date: '2025-08-20' },
            { id: 'ORD-002', productId: 102, qty: 1, total: 18500, date: '2025-08-22' },
            { id: 'ORD-003', productId: 103, qty: 3, total: 10500, date: '2025-08-25' },
            { id: 'ORD-004', productId: 104, qty: 4, total: 22400, date: '2025-08-27' },
            { id: 'ORD-005', productId: 101, qty: 1, total: 12000, date: '2025-08-28' },
            { id: 'ORD-006', productId: 103, qty: 2, total: 7000, date: '2025-08-30' }
        ],
        nextIds: { user: 4, product: 105 }
    };
}

function dbLoad() {
    const raw = localStorage.getItem(DB_KEY);
    if (!raw) {
        const seed = seedDB();
        localStorage.setItem(DB_KEY, JSON.stringify(seed));
        return seed;
    }
    try { return JSON.parse(raw); }
    catch (e) {
        console.warn('DB parse failed; reseeding', e);
        const seed = seedDB();
        localStorage.setItem(DB_KEY, JSON.stringify(seed));
        return seed;
    }
}
function dbSave(db) { localStorage.setItem(DB_KEY, JSON.stringify(db)); }


window.DB = window.DB || dbLoad();
window.dbSave = dbSave;


(function themeInit() {
    const KEY = 'heritage_admin_theme';
    const saved = localStorage.getItem(KEY);
    if (saved === 'light') document.body.classList.add('light');
    const btn = document.getElementById('themeToggle');
    if (btn) {
        btn.addEventListener('click', () => {
            document.body.classList.toggle('light');
            localStorage.setItem(KEY, document.body.classList.contains('light') ? 'light' : 'dark');
        });
    }
})();





(function quickSearchInit() {
    const form = document.getElementById('adminQuickSearch');
    if (!form) return;
    const input = form.querySelector('input[type="search"], input, [placeholder]');
    const goUsers = (q) => { sessionStorage.setItem('adminQuickSearch', q); location.href = '/admin/users.php'; };
    const goProducts = (q) => { sessionStorage.setItem('adminQuickSearch', q); location.href = '/admin/products.php'; };

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const q = (input && input.value || '').trim();
        if (!q) return;
        if (q.includes('@')) return goUsers(q);
        if (/\d/.test(q) || q.includes('-')) return goProducts(q);
        return goProducts(q);
    });

    
    const carry = sessionStorage.getItem('adminQuickSearch');
    if (carry) {
        
        const box = document.querySelector('
        if (box) { box.value = carry; box.dispatchEvent(new Event('input', { bubbles: true })); }
        sessionStorage.removeItem('adminQuickSearch');
    }
})();


(function sidebarMeta() {
    try {
        const db = window.DB;
        const pc = document.getElementById('sb_product_count');
        const uc = document.getElementById('sb_user_count');
        if (pc) pc.textContent = (db.products || []).length;
        if (uc) uc.textContent = (db.users || []).length;
        const roleLabel = document.getElementById('adminRole');
        if (roleLabel) {
            
            const hasSuper = (db.users || []).some(u => u.role === 'super');
            roleLabel.textContent = hasSuper ? 'Super' : 'Admin';
        }
    } catch (e) { }
})();




document.addEventListener('admin:new', (e) => {
    
    if (e.detail === 'product' && window.PM) { return window.PM.open('create', null); }
    if (e.detail === 'user' && window.UM) { return window.UM.open('create', null); }

    
    if (e.detail === 'user') {
        sessionStorage.setItem('adminIntent', 'new-user'); location.href = '/admin/users.php';
    } else {
        sessionStorage.setItem('adminIntent', 'new-product'); location.href = '/admin/products.php';
    }
});


(function carryIntent() {
    const intent = sessionStorage.getItem('adminIntent');
    if (!intent) return;
    sessionStorage.removeItem('adminIntent');
    if (intent === 'new-user' && window.UM) window.UM.open('create', null);
    if (intent === 'new-product' && window.PM) window.PM.open('create', null);
})();


window.AdminUtils = {
    moneyLK(v) { return 'Rs. ' + Number(v || 0).toLocaleString('en-LK'); },
    
    fmt(d) { return new Date(d).toISOString().slice(0, 10); },
    addDays(d, n) { const x = new Date(d); x.setDate(x.getDate() + n); return x; },
    inRange(iso, from, to) { const t = new Date(iso); return (!from || t >= from) && (!to || t <= to); }
};
