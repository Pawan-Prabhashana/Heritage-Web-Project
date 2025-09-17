<?php
$title = 'Heritage • Shop';
$page  = 'shop';


$catalog = [
    ['id' => 1, 'title' => 'Handloom Saree – Sand Dunes', 'price' => 19500, 'artisan' => 'Kalpani', 'region' => 'Kurunegala', 'cat' => 'Handloom', 'img' => '/assets/shop1.png'],
    ['id' => 2, 'title' => 'Ambalangoda Mask – Guardian', 'price' => 24900, 'artisan' => 'Prasanna', 'region' => 'Galle', 'cat' => 'Wooden Masks', 'img' => '/assets/shop2.png'],
    ['id' => 3, 'title' => 'Brass Oil Lamp – Peacock', 'price' => 32000, 'artisan' => 'Sanjeewa', 'region' => 'Kandy', 'cat' => 'Brass & Metal', 'img' => '/assets/shop3.png'],
    ['id' => 4, 'title' => 'Terracotta Pottery Set', 'price' => 9800, 'artisan' => 'Nuwani', 'region' => 'Matara', 'cat' => 'Pottery', 'img' => '/assets/shop4.png'],
    ['id' => 5, 'title' => 'Beeralu Lace Runner', 'price' => 14500, 'artisan' => 'Iresha', 'region' => 'Galle', 'cat' => 'Lace & Beeralu', 'img' => '/assets/shop5.png'],
];
?>

<?php include __DIR__ . '/partials/header.php'; ?>


<script>
    window.CATALOG = <?php echo json_encode($catalog, JSON_UNESCAPED_UNICODE); ?>;
</script>

