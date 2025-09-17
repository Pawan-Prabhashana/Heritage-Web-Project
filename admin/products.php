<?php

define('HERITAGE_ADMIN', true);
$admin_title = 'Admin • Products';
$active      = 'products';
include __DIR__ . '/partials/admin-header.php';
?>

<style>
    
    .toolbar {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 12px
    }

    .search {
        display: flex;
        gap: 8px;
        align-items: center;
        border: var(--outline);
        border-radius: 12px;
        padding: 8px 10px;
        background: rgba(255, 255, 255, .04)
    }

    .search input {
        background: transparent;
        border: 0;
        outline: none;
        color: 
        font: inherit;
        width: 220px
    }

    .select {
        border: var(--outline);
        border-radius: 10px;
        background: transparent;
        color: 
        padding: 8px 10px
    }

    .btn {
        cursor: pointer;
        border: var(--outline);
        background: transparent;
        color: 
        padding: 10px 12px;
        border-radius: 12px
    }

    .btn-gold {
        background: linear-gradient(180deg, rgba(198, 163, 79, .30), rgba(198, 163, 79, .14));
        border: 1px solid rgba(198, 163, 79, .5)
    }

    .btn-danger {
        background: linear-gradient(180deg, rgba(255, 80, 80, .18), rgba(255, 80, 80, .10));
        border: 1px solid rgba(255, 80, 80, .5)
    }

    .btn-ghost {
        border: none
    }

    .panel {
        border: var(--outline);
        border-radius: 16px;
        background: linear-gradient(180deg, rgba(255, 255, 255, .05), rgba(255, 255, 255, .02));
        box-shadow: var(--shadow)
    }

    .panel header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 14px;
        border-bottom: 1px solid rgba(255, 255, 255, .06)
    }

    .panel header h3 {
        margin: 0
    }

    .panel .content {
        padding: 12px 14px
    }

    .table {
        width: 100%;
        border-collapse: collapse
    }

    .table th,
    .table td {
        padding: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, .08);
        text-align: left
    }

    .table th {
        color: var(--muted);
        font-weight: 600;
        user-select: none;
        cursor: pointer
    }

    .row-actions {
        display: flex;
        gap: 6px
    }

    .badge {
        display: inline-block;
        font-size: 11px;
        padding: 3px 7px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .06)
    }

    .empty {
        padding: 28px;
        text-align: center;
        color: var(--muted)
    }

    
    .modal-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .45);
        backdrop-filter: blur(4px);
        display: none;
        place-items: center;
        z-index: 50
    }

    .modal {
        width: min(720px, 92%);
        max-height: 86vh;
        overflow: auto;
        border: var(--outline);
        border-radius: 18px;
        background: var(--panel);
        box-shadow: var(--shadow);
        padding: 14px
    }

    .modal header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px
    }

    .modal .grid {
        display: grid;
        gap: 10px;
        grid-template-columns: 1fr 1fr
    }

    @media(max-width:720px) {
        .modal .grid {
            grid-template-columns: 1fr
        }
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 6px
    }

    .field input,
    .field select,
    .field textarea {
        border: var(--outline);
        border-radius: 12px;
        background: transparent;
        color: 
        padding: 10px 12px;
        outline: none
    }

    .field small.hint {
        color: var(--muted)
    }

    .modal footer {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: flex-end;
        margin-top: 12px
    }

    .invalid {
        border-color: rgba(255, 120, 120, .65) !important;
        box-shadow: 0 0 0 2px rgba(255, 120, 120, .22) inset
    }

    .pill {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .06);
        font-size: 12px
    }

    
    .name-wrap {
        display: flex;
        align-items: center;
        gap: 8px
    }

    .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: 
        border: 1px solid rgba(255, 255, 255, .22)
    }

    .dot.hidden {
        background: 
    }
</style>

<section class="panel">
    <header>
        <h3>Products</h3>
        <div class="toolbar">
            <div class="search">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M21 21l-3.8-3.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                    <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6" />
                </svg>
                <input type="search" id="q" placeholder="Search name, SKU…">
            </div>
            <select class="select" id="filterCat">
                <option value="">All categories</option>
            </select>
            <select class="select" id="filterStatus">
                <option value="">All status</option>
                <option value="active">Active</option>
                <option value="hidden">Hidden</option>
            </select>
            <button class="btn" id="clearFilters">Clear</button>
            <div style="width:12px"></div>
            <button class="btn btn-gold" id="addProduct">＋ Add product</button>
        </div>
    </header>
    <div class="content">
        <div class="table-wrap">
            <table class="table" id="productsTable">
                <thead>
                    <tr>
                        <th data-sort="id">ID</th>
                        <th data-sort="name">Product</th>
                        <th data-sort="sku">SKU</th>
                        <th data-sort="price">Price</th>
                        <th data-sort="stock">Stock</th>
                        <th data-sort="category">Category</th>
                        <th data-sort="status">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="empty" id="emptyState" style="display:none">No products match your filters.</div>
        </div>
    </div>
</section>


