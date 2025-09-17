<?php

define('HERITAGE_ADMIN', true);
$admin_title = 'Admin • Users';
$active      = 'users';
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
        color: inherit;
        font: inherit;
        width: 240px;
    }

    .select {
        border: var(--outline);
        border-radius: 10px;
        background: transparent;
        color: inherit;
        padding: 8px 10px;
    }

    .btn {
        cursor: pointer;
        border: var(--outline);
        background: transparent;
        color: inherit;
        padding: 10px 12px;
        border-radius: 12px;
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

    .role-chip {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 999px;
        border: 1px solid rgba(198, 163, 79, .35);
        background: linear-gradient(180deg, rgba(198, 163, 79, .22), rgba(198, 163, 79, .10));
        font-size: 12px
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
        color: inherit;
        padding: 10px 12px;
        outline: none;
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


    .name-wrap {
        display: flex;
        align-items: center;
        gap: 10px
    }

    .avatar-dot {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        background: inherit;
        border: 1px solid rgba(255, 255, 255, .12);
        font-weight: 700;
    }
</style>

<section class="panel">
    <header>
        <h3>Users</h3>
        <div class="toolbar">
            <div class="search">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M21 21l-3.8-3.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                    <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6" />
                </svg>
                <input type="search" id="q" placeholder="Search name, email…">
            </div>
            <select class="select" id="filterRole">
                <option value="">All roles</option>
                <option value="super">Super</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="artisan">Artisan</option>
                <option value="customer">Customer</option>
            </select>
            <select class="select" id="filterStatus">
                <option value="">All status</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
            </select>
            <button class="btn" id="clearFilters">Clear</button>
            <div style="width:12px"></div>
            <button class="btn btn-gold" id="addUser">＋ Add user</button>
        </div>
    </header>
    <div class="content">
        <div class="table-wrap">
            <table class="table" id="usersTable">
                <thead>
                    <tr>
                        <th data-sort="id">ID</th>
                        <th data-sort="name">User</th>
                        <th data-sort="email">Email</th>
                        <th data-sort="role">Role</th>
                        <th data-sort="status">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="empty" id="emptyState" style="display:none">No users match your filters.</div>
        </div>
    </div>
</section>


<div class="modal-backdrop" id="userModal">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="umTitle">
        <header>
            <h3 id="umTitle">New user</h3>
            <button class="btn btn-ghost" type="button" onclick="UM.close()">✕</button>
        </header>

        <div class="grid">
            <div class="field">
                <label for="umName"><b>Name</b></label>
                <input id="umName" placeholder="Amal Perera">
            </div>
            <div class="field">
                <label for="umEmail"><b>Email</b></label>
                <input id="umEmail" placeholder="amal@example.com">
            </div>

            <div class="field">
                <label for="umRole"><b>Role</b></label>
                <select id="umRole">
                    <option value="customer">customer</option>
                    <option value="artisan">artisan</option>
                    <option value="manager">manager</option>
                    <option value="admin">admin</option>
                    <option value="super">super</option>
                </select>
                <small class="hint">Levels: super › admin › manager › artisan › customer</small>
            </div>
            <div class="field">
                <label for="umStatus"><b>Status</b></label>
                <select id="umStatus">
                    <option value="active">active</option>
                    <option value="suspended">suspended</option>
                </select>
            </div>

            <div class="field" style="grid-column:1/-1">
                <label for="umNote"><b>Notes</b> <span class="badge">optional</span></label>
                <textarea id="umNote" placeholder="Internal note (e.g., verification pending)…"></textarea>
            </div>
        </div>

        <footer>
            <button class="btn" type="button" onclick="UM.close()">Cancel</button>
            <button class="btn btn-gold" id="umSave" type="button">Save</button>
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
            users: [{
                    id: 1,
                    name: 'Amal Perera',
                    email: 'amal@example.com',
                    role: 'admin',
                    status: 'active'
                },
                {
                    id: 2,
                    name: 'Nilanthi Jayasuriya',
                    email: 'nilanthi@example.com',
                    role: 'artisan',
                    status: 'active'
                },
                {
                    id: 3,
                    name: 'Ishara Fernando',
                    email: 'ishara@example.com',
                    role: 'customer',
                    status: 'active'
                }
            ],
            products: [],
            orders: [],
            nextIds: {
                user: 4,
                product: 101
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
    const fRole = document.getElementById('filterRole');
    const fStatus = document.getElementById('filterStatus');
    const clearFilters = document.getElementById('clearFilters');
    const tbody = document.querySelector('#usersTable tbody');
    const emptyState = document.getElementById('emptyState');

    let sortKey = 'id';
    let sortDir = 'asc';


    function applyFilters(list) {
        const term = (q.value || '').trim().toLowerCase();
        const fr = fRole.value;
        const fs = fStatus.value;
        return list.filter(u => {
            const hit = !term || (u.name.toLowerCase().includes(term) || u.email.toLowerCase().includes(term));
            const roleOk = !fr || u.role === fr;
            const stOk = !fs || u.status === fs;
            return hit && roleOk && stOk;
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
        const rows = applySort(applyFilters(DB.users));
        tbody.innerHTML = '';
        if (rows.length === 0) {
            emptyState.style.display = 'block';
            return;
        }
        emptyState.style.display = 'none';

        rows.forEach(u => {
            const tr = document.createElement('tr');
            const initials = (u.name || ' ').split(' ').map(s => s[0]).join('').slice(0, 2).toUpperCase();
            tr.innerHTML = `
        <td>${u.id}</td>
        <td>
          <div class="name-wrap">
            <div class="avatar-dot">${initials||'U'}</div>
            <div>${u.name}<br><small class="muted">${u.email}</small></div>
          </div>
        </td>
        <td>${u.email}</td>
        <td><span class="role-chip">${u.role}</span></td>
        <td><span class="badge">${u.status}</span></td>
        <td class="row-actions">
          <button class="btn btn-gold" data-edit="${u.id}">Edit</button>
          <button class="btn btn-danger" data-del="${u.id}">Delete</button>
        </td>
      `;
            tbody.appendChild(tr);
        });
    }


    document.querySelectorAll('th[data-sort]').forEach(th => {
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


    [q, fRole, fStatus].forEach(el => el.addEventListener('input', render));
    clearFilters.addEventListener('click', () => {
        q.value = '';
        fRole.value = '';
        fStatus.value = '';
        render();
    });


    const UM = {
        el: document.getElementById('userModal'),
        saveBtn: document.getElementById('umSave'),
        fields: {
            name: document.getElementById('umName'),
            email: document.getElementById('umEmail'),
            role: document.getElementById('umRole'),
            status: document.getElementById('umStatus'),
            note: document.getElementById('umNote'),
            title: document.getElementById('umTitle')
        },
        mode: 'create',
        id: null,
        open(mode, user) {
            this.mode = mode;
            this.id = user?.id || null;
            this.fields.title.textContent = mode === 'edit' ? 'Edit user' : 'New user';
            this.fields.name.value = user?.name || '';
            this.fields.email.value = user?.email || '';
            this.fields.role.value = user?.role || 'customer';
            this.fields.status.value = user?.status || 'active';
            this.fields.note.value = user?.note || '';

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
            const req = [this.fields.name, this.fields.email];
            req.forEach(f => {
                if (!f.value.trim()) {
                    f.classList.add('invalid');
                    ok = false;
                } else f.classList.remove('invalid');
            });
            const email = this.fields.email.value.trim();
            if (email && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
                this.fields.email.classList.add('invalid');
                ok = false;
            }
            return ok;
        },
        save() {
            if (!this.validate()) return;
            const u = {
                id: this.id ?? DB.nextIds.user++,
                name: this.fields.name.value.trim(),
                email: this.fields.email.value.trim(),
                role: this.fields.role.value,
                status: this.fields.status.value,
                note: this.fields.note.value.trim()
            };
            if (this.mode === 'edit') {
                const i = DB.users.findIndex(x => x.id == this.id);
                if (i > -1) DB.users[i] = u;
            } else {
                DB.users.push(u);
            }
            dbSave(DB);
            this.close();
            render();

            const uc = document.getElementById('sb_user_count');
            if (uc) uc.textContent = DB.users.length;
        }
    };
    window.UM = UM;


    document.getElementById('addUser').addEventListener('click', () => UM.open('create', null));


    document.addEventListener('click', (e) => {
        const idEdit = e.target.getAttribute('data-edit');
        const idDel = e.target.getAttribute('data-del');
        if (idEdit) {
            const u = DB.users.find(x => String(x.id) === String(idEdit));
            if (u) UM.open('edit', u);
        }
        if (idDel) {
            const idx = DB.users.findIndex(x => String(x.id) === String(idDel));
            if (idx > -1 && confirm('Delete this user?')) {
                DB.users.splice(idx, 1);
                dbSave(DB);
                render();
                const uc = document.getElementById('sb_user_count');
                if (uc) uc.textContent = DB.users.length;
            }
        }
    });


    document.addEventListener('admin:new', (e) => {
        if (!e.detail || e.detail === 'user') UM.open('create', null);
    });


    render();


    // Removed incomplete IIFE and querySelectorAll for '.mini-cart'
</script>

<?php include __DIR__ . '/partials/admin-footer.php'; ?>