<style>
    :root {
        --headerH: 88px;
        --pageMax: 1320px;
        --panel: 
        --text: 
        --gold: 
        --gold-2: 
        --outline: 1px solid rgba(255, 215, 0, .20);
        --shadow: 0 16px 32px rgba(0, 0, 0, .4);
        --brand-gradient: linear-gradient(135deg, var(--gold), var(--gold-2));
    }

    
    .backdrop {
        pointer-events: none;
    }

    .backdrop.open {
        pointer-events: auto;
    }

    body::before {
        content: "";
        position: fixed;
        inset: 0;
        background: url('assets/artwork.png') center/cover no-repeat;
        opacity: .08;
        z-index: -1;
    }

    @media (min-width:981px) {

        .drawer,
        .backdrop {
            display: none !important;
        }
    }

    .header.scrolled {
        background: rgba(11, 11, 11, .95);
        border-bottom: var(--outline);
    }

    .page-wrap {
        max-width: var(--pageMax);
        margin: 0 auto;
        padding: calc(var(--headerH) + 16px) 22px 22px;
        position: relative;
        z-index: 1;
    }

    .intro {
        margin-bottom: 16px;
    }

    .intro h1 {
        font-size: clamp(28px, 3.5vw, 46px);
        font-weight: 900;
        margin: 0 0 6px;
    }

    .intro p {
        color: var(--gold-2);
        margin: 0 0 8px;
    }

    .filter-wrap {
        position: relative;
        z-index: 10;
    }

    .filter-bar {
        position: sticky;
        top: var(--headerH);
        display: grid;
        grid-template-columns: 1.6fr 1fr auto;
        gap: 12px;
        align-items: center;
        background: rgba(20, 20, 20, .90);
        -webkit-backdrop-filter: blur(12px);
        backdrop-filter: blur(12px);
        padding: 14px 22px;
        border: 1px solid rgba(255, 215, 0, .20);
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .55);
        margin-bottom: 18px;
    }

    @media(max-width:980px) {
        .filter-bar {
            grid-template-columns: 1fr;
            row-gap: 10px;
        }
    }

    .search-wrap {
        display: flex;
        gap: 10px;
        align-items: center;
        background: rgba(0, 0, 0, .6);
        border: 1px solid rgba(255, 255, 255, .14);
        border-radius: 14px;
        padding: 10px 14px;
    }

    .search-wrap input {
        flex: 1;
        background: none;
        border: none;
        outline: none;
        color: var(--text);
        font-size: 16px;
    }

    .btn-clear {
        display: none;
        background: rgba(255, 255, 255, .08);
        border: none;
        padding: 8px 10px;
        border-radius: 10px;
        color: var(--text);
        font-weight: 800;
        cursor: pointer;
    }

    .pills {
        display: flex;
        gap: 10px;
        overflow-x: auto;
        scrollbar-width: none;
    }

    .pills::-webkit-scrollbar {
        display: none;
    }

    .pill {
        padding: 10px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .12);
        color: 
        font-weight: 700;
        white-space: nowrap;
        cursor: pointer;
    }

    .pill.active {
        background: var(--brand-gradient);
        color: 
        border: none;
    }

    select {
        border-radius: 14px;
        padding: 12px 14px;
        background: rgba(0, 0, 0, .65);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, .14);
        appearance: none;
        background-image: linear-gradient(45deg, transparent 50%, 
        background-position: calc(100% - 18px) calc(50% - 3px), calc(100% - 12px) calc(50% - 3px);
        background-size: 6px 6px, 6px 6px;
        background-repeat: no-repeat;
    }

    .grid {
        display: grid;
        gap: 20px;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        position: relative;
        z-index: 2;
    }

    .card {
        background: var(--panel);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: .28s;
        position: relative;
        z-index: 2;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 44px rgba(0, 0, 0, .5), 0 0 18px rgba(198, 163, 79, .28);
    }

    .thumb {
        aspect-ratio: 4/3;
        overflow: hidden;
    }

    .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .4s;
    }

    .card:hover .thumb img {
        transform: scale(1.05);
    }

    .body {
        padding: 16px;
        display: grid;
        gap: 6px;
    }

    .title-price {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .price {
        color: var(--gold);
        font-weight: 800;
    }

    .muted {
        color: var(--gold-2);
        font-size: 14px;
    }

    .actions {
        display: flex;
        gap: 8px;
        margin-top: 8px;
        align-items: center;
        position: relative;
        z-index: 3;
    }

    .btn {
        border: none;
        border-radius: 12px;
        font-weight: 700;
        padding: 10px 12px;
        cursor: pointer;
        position: relative;
        z-index: 3;
    }

    .btn-outline {
        background: rgba(255, 255, 255, .08);
        color: var(--text);
    }

    .btn-gold {
        background: var(--brand-gradient);
        color: 
    }

    .qty-input {
        width: 60px;
        padding: 8px;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, .2);
        background: rgba(0, 0, 0, .4);
        color: var(--text);
        font-size: 14px;
        text-align: center;
    }

    .empty {
        text-align: center;
        color: var(--gold-2);
        margin-top: 20px;
        padding: 40px;
        border: 1px dashed rgba(255, 255, 255, .2);
        border-radius: 16px;
    }

    .skeleton-card {
        background: var(--panel);
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, .06);
    }

    .sk-thumb {
        height: 0;
        padding-bottom: 75%;
        position: relative;
        overflow: hidden;
    }

    .sk-line {
        height: 14px;
        border-radius: 6px;
        margin: 10px 0;
    }

    .sk-line.sm {
        width: 40%;
    }

    .sk-line.md {
        width: 70%;
    }

    .sk-line.lg {
        width: 90%;
    }

    .shimmer {
        --shimmer-bg: linear-gradient(110deg, rgba(255, 255, 255, .06) 8%, rgba(255, 255, 255, .14) 18%, rgba(255, 255, 255, .06) 33%);
        background: rgba(255, 255, 255, .06);
        position: relative;
        overflow: hidden;
    }

    .shimmer::after {
        content: "";
        position: absolute;
        inset: 0;
        background: var(--shimmer-bg);
        transform: translateX(-100%);
        animation: shimmer 1.2s linear infinite;
    }

    @keyframes shimmer {
        to {
            transform: translateX(100%);
        }
    }
</style>

<div class="page-wrap">
    <div class="intro">
        <h1>Shop Authentic Crafts</h1>
        <p>Browse by category and price. Every purchase supports Sri Lankan artisans.</p>
    </div>

    <div class="filter-wrap">
        <div class="filter-bar">
            <div class="search-wrap">
                <input type="search" id="q" placeholder="Search crafts, artisans…">
                <button id="clear" class="btn-clear" type="button">Clear</button>
            </div>
            <div class="pills" id="cats">
                <?php
                $cats = ['All', 'Handloom', 'Wooden Masks', 'Brass & Metal', 'Pottery', 'Lace & Beeralu'];
                foreach ($cats as $i => $c) {
                    $active = $i === 0 ? 'active' : '';
                    echo "<span class='pill $active' data-cat='" . htmlspecialchars($c, ENT_QUOTES) . "'>$c</span>";
                }
                ?>
            </div>
            <select id="sort" aria-label="Sort products">
                <option value="popular">Sort: Popular</option>
                <option value="price-asc">Price: Low to High</option>
                <option value="price-desc">Price: High to Low</option>
                <option value="title">Title A–Z</option>
            </select>
        </div>
    </div>

    <div id="grid" class="grid"></div>
    <div id="empty" class="empty" style="display:none;">No results. Try a different combination.</div>