<div class="modal-backdrop" id="productModal">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="pmTitle">
        <header>
            <h3 id="pmTitle">New product</h3>
            <button class="btn btn-ghost" type="button" onclick="PM.close()">✕</button>
        </header>

        <div class="grid">
            <div class="field">
                <label for="pmName"><b>Name</b></label>
                <input id="pmName" placeholder="Ambalangoda Mask">
            </div>
            <div class="field">
                <label for="pmSku"><b>SKU</b></label>
                <input id="pmSku" placeholder="MASK-001">
            </div>

            <div class="field">
                <label for="pmPrice"><b>Price (Rs)</b></label>
                <input id="pmPrice" inputmode="numeric" placeholder="12000">
                <small class="hint">Numbers only</small>
            </div>
            <div class="field">
                <label for="pmStock"><b>Stock</b></label>
                <input id="pmStock" inputmode="numeric" placeholder="10">
            </div>

            <div class="field">
                <label for="pmCategory"><b>Category</b></label>
                <input id="pmCategory" placeholder="Masks / Handloom / Pottery / Lace">
            </div>
            <div class="field">
                <label for="pmStatus"><b>Status</b></label>
                <select id="pmStatus">
                    <option value="active">active</option>
                    <option value="hidden">hidden</option>
                </select>
            </div>

            <div class="field" style="grid-column:1/-1">
                <label for="pmDesc"><b>Description</b> <span class="pill">optional</span></label>
                <textarea id="pmDesc" placeholder="Short description for quick reference…"></textarea>
            </div>
        </div>

        <footer>
            <button class="btn" type="button" onclick="PM.close()">Cancel</button>
            <button class="btn btn-gold" id="pmSave" type="button">Save</button>
        </footer>
    </div>
</div>

