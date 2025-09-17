<?php

define('HERITAGE_ADMIN', true);
$admin_title = 'Admin • Analytics';
$active      = 'analytics';
include __DIR__ . '/partials/admin-header.php';
?>

<style>
    .dash-filters {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 12px
    }

    .chip {
        padding: 8px 12px;
        border-radius: 999px;
        border: var(--outline);
        background: rgba(255, 255, 255, .04);
        cursor: pointer;
        user-select: none
    }

    .chip.active {
        background: linear-gradient(180deg, rgba(198, 163, 79, .22), rgba(198, 163, 79, .10));
        border-color: rgba(198, 163, 79, .45)
    }

    .dates {
        display: flex;
        gap: 8px;
        align-items: center
    }

    .dates input {
        border: var(--outline);
        border-radius: 10px;
        background: transparent;
        color: var(--text, #fff);
        padding: 8px 10px;
    }

    .dates label {
        color: var(--muted);
        font-weight: 600
    }

    .grid {
        display: grid;
        gap: 12px
    }

    .grid-3 {
        grid-template-columns: repeat(3, 1fr)
    }

    @media(max-width:1100px) {
        .grid-3 {
            grid-template-columns: 1fr 1fr
        }
    }

    @media(max-width:720px) {
        .grid-3 {
            grid-template-columns: 1fr
        }
    }

    .kpi {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 14px
    }

    .kpi h4 {
        margin: 0;
        color: var(--muted);
        font-weight: 700
    }

    .kpi .big {
        font-size: 34px;
        font-weight: 900;
        letter-spacing: .2px
    }

    .kpi .delta {
        font-size: 12px
    }

    .kpi .canvas-wrap {
        height: 42px
    }

    .kpi .spark {
        width: 100%;
        height: 42px;
        display: block
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

    .two-col {
        display: grid;
        grid-template-columns: 1.2fr .8fr;
        gap: 12px
    }

    @media(max-width:1100px) {
        .two-col {
            grid-template-columns: 1fr
        }
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
        font-weight: 600
    }

    .pill {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .06);
        font-size: 12px
    }


    .chart-wrap {
        height: 280px;
        padding: 8px 0
    }

    .chart {
        width: 100%;
        height: 100%
    }


    .empty {
        padding: 24px;
        text-align: center;
        color: var(--muted)
    }
</style>

<section class="panel">
    <header>
        <h3>Overview</h3>
        <div class="dash-filters">
            <span class="chip active" data-range="7">7d</span>
            <span class="chip" data-range="30">30d</span>
            <span class="chip" data-range="90">90d</span>
            <span class="chip" data-range="ytd">YTD</span>
            <span class="chip" data-range="all">All</span>
            <div class="dates">
                <label for="from">From</label><input type="date" id="from">
                <label for="to">To</label><input type="date" id="to">
                <button class="btn" id="applyRange">Apply</button>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="grid grid-3">
            <div class="card panel kpi" id="kpi-orders">
                <h4>Orders</h4>
                <div class="big" data-val="orders">0</div>
                <div class="delta" data-delta="orders"><span class="pill">—</span></div>
                <div class="canvas-wrap"><canvas class="spark" id="spark-orders"></canvas></div>
            </div>
            <div class="card panel kpi" id="kpi-sold">
                <h4>Products sold</h4>
                <div class="big" data-val="sold">0</div>
                <div class="delta" data-delta="sold"><span class="pill">—</span></div>
                <div class="canvas-wrap"><canvas class="spark" id="spark-sold"></canvas></div>
            </div>
            <div class="card panel kpi" id="kpi-revenue">
                <h4>Revenue</h4>
                <div class="big" data-val="revenue">Rs. 0</div>
                <div class="delta" data-delta="revenue"><span class="pill">—</span></div>
                <div class="canvas-wrap"><canvas class="spark" id="spark-revenue"></canvas></div>
            </div>
        </div>
    </div>
</section>

<section class="two-col">
    <div class="panel">
        <header>
            <h3>By category</h3>
            <small class="muted" id="catRangeNote">last 7 days</small>
        </header>
        <div class="content">
            <div class="chart-wrap">
                <canvas class="chart" id="chart-cats"></canvas>
            </div>
        </div>
    </div>

    <div class="panel">
        <header>
            <h3>Top products</h3>
            <small class="muted" id="topRangeNote">last 7 days</small>
        </header>
        <div class="content" id="topProductsWrap">
            <table class="table" id="topProducts">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Sold</th>
                        <th>Revenue</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="empty" id="topEmpty" style="display:none">No sales in this period.</div>
        </div>
    </div>
</section>

<section class="panel" style="margin-top:12px">
    <header>
        <h3>Recent orders</h3>
        <small class="muted" id="ordersRangeNote">last 7 days</small>
    </header>
    <div class="content">
        <table class="table" id="recentOrders">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="empty" id="ordersEmpty" style="display:none">No orders found for this range.</div>
    </div>
</section>

<script>
    const DB_KEY = 'heritage_admin_db_v1';

    function seedIfMissing() {
        let raw = localStorage.getItem(DB_KEY);
        if (raw) return JSON.parse(raw);
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
                    status: 'active'
                }
            ],
            orders: [{
                    id: 'ORD-001',
                    productId: 101,
                    qty: 2,
                    total: 24000,
                    date: '2025-08-20'
                },
                {
                    id: 'ORD-002',
                    productId: 102,
                    qty: 1,
                    total: 18500,
                    date: '2025-08-22'
                },
                {
                    id: 'ORD-003',
                    productId: 103,
                    qty: 3,
                    total: 10500,
                    date: '2025-08-25'
                },
                {
                    id: 'ORD-004',
                    productId: 104,
                    qty: 4,
                    total: 22400,
                    date: '2025-08-27'
                },
                {
                    id: 'ORD-005',
                    productId: 101,
                    qty: 1,
                    total: 12000,
                    date: '2025-08-28'
                },
                {
                    id: 'ORD-006',
                    productId: 103,
                    qty: 2,
                    total: 7000,
                    date: '2025-08-30'
                }
            ],
            nextIds: {
                user: 4,
                product: 105
            }
        };
        localStorage.setItem(DB_KEY, JSON.stringify(seed));
        return seed;
    }
    const DB = seedIfMissing();


    const today = new Date();

    function fmt(d) {
        return d.toISOString().slice(0, 10);
    }

    function addDays(d, n) {
        const x = new Date(d);
        x.setDate(x.getDate() + n);
        return x;
    }

    function inRange(d, from, to) {
        const t = new Date(d);
        return (!from || t >= from) && (!to || t <= to);
    }


    let state = {
        range: '7',
        from: null,
        to: null
    };


    const chips = document.querySelectorAll('.chip[data-range]');
    const fromEl = document.getElementById('from');
    const toEl = document.getElementById('to');
    const apply = document.getElementById('applyRange');

    chips.forEach(c => c.addEventListener('click', () => {
        chips.forEach(x => x.classList.remove('active'));
        c.classList.add('active');
        state.range = c.dataset.range;
        state.from = state.to = null;
        fromEl.value = toEl.value = '';
        renderAll();
    }));
    apply.addEventListener('click', () => {
        const f = fromEl.value ? new Date(fromEl.value) : null;
        const t = toEl.value ? new Date(toEl.value) : null;
        state.range = 'custom';
        state.from = f;
        state.to = t;
        chips.forEach(x => x.classList.remove('active'));
        renderAll();
    });

    function resolveRange() {
        let from = null,
            to = new Date();
        switch (state.range) {
            case '7':
                from = addDays(to, -7);
                break;
            case '30':
                from = addDays(to, -30);
                break;
            case '90':
                from = addDays(to, -90);
                break;
            case 'ytd':
                from = new Date(to.getFullYear(), 0, 1);
                break;
            case 'all':
                from = null;
                break;
            case 'custom':
                from = state.from;
                to = state.to || to;
                break;
        }
        return {
            from,
            to
        };
    }


    function stats() {
        const {
            from,
            to
        } = resolveRange();
        const O = DB.orders.filter(o => inRange(o.date, from, to));
        const orders = O.length;
        const sold = O.reduce((s, o) => s + o.qty, 0);
        const revenue = O.reduce((s, o) => s + o.total, 0);


        let prevFrom, prevTo;
        if (from) {
            const days = Math.ceil((to - from) / (1000 * 60 * 60 * 24)) || 7;
            prevTo = addDays(from, -1);
            prevFrom = addDays(prevTo, -days);
        } else {
            prevFrom = null;
            prevTo = null;
        }
        const Oprev = DB.orders.filter(o => inRange(o.date, prevFrom, prevTo));
        const ordersPrev = Oprev.length;
        const soldPrev = Oprev.reduce((s, o) => s + o.qty, 0);
        const revenuePrev = Oprev.reduce((s, o) => s + o.total, 0);


        const seriesDays = [];
        const start = from || (DB.orders.length ? new Date(DB.orders[0].date) : addDays(today, -30));
        const end = to || today;
        for (let d = new Date(start); d <= end; d = addDays(d, 1)) {
            const key = fmt(d);
            const dayOrders = DB.orders.filter(o => o.date === key);
            seriesDays.push({
                date: key,
                orders: dayOrders.length,
                sold: dayOrders.reduce((s, o) => s + o.qty, 0),
                revenue: dayOrders.reduce((s, o) => s + o.total, 0)
            });
        }


        const byCat = {};
        const byProd = {};
        O.forEach(o => {
            const p = DB.products.find(p => p.id === o.productId);
            if (!p) return;
            byCat[p.category] = (byCat[p.category] || 0) + o.qty;
            const k = p.id;
            if (!byProd[k]) byProd[k] = {
                name: p.name,
                category: p.category,
                sold: 0,
                revenue: 0
            };
            byProd[k].sold += o.qty;
            byProd[k].revenue += o.total;
        });

        return {
            orders,
            sold,
            revenue,
            ordersPrev,
            soldPrev,
            revenuePrev,
            seriesDays,
            byCat,
            byProd,
            rangeLabel: rangeLabel({
                from,
                to
            })
        };
    }

    function pctDelta(now, prev) {
        if (prev === 0) return now > 0 ? +100 : 0;
        return Math.round(((now - prev) / prev) * 100);
    }

    function rangeLabel({
        from,
        to
    }) {
        if (!from && !to) return 'all time';
        const f = from ? fmt(from) : '—';
        const t = to ? fmt(to) : 'today';
        return (state.range === '7' ? 'last 7 days' :
            state.range === '30' ? 'last 30 days' :
            state.range === '90' ? 'last 90 days' :
            state.range === 'ytd' ? 'year to date' :
            (f + ' → ' + t));
    }


    function setKPI(id, value, prev, fmtFn) {
        const el = document.querySelector(`[data-val="${id}"]`);
        const de = document.querySelector(`[data-delta="${id}"] .pill`);
        if (!el || !de) return;
        el.textContent = fmtFn ? fmtFn(value) : value;
        const d = pctDelta(value, prev);
        de.textContent = (d >= 0 ? '▲ ' : '▼ ') + Math.abs(d) + '%';
        de.style.borderColor = d >= 0 ? 'rgba(120,200,120,.45)' : 'rgba(255,120,120,.45)';
        de.style.background = d >= 0 ? 'rgba(120,200,120,.12)' : 'rgba(255,120,120,.12)';
    }

    function drawSpark(canvas, arr, key) {
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        const W = canvas.width = canvas.clientWidth;
        const H = canvas.height = canvas.clientHeight;
        ctx.clearRect(0, 0, W, H);
        const vals = arr.map(x => x[key]);
        const max = Math.max(1, ...vals);
        const min = Math.min(0, ...vals);
        const pad = 6;
        ctx.lineWidth = 2;
        ctx.beginPath();
        arr.forEach((v, i) => {
            const x = pad + i * ((W - pad * 2) / Math.max(1, arr.length - 1));
            const y = H - pad - ((v[key] - min) / Math.max(1, (max - min))) * (H - pad * 2);
            i === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
        });

        const grd = ctx.createLinearGradient(0, 0, W, 0);
        grd.addColorStop(0, 'rgba(198,163,79,.85)');
        grd.addColorStop(1, 'rgba(198,163,79,.35)');
        ctx.strokeStyle = grd;
        ctx.stroke();
    }

    function drawBars(canvas, labels, values) {
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        const W = canvas.width = canvas.clientWidth;
        const H = canvas.height = canvas.clientHeight;
        ctx.clearRect(0, 0, W, H);
        const max = Math.max(1, ...values);
        const padL = 32,
            padR = 12,
            padB = 26,
            padT = 8,
            gap = 12;
        const bw = (W - padL - padR - gap * (values.length - 1)) / Math.max(1, values.length);
        ctx.font = '12px system-ui';
        values.forEach((v, i) => {
            const h = Math.round((H - padT - padB) * (v / max));
            const x = padL + i * (bw + gap);
            const y = H - padB - h;
            const grd = ctx.createLinearGradient(0, y, 0, y + h);
            grd.addColorStop(0, 'rgba(198,163,79,.65)');
            grd.addColorStop(1, 'rgba(198,163,79,.28)');
            ctx.fillStyle = grd;
            ctx.fillRect(x, y, bw, h);

            ctx.fillStyle = 'rgba(255,255,255,.85)';
            const txt = String(v);
            ctx.fillText(txt, x + bw / 2 - ctx.measureText(txt).width / 2, y - 6);

            ctx.fillStyle = 'rgba(255,255,255,.65)';
            const lab = labels[i];
            const tw = ctx.measureText(lab).width;
            const clip = tw > bw ? lab.slice(0, Math.max(3, Math.floor(bw / 7))) + '…' : lab;
            ctx.fillText(clip, x + bw / 2 - ctx.measureText(clip).width / 2, H - 8);
        });
    }

    function renderAll() {
        const S = stats();

        setKPI('orders', S.orders, S.ordersPrev, v => v);
        setKPI('sold', S.sold, S.soldPrev, v => v);
        setKPI('revenue', S.revenue, S.revenuePrev, v => 'Rs. ' + v.toLocaleString('en-LK'));
        drawSpark(document.getElementById('spark-orders'), S.seriesDays, 'orders');
        drawSpark(document.getElementById('spark-sold'), S.seriesDays, 'sold');
        drawSpark(document.getElementById('spark-revenue'), S.seriesDays, 'revenue');


        document.getElementById('catRangeNote').textContent = S.rangeLabel;
        const catLabels = Object.keys(S.byCat);
        const catVals = catLabels.map(k => S.byCat[k]);
        drawBars(document.getElementById('chart-cats'), catLabels, catVals);


        document.getElementById('topRangeNote').textContent = S.rangeLabel;
        const rows = Object.entries(S.byProd)
            .map(([id, p]) => p)
            .sort((a, b) => b.revenue - a.revenue)
            .slice(0, 6);
        const tpBody = document.querySelector('#topProducts tbody');
        const tpEmpty = document.getElementById('topEmpty');
        tpBody.innerHTML = '';
        if (rows.length === 0) {
            tpEmpty.style.display = 'block';
        } else {
            tpEmpty.style.display = 'none';
            rows.forEach(r => {
                const tr = document.createElement('tr');
                tr.innerHTML = `<td>${r.name}</td><td>${r.category}</td><td>${r.sold}</td><td>Rs. ${r.revenue.toLocaleString('en-LK')}</td>`;
                tpBody.appendChild(tr);
            });
        }


        document.getElementById('ordersRangeNote').textContent = S.rangeLabel;
        const recent = DB.orders
            .filter(o => inRange(o.date, resolveRange().from, resolveRange().to))
            .sort((a, b) => a.date < b.date ? 1 : -1).slice(0, 10);
        const roBody = document.querySelector('#recentOrders tbody');
        const roEmpty = document.getElementById('ordersEmpty');
        roBody.innerHTML = '';
        if (recent.length === 0) {
            roEmpty.style.display = 'block';
        } else {
            roEmpty.style.display = 'none';
            recent.forEach(o => {
                const p = DB.products.find(p => p.id === o.productId);
                const tr = document.createElement('tr');
                tr.innerHTML = `<td>${o.id}</td><td>${o.date}</td><td>${p?p.name:'—'}</td><td>${o.qty}</td><td>Rs. ${o.total.toLocaleString('en-LK')}</td>`;
                roBody.appendChild(tr);
            });
        }
    }


    (function init() {

        const to = new Date();
        const from = addDays(to, -7);
        document.getElementById('from').value = fmt(from);
        document.getElementById('to').value = fmt(to);
        renderAll();

        window.addEventListener('resize', () => renderAll());
    })();
</script>

<?php include __DIR__ . '/partials/admin-footer.php'; ?>