</div>

<script>
    const grid = document.getElementById('grid');
    const empty = document.getElementById('empty');
    const q = document.getElementById('q');
    const clear = document.getElementById('clear');
    const cats = document.getElementById('cats');
    const sort = document.getElementById('sort');

    let state = {
        q: '',
        cat: 'All',
        sort: 'popular'
    };

    const money = n => 'Rs. ' + n.toLocaleString('en-LK');
    const matches = p => {
        const t = (p.title + ' ' + p.artisan + ' ' + p.cat).toLowerCase();
        if (state.q && !t.includes(state.q)) return false;
        if (state.cat !== 'All' && p.cat !== state.cat) return false;
        return true;
    };
    const sorted = arr => {
        arr = arr.slice();
        if (state.sort === 'price-asc') arr.sort((a, b) => a.price - b.price);
        else if (state.sort === 'price-desc') arr.sort((a, b) => b.price - a.price);
        else if (state.sort === 'title') arr.sort((a, b) => a.title.localeCompare(b.title));
        return arr;
    };

    function skeletonCard() {
        return `
      <article class="skeleton-card">
        <div class="sk-thumb shimmer"></div>
        <div style="padding:16px">
          <div class="sk-line lg shimmer"></div>
          <div class="sk-line md shimmer"></div>
          <div class="sk-line sm shimmer"></div>
        </div>
      </article>`;
    }

    function showSkeleton(count = 8) {
        grid.innerHTML = Array.from({
            length: count
        }).map(skeletonCard).join('');
        empty.style.display = 'none';
    }

    function wireCardButtons(scope = document) {
        
        scope.querySelectorAll('[data-add]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                const id = btn.dataset.id;
                const qtyInput = btn.closest('.actions')?.querySelector('.qty-input') ||
                    document.querySelector(`.qty-input[data-qty-id="${id}"]`);
                let qty = qtyInput ? parseInt(qtyInput.value, 10) : 1;
                if (isNaN(qty) || qty < 1) qty = 1;
                if (window.addToCart) window.addToCart(id, qty);
                btn.textContent = 'Added ✓';
                btn.classList.add('added');
            }, {
                passive: false
            });
        });

        scope.querySelectorAll('[data-wish]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                if (window.toggleWishlist) window.toggleWishlist(btn.dataset.id);
            }, {
                passive: false
            });
        });
    }

    function render() {
        const items = sorted(window.CATALOG.filter(matches));
        grid.innerHTML = items.map(p => `
      <article class="card">
        <div class="thumb"><img src="${p.img}" alt="${p.title}"></div>
        <div class="body">
          <div class="title-price">
            <strong>${p.title}</strong>
            <span class="price">${money(p.price)}</span>
          </div>
          <div class="muted">${p.artisan} • ${p.region} • ${p.cat}</div>
          <div class="actions">
            <input type="number" min="1" value="1" class="qty-input" data-qty-id="${p.id}">
            <button class="btn btn-outline" type="button" data-wish data-id="${p.id}">♡ Wishlist</button>
            <button class="btn btn-gold"    type="button" data-add  data-id="${p.id}">Add to Cart</button>
          </div>
        </div>
      </article>`).join('');
        empty.style.display = items.length ? 'none' : 'block';

        
        wireCardButtons(grid);
        if (window.refreshWishlistBadges) window.refreshWishlistBadges();
    }

    const RENDER_DELAY = 350;

    function withSkeleton(next) {
        showSkeleton(8);
        setTimeout(next, RENDER_DELAY);
    }

    q.addEventListener('input', () => {
        state.q = q.value.trim().toLowerCase();
        clear.style.display = state.q ? 'inline-flex' : 'none';
        withSkeleton(render);
    });
    clear.addEventListener('click', () => {
        q.value = '';
        state.q = '';
        clear.style.display = 'none';
        withSkeleton(render);
    });
    cats.addEventListener('click', e => {
        const pill = e.target.closest('.pill');
        if (!pill) return;
        cats.querySelectorAll('.pill').forEach(x => x.classList.remove('active'));
        pill.classList.add('active');
        state.cat = pill.dataset.cat;
        withSkeleton(render);
    });
    sort.addEventListener('change', () => {
        state.sort = sort.value;
        withSkeleton(render);
    });

    showSkeleton(8);
    window.addEventListener('load', () => withSkeleton(render));
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>