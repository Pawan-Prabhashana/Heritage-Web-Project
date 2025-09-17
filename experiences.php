<?php

$title = 'Heritage • Experiences';
$page  = 'experiences';
include __DIR__ . '/partials/header.php';
?>

<style>
    :root {
        --pageMax: 1320px;
        --headerH: 88px;
        
        --gold: 
        --gold-2: 
        --panel: 
        --text: 
        --outline: 1px solid rgba(255, 215, 0, .20);
        --brand-gradient: linear-gradient(135deg, var(--gold), var(--gold-2));
    }

    
    body::before {
        content: "";
        position: fixed;
        inset: 0;
        background: url('assets/artwork.png') center/cover no-repeat;
        opacity: .08;
        z-index: -1;
        pointer-events: none;
    }

    
    @media(min-width:981px) {

        .drawer,
        .backdrop {
            display: none !important;
        }
    }

    .header.scrolled {
        background: rgba(11, 11, 11, .95);
        border-bottom: var(--outline);
    }

    
    .top-spacer {
        height: var(--headerH);
    }

    
    .heroX {
        padding: 22px 0 24px;
    }

    .heroX-wrap {
        max-width: var(--pageMax);
        margin: 0 auto;
        padding: 0 22px;
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 28px;
        align-items: center;
    }

    @media(max-width:1024px) {
        .heroX-wrap {
            grid-template-columns: 1fr;
            text-align: center;
        }
    }

    .kicker {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .12);
        color: 
        font-weight: 800;
    }

    .heroX h1 {
        font-size: clamp(34px, 5.2vw, 72px);
        line-height: 1.04;
        margin: 14px 0 10px;
        font-weight: 900;
    }

    .heroX p {
        color: var(--gold-2);
        font-size: 18px;
        margin: 10px 0 0;
        max-width: 62ch;
    }

    .heroX-stats {
        display: flex;
        gap: 12px;
        margin-top: 18px;
        flex-wrap: wrap;
    }

    .stat {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 14px;
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .12);
        color: 
        font-weight: 800;
    }

    
    .heroX-right {
        position: relative;
        min-height: clamp(380px, 44vw, 720px);
        overflow: visible;
    }

    .fan-safe {
        position: absolute;
        inset: 0;
        display: grid;
        place-items: center;
        padding-right: min(6vw, 64px);
        padding-left: min(2vw, 24px);
    }

    .fan-img {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -130%) scale(1.04);
        width: min(86%, 680px);
        opacity: 0;
        filter: drop-shadow(0 30px 70px rgba(0, 0, 0, .55));
        animation: fanRight 18s infinite;
    }

    .fan-img:nth-child(1) {
        animation-delay: 0s;
    }

    .fan-img:nth-child(2) {
        animation-delay: 6s;
    }

    .fan-img:nth-child(3) {
        animation-delay: 12s;
    }

    @keyframes fanRight {
        0% {
            opacity: 0;
            transform: translate(-50%, -130%) scale(1.04)
        }

        10% {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1.00)
        }

        30% {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1.00)
        }

        40% {
            opacity: 0;
            transform: translate(-50%, 130%) scale(.96)
        }

        100% {
            opacity: 0
        }
    }

    @media(max-width:1024px) {
        .fan-img {
            width: min(90%, 560px);
        }
    }

    
    .filter-wrap {
        position: relative;
        z-index: 10;
    }

    .filter-bar {
        position: sticky;
        
        top: var(--headerH);
        
        display: grid;
        grid-template-columns: 1.3fr 1fr auto;
        gap: 12px;
        align-items: center;
        background: rgba(20, 20, 20, .92);
        backdrop-filter: blur(12px);
        padding: 12px 22px;
        border: 1px solid rgba(255, 215, 0, .20);
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .55);
        margin: 0 auto 18px;
        max-width: var(--pageMax);
    }

    @media(max-width:1100px) {
        .filter-bar {
            grid-template-columns: 1fr;
            row-gap: 10px;
        }
    }

    .searchBox {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 14px;
        background: rgba(0, 0, 0, .6);
        border: 1px solid rgba(255, 255, 255, .14);
    }

    .searchBox input {
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

    .group {
        display: flex;
        gap: 10px;
    }

    .group select {
        flex: 1;
        border-radius: 14px;
        padding: 12px 14px;
        background: rgba(0, 0, 0, .65);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, .14);
        appearance: none;
        background-image: linear-gradient(45deg, transparent 50%, 
            linear-gradient(135deg, 
        background-position: calc(100% - 18px) calc(50% - 3px), calc(100% - 12px) calc(50% - 3px);
        background-size: 6px 6px, 6px 6px;
        background-repeat: no-repeat;
    }

    @media(max-width:1100px) {
        .group {
            flex-direction: column;
        }
    }

    
    .wrap {
        max-width: var(--pageMax);
        margin: 0 auto;
        padding: 0 22px 40px;
    }

    .grid {
        display: grid;
        gap: 22px;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    }

    .xcard {
        position: relative;
        overflow: hidden;
        border-radius: 18px;
        background: var(--panel);
        border: 1px solid rgba(255, 255, 255, .08);
        box-shadow: 0 20px 46px rgba(0, 0, 0, .45);
    }

    .xcard .thumb {
        position: relative;
        aspect-ratio: 4/3;
        overflow: hidden;
    }

    .xcard .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.02);
        transition: transform .4s;
    }

    .xcard:hover .thumb img {
        transform: scale(1.06);
    }

    .xcard .tag {
        position: absolute;
        top: 12px;
        left: 12px;
        z-index: 2;
        background: rgba(0, 0, 0, .5);
        color: 
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
        border: 1px solid rgba(255, 255, 255, .2);
    }

    .xcard .body {
        padding: 14px;
        display: grid;
        gap: 10px;
    }

    .xcard .titleRow {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .xcard strong {
        font-size: 18px;
    }

    .price {
        color: var(--gold);
        font-weight: 800;
    }

    .muted {
        color: var(--gold-2);
        font-size: 14px;
    }

    .meta {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .seats {
        height: 16px;
        flex: 1;
        background: rgba(255, 255, 255, .08);
        border-radius: 999px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, .12);
        box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .25);
    }

    .seats i {
        display: block;
        height: 100%;
        background: linear-gradient(90deg, 
        width: 0;
        transition: width .25s ease, box-shadow .25s ease;
    }

    .seats i.bump {
        box-shadow: 0 0 12px rgba(198, 163, 79, .45);
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .btn {
        border: none;
        border-radius: 12px;
        padding: 10px 12px;
        font-weight: 800;
        cursor: pointer;
    }

    .btn-outline {
        background: rgba(255, 255, 255, .08);
        color: 
    }

    .btn-gold {
        background: var(--brand-gradient);
        color: 
    }

    .empty {
        text-align: center;
        color: var(--gold-2);
        padding: 40px;
        border: 1px dashed rgba(255, 255, 255, .2);
        border-radius: 16px;
        display: none;
    }

    
    .ticket-modal {
        position: fixed;
        inset: 0;
        z-index: 80;
        display: none;
        align-items: center;
        justify-content: center;
        background: radial-gradient(600px 400px at 50% 0%, rgba(198, 163, 79, .12), transparent 60%), rgba(0, 0, 0, .6);
        backdrop-filter: blur(4px);
    }

    .ticket-modal.open {
        display: flex;
    }

    .ticket {
        width: min(520px, 90vw);
        background: rgba(20, 20, 20, .92);
        border: var(--outline);
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 30px 70px rgba(0, 0, 0, .6);
    }

    .ticket header {
        padding: 14px 16px;
        border-bottom: var(--outline);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ticket main {
        padding: 18px 16px;
        display: grid;
        gap: 8px;
    }

    .ticket .row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .ticket .big {
        font-size: 20px;
        font-weight: 900;
    }

    .ticket footer {
        padding: 14px 16px;
        border-top: var(--outline);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn-ghost {
        background: transparent;
        color: 
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 12px;
        padding: 10px 12px;
        font-weight: 800;
        cursor: pointer;
    }
</style>

<script>
    
    const headerEl = document.querySelector('.header');

    function applyHeaderHeight() {
        const h = headerEl ? headerEl.offsetHeight : 88;
        document.documentElement.style.setProperty('--headerH', h + 'px');
        headerEl?.classList.toggle('scrolled', window.scrollY > 4);
    }
    document.addEventListener('DOMContentLoaded', applyHeaderHeight);
    window.addEventListener('load', applyHeaderHeight);
    window.addEventListener('resize', applyHeaderHeight);
    window.addEventListener('scroll', () => headerEl?.classList.toggle('scrolled', window.scrollY > 4));
</script>


<div class="top-spacer"></div>


<section class="heroX">
    <div class="heroX-wrap">
        <div class="heroX-left">
            <span class="kicker">Crafted in Sri Lanka</span>
            <h1>Hands-on Cultural Experiences & Workshops</h1>
            <p>Learn from master artisans. Book small-group sessions in pottery, mask carving, handloom weaving, brass casting, and more. Every ticket supports makers and safeguards traditions.</p>
            <div class="heroX-stats">
                <div class="stat">⭐ 4.9 avg rating</div>
                <div class="stat">👥 Small groups</div>
                <div class="stat">🕒 1–3 hours</div>
            </div>
        </div>
        <div class="heroX-right" aria-hidden="true">
            <div class="fan-safe">
                <img class="fan-img" src="assets/fangrid1.png" alt="">
                <img class="fan-img" src="assets/fangrid2.png" alt="">
                <img class="fan-img" src="assets/fangrid3.png" alt="">
            </div>
        </div>
    </div>
</section>


<div class="filter-wrap">
    <div class="filter-bar">
        <div class="searchBox">
            <input type="search" id="q" placeholder="Search experiences, districts, artisans…">
            <button id="clearQ" class="btn-clear" type="button">Clear</button>
        </div>

        <div class="pills" id="cats">
            <?php
            $cats = ['All', 'Pottery', 'Wooden Masks', 'Handloom', 'Brass Casting', 'Beeralu Lace'];
            foreach ($cats as $i => $c) {
                $active = $i === 0 ? 'active' : '';
                echo "<span class='pill $active' data-cat='" . htmlspecialchars($c, ENT_QUOTES) . "'>$c</span>";
            }
            ?>
        </div>

        <div class="group">
            <select id="region" aria-label="Filter by district">
                <?php
                $districts = [
                    'All Districts',
                    'Ampara',
                    'Anuradhapura',
                    'Badulla',
                    'Batticaloa',
                    'Colombo',
                    'Galle',
                    'Gampaha',
                    'Hambantota',
                    'Jaffna',
                    'Kalutara',
                    'Kandy',
                    'Kegalle',
                    'Kilinochchi',
                    'Kurunegala',
                    'Mannar',
                    'Matale',
                    'Matara',
                    'Monaragala',
                    'Mullaitivu',
                    'Nuwara Eliya',
                    'Polonnaruwa',
                    'Puttalam',
                    'Ratnapura',
                    'Trincomalee',
                    'Vavuniya'
                ];
                foreach ($districts as $d) {
                    $v = htmlspecialchars($d, ENT_QUOTES);
                    echo "<option value=\"$v\">$d</option>";
                }
                ?>
            </select>

            <select id="sort" aria-label="Sort experiences">
                <option value="popular">Sort: Popular</option>
                <option value="price-asc">Price: Low to High</option>
                <option value="price-desc">Price: High to Low</option>
                <option value="title">Title A–Z</option>
                <option value="soon">Date: Soonest</option>
            </select>
        </div>
    </div>
</div>


<div class="wrap">
    <div id="grid" class="grid"></div>
    <div id="empty" class="empty">No experiences found. Try a different filter.</div>
</div>


<div class="ticket-modal" id="ticketModal" aria-hidden="true">
    <div class="ticket" role="dialog" aria-modal="true" aria-labelledby="tTitle">
        <header>
            <strong id="tTitle">Your Heritage Ticket</strong>
            <button class="btn-ghost" id="tClose">Close</button>
        </header>
        <main id="tBody"></main>
        <footer>
            <button class="btn-ghost" id="tDone">Done</button>
        </footer>
    </div>
</div>

<script>
    
    const EXP = [{
            id: 101,
            title: 'Pottery Basics (2h)',
            cat: 'Pottery',
            city: 'Galle',
            district: 'Galle',
            start: '2025-09-05T10:00:00',
            seats: 12,
            booked: 7,
            price: 4500,
            artisan: 'Ishara'
        },
        {
            id: 102,
            title: 'Mask Carving Intro (3h)',
            cat: 'Wooden Masks',
            city: 'Ambalangoda',
            district: 'Galle',
            start: '2025-09-03T14:00:00',
            seats: 10,
            booked: 4,
            price: 6800,
            artisan: 'Prasanna'
        },
        {
            id: 103,
            title: 'Handloom Weaving Trial (2h)',
            cat: 'Handloom',
            city: 'Colombo',
            district: 'Colombo',
            start: '2025-09-01T09:00:00',
            seats: 8,
            booked: 3,
            price: 5200,
            artisan: 'Madhavi'
        },
        {
            id: 104,
            title: 'Brass Casting Demo (2.5h)',
            cat: 'Brass Casting',
            city: 'Kandy',
            district: 'Kandy',
            start: '2025-09-08T11:00:00',
            seats: 15,
            booked: 12,
            price: 5400,
            artisan: 'Sanjeewa'
        },
        {
            id: 105,
            title: 'Beeralu Lace Workshop (2h)',
            cat: 'Beeralu Lace',
            city: 'Galle',
            district: 'Galle',
            start: '2025-09-04T13:00:00',
            seats: 6,
            booked: 2,
            price: 4900,
            artisan: 'Iresha'
        },
        {
            id: 106,
            title: 'Advanced Pottery Wheel (3h)',
            cat: 'Pottery',
            city: 'Matara',
            district: 'Matara',
            start: '2025-09-10T10:00:00',
            seats: 10,
            booked: 6,
            price: 7200,
            artisan: 'Nuwani'
        },
        {
            id: 107,
            title: 'Mask Painting (1.5h)',
            cat: 'Wooden Masks',
            city: 'Galle',
            district: 'Galle',
            start: '2025-09-06T16:00:00',
            seats: 12,
            booked: 5,
            price: 3800,
            artisan: 'Sunil'
        },
        {
            id: 108,
            title: 'Handloom Natural Dyes (2h)',
            cat: 'Handloom',
            city: 'Kurunegala',
            district: 'Kurunegala',
            start: '2025-09-02T10:00:00',
            seats: 9,
            booked: 8,
            price: 5600,
            artisan: 'Kalpani'
        },
        {
            id: 109,
            title: 'Traditional Brass Engraving',
            cat: 'Brass Casting',
            city: 'Kegalle',
            district: 'Kegalle',
            start: '2025-09-09T09:30:00',
            seats: 8,
            booked: 3,
            price: 6000,
            artisan: 'Dilshan'
        },
        {
            id: 110,
            title: 'Handloom Patterns Masterclass',
            cat: 'Handloom',
            city: 'Nuwara Eliya',
            district: 'Nuwara Eliya',
            start: '2025-09-12T10:00:00',
            seats: 10,
            booked: 4,
            price: 7400,
            artisan: 'Amaya'
        },
    ];
    const CARD_IMGS = ['/assets/experience1.png', '/assets/experience2.png', '/assets/experience3.png', '/assets/experience4.png', '/assets/experience5.png'];

    
    const state = {
        q: '',
        cat: 'All',
        region: 'All Districts',
        sort: 'popular'
    };

    const qInput = document.getElementById('q');
    const clearQ = document.getElementById('clearQ');
    const catsEl = document.getElementById('cats');
    const regionEl = document.getElementById('region');
    const sortEl = document.getElementById('sort');
    const grid = document.getElementById('grid');
    const empty = document.getElementById('empty');

    const money = n => 'Rs. ' + Number(n).toLocaleString('en-LK');
    const soonest = (a, b) => new Date(a.start) - new Date(b.start);
    const seatsPct = x => Math.max(0, Math.min(100, Math.round((x.booked / x.seats) * 100)));

    function matches(x) {
        const t = (x.title + ' ' + x.city + ' ' + x.district + ' ' + x.cat + ' ' + x.artisan).toLowerCase();
        if (state.q && !t.includes(state.q)) return false;
        if (state.cat !== 'All' && x.cat !== state.cat) return false;
        if (state.region !== 'All Districts' && x.district !== state.region) return false;
        return true;
    }

    function sorted(list) {
        const L = list.slice();
        if (state.sort === 'price-asc') L.sort((a, b) => a.price - b.price);
        else if (state.sort === 'price-desc') L.sort((a, b) => b.price - a.price);
        else if (state.sort === 'title') L.sort((a, b) => a.title.localeCompare(b.title));
        else if (state.sort === 'soon') L.sort(soonest);
        return L;
    }

    function card(x, idx) {
        const dt = new Date(x.start);
        const nice = dt.toLocaleString([], {
            weekday: 'short',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        const pct = seatsPct(x);
        const left = Math.max(0, x.seats - x.booked);
        const sold = left === 0;
        const img = CARD_IMGS[idx % CARD_IMGS.length];
        return `
      <article class="xcard" data-id="${x.id}">
        <div class="thumb">
          <img src="${img}" alt="${x.title}">
          <span class="tag">${x.cat}</span>
        </div>
        <div class="body">
          <div class="titleRow">
            <strong>${x.title}</strong>
            <span class="price">${money(x.price)}</span>
          </div>
          <div class="muted">${x.city}, ${x.district} • ${nice} • by ${x.artisan}</div>
          <div class="meta">
            <span>Seats</span>
            <div class="seats"><i style="width:${pct}%"></i></div>
            <span class="left"><b>${left}</b>/${x.seats}</span>
          </div>
          <div class="actions">
            <button class="btn btn-outline" data-xact="details">Details</button>
            <button class="btn btn-gold" data-xact="book" ${sold?'disabled':''}>${sold?'Sold Out':'Book Seat'}</button>
          </div>
        </div>
      </article>`;
    }

    function render() {
        const items = sorted(EXP.filter(matches));
        grid.innerHTML = items.map((x, i) => card(x, i)).join('');
        empty.style.display = items.length ? 'none' : 'block';
    }

    
    qInput.addEventListener('input', () => {
        state.q = qInput.value.trim().toLowerCase();
        clearQ.style.display = state.q ? 'inline-flex' : 'none';
        render();
    });
    clearQ.addEventListener('click', () => {
        qInput.value = '';
        state.q = '';
        clearQ.style.display = 'none';
        render();
    });

    catsEl.addEventListener('click', e => {
        const pill = e.target.closest('.pill');
        if (!pill) return;
        catsEl.querySelectorAll('.pill').forEach(x => x.classList.remove('active'));
        pill.classList.add('active');
        state.cat = pill.dataset.cat;
        render();
    });

    regionEl.addEventListener('change', () => {
        state.region = regionEl.value;
        render();
    });
    sortEl.addEventListener('change', () => {
        state.sort = sortEl.value;
        render();
    });

    
    const modal = document.getElementById('ticketModal');
    const tBody = document.getElementById('tBody');
    const tClose = document.getElementById('tClose');
    const tDone = document.getElementById('tDone');

    function rand(n) {
        return Math.floor(Math.random() * n);
    }

    function ticketId(item) {
        const seed = Date.now().toString().slice(-5) + '-' + (100 + rand(900));
        return `H-${item.id}-${seed}`;
    }

    function showTicket(item) {
        const dt = new Date(item.start);
        const nice = dt.toLocaleString([], {
            weekday: 'long',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        const seatNo = item.booked;
        tBody.innerHTML = `
      <div class="row"><span class="muted">Ticket ID</span><span class="big">${ticketId(item)}</span></div>
      <div class="row"><span class="muted">Experience</span><span><strong>${item.title}</strong></span></div>
      <div class="row"><span class="muted">When</span><span>${nice}</span></div>
      <div class="row"><span class="muted">Where</span><span>${item.city}, ${item.district}</span></div>
      <div class="row"><span class="muted">Seat</span><span>Seat 
      <div class="row"><span class="muted">Instructor</span><span>${item.artisan}</span></div>
      <div class="row"><span class="muted">Price</span><span class="price">${money(item.price)}</span></div>
    `;
        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
    }

    function closeTicket() {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
    }
    tClose.addEventListener('click', closeTicket);
    tDone.addEventListener('click', closeTicket);
    modal.addEventListener('click', e => {
        if (e.target === modal) closeTicket();
    });

    document.addEventListener('click', e => {
        const el = e.target.closest('[data-xact]');
        if (!el) return;
        const card = e.target.closest('.xcard');
        if (!card) return;
        const id = +card.dataset.id;
        const item = EXP.find(x => x.id === id);
        if (!item) return;

        if (el.dataset.xact === 'details') {
            alert(`${item.title}\n${item.city}, ${item.district}\n${new Date(item.start).toLocaleString()}\n${money(item.price)}\nInstructor: ${item.artisan}`);
            return;
        }
        if (el.dataset.xact === 'book') {
            if (item.booked >= item.seats) return;
            item.booked += 1;

            const leftEl = card.querySelector('.left b');
            const barEl = card.querySelector('.seats i');
            const btnEl = card.querySelector('[data-xact="book"]');

            const left = Math.max(0, item.seats - item.booked);
            leftEl.textContent = left;
            barEl.style.width = Math.round((item.booked / item.seats) * 100) + '%';
            barEl.classList.remove('bump');
            void barEl.offsetWidth;
            barEl.classList.add('bump');

            if (left === 0) {
                btnEl.textContent = 'Sold Out';
                btnEl.disabled = true;
            }
            showTicket(item);
        }
    });

    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', render);
    } else {
        render();
    }
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>