<script>
    
    const DB_KEY = 'heritage_admin_db_v1';

    function dbLoad() {
        const raw = localStorage.getItem(DB_KEY);
        if (raw) try {
            return JSON.parse(raw);
        } catch (e) {}
        const seed = {
            users: [],
            products: [{
                    id: 101,
                    name: 'Ambalangoda Mask',
                    sku: 'MASK-001',
                    price: 12000,
                    stock: 8,
                    category: 'Masks',
                    status: 'active'
                },
                {
                    id: 102,
                    name: 'Handloom Saree',
                    sku: 'HL-044',
                    price: 18500,
                    stock: 5,
                    category: 'Handloom',
                    status: 'active'
                },
                {
                    id: 103,
                    name: 'Clay Pot',
                    sku: 'CLAY-012',
                    price: 3500,
                    stock: 20,
                    category: 'Pottery',
                    status: 'active'
                },
                {
                    id: 104,
                    name: 'Beeralu Lace',
                    sku: 'BL-010',
                    price: 5600,
                    stock: 12,
                    category: 'Lace',
                    status: 'hidden'
                }
            ],
            orders: [],
            nextIds: {
                user: 1,
                product: 105
            }
        };
        localStorage.setItem(DB_KEY, JSON.stringify(seed));
        return seed;
    }

    function dbSave(db) {
        localStorage.setItem(DB_KEY, JSON.stringify(db));
    }
    const DB = dbLoad();

    
    const q = document.getElementById('q');
    const fCat = document.getElementById('filterCat');
    const fStatus = document.getElementById('filterStatus');
    const clearFilters = document.getElementById('clearFilters');
    const tbody = document.querySelector('
    const emptyState = document.getElementById('emptyState');

    let sortKey = 'id';
    let sortDir = 'asc'; 

    
    function fillCatFilter() {
        const cats = Array.from(new Set(DB.products.map(p => p.category))).sort();
        fCat.innerHTML = '<option value=\"\">All categories</option>' + cats.map(c => `<option value=\"${c}\">${c}</option>`).join('');
    }

    
    function applyFilters(list) {
        const term = (q.value || '').trim().toLowerCase();
        const fc = fCat.value;
        const fs = fStatus.value;
        return list.filter(p => {
            const hit = !term || (p.name.toLowerCase().includes(term) || p.sku.toLowerCase().includes(term));
            const catOk = !fc || p.category === fc;
            const stOk = !fs || p.status === fs;
            return hit && catOk && stOk;
        });
    }

    function applySort(list) {
        const arr = list.slice();
        arr.sort((a, b) => {
            let A = a[sortKey],
                B = b[sortKey];
            if (typeof A === 'string') A = A.toLowerCase();
            if (typeof B === 'string') B = B.toLowerCase();
            if (A < B) return sortDir === 'asc' ? -1 : 1;
            if (A > B) return sortDir === 'asc' ? 1 : -1;
            return 0;
        });
        return arr;
    }

    function render() {
        fillCatFilter();
        const rows = applySort(applyFilters(DB.products));
        tbody.innerHTML = '';
        if (rows.length === 0) {
            emptyState.style.display = 'block';
            return;
        }
        emptyState.style.display = 'none';

        rows.forEach(p => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
        <td>${p.id}</td>
        <td>
          <div class="name-wrap">
            <span class="dot ${p.status==='hidden'?'hidden':''}"></span>
            <div>${p.name}<br><small class="muted">${p.sku}</small></div>
          </div>
        </td>
        <td>${p.sku}</td>
        <td>Rs. ${Number(p.price||0).toLocaleString('en-LK')}</td>
        <td>${p.stock}</td>
        <td>${p.category}</td>
        <td><span class="badge">${p.status}</span></td>
        <td class="row-actions">
          <button class="btn btn-gold" data-edit="${p.id}">Edit</button>
          <button class="btn btn-danger" data-del="${p.id}">Delete</button>
        </td>
      `;
            tbody.appendChild(tr);
        });
    }

    
    document.querySelectorAll('
        th.addEventListener('click', () => {
            const k = th.getAttribute('data-sort');
            if (sortKey === k) {
                sortDir = (sortDir === 'asc' ? 'desc' : 'asc');
            } else {
                sortKey = k;
                sortDir = 'asc';
            }
            render();
        });
    });

    
    [q, fCat, fStatus].forEach(el => el.addEventListener('input', render));
    clearFilters.addEventListener('click', () => {
        q.value = '';
        fCat.value = '';
        fStatus.value = '';
        render();
    });

    
    const PM = {
        el: document.getElementById('productModal'),
        saveBtn: document.getElementById('pmSave'),
        fields: {
            name: document.getElementById('pmName'),
            sku: document.getElementById('pmSku'),
            price: document.getElementById('pmPrice'),
            stock: document.getElementById('pmStock'),
            category: document.getElementById('pmCategory'),
            status: document.getElementById('pmStatus'),
            desc: document.getElementById('pmDesc'),
            title: document.getElementById('pmTitle')
        },
        mode: 'create', 
        id: null,
        open(mode, product) {
            this.mode = mode;
            this.id = product?.id || null;
            this.fields.title.textContent = mode === 'edit' ? 'Edit product' : 'New product';
            this.fields.name.value = product?.name || '';
            this.fields.sku.value = product?.sku || '';
            this.fields.price.value = product?.price ?? '';
            this.fields.stock.value = product?.stock ?? '';
            this.fields.category.value = product?.category || '';
            this.fields.status.value = product?.status || 'active';
            this.fields.desc.value = product?.desc || '';
            
            Object.values(this.fields).forEach(f => {
                if (f && f.classList) f.classList.remove('invalid');
            });
            this.el.style.display = 'grid';
            this.saveBtn.onclick = () => this.save();
        },
        close() {
            this.el.style.display = 'none';
        },
        validate() {
            let ok = true;
            const req = [this.fields.name, this.fields.sku, this.fields.price, this.fields.stock, this.fields.category];
            req.forEach(f => {
                if (!f.value.trim()) {
                    f.classList.add('invalid');
                    ok = false;
                } else f.classList.remove('invalid');
            });
            if (this.fields.price.value && isNaN(parseInt(this.fields.price.value, 10))) {
                this.fields.price.classList.add('invalid');
                ok = false;
            }
            if (this.fields.stock.value && isNaN(parseInt(this.fields.stock.value, 10))) {
                this.fields.stock.classList.add('invalid');
                ok = false;
            }
            return ok;
        },
        save() {
            if (!this.validate()) return;
            const p = {
                id: this.id ?? DB.nextIds.product++,
                name: this.fields.name.value.trim(),
                sku: this.fields.sku.value.trim(),
                price: parseInt(this.fields.price.value, 10) || 0,
                stock: parseInt(this.fields.stock.value, 10) || 0,
                category: this.fields.category.value.trim() || 'General',
                status: this.fields.status.value,
                desc: this.fields.desc.value.trim()
            };
            if (this.mode === 'edit') {
                const i = DB.products.findIndex(x => x.id === this.id);
                if (i > -1) DB.products[i] = p;
            } else {
                DB.products.push(p);
            }
            dbSave(DB);
            this.close();
            render();
            
            const pc = document.getElementById('sb_product_count');
            if (pc) pc.textContent = DB.products.length;
        }
    };
    window.PM = PM; 

    
    document.getElementById('addProduct').addEventListener('click', () => PM.open('create', null));

    
    document.addEventListener('click', (e) => {
        const idEdit = e.target.getAttribute('data-edit');
        const idDel = e.target.getAttribute('data-del');
        if (idEdit) {
            const p = DB.products.find(x => String(x.id) === String(idEdit));
            if (p) PM.open('edit', p);
        }
        if (idDel) {
            const idx = DB.products.findIndex(x => String(x.id) === String(idDel));
            if (idx > -1 && confirm('Delete this product?')) {
                DB.products.splice(idx, 1);
                dbSave(DB);
                render();
                const pc = document.getElementById('sb_product_count');
                if (pc) pc.textContent = DB.products.length;
            }
        }
    });

    
    document.addEventListener('admin:new', (e) => {
        if (!e.detail || e.detail === 'product') PM.open('create', null);
    });

    
    render();

    
    (function() {
        document.querySelectorAll('.mini-cart,
    })();
</script>

<?php include __DIR__ . '/partials/admin-footer.php'; ?>