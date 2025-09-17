<?php

$title = 'Heritage • Home';
$page  = 'home';
include __DIR__ . '/partials/header.php';
?>

<style>
    :root {
        --headerH: 88px;
    }


    .mini-cart,

    .cart-trigger,
    .header-cart,
    [data-role="mini-cart"],
    .mini-cart-backdrop,
    .cart-fab,
    .cart-float,
    .cart-bubble,
    .fab-cart,
    .floating-cart,
    [class*="mini-cart" i],
    [id*="mini-cart" i],
    [class*="cart-drawer" i],
    [id*="cart-drawer" i],
    [class*="cart-panel" i],
    [id*="cart-panel" i],
    [class*="header-cart" i],
    [id*="header-cart" i],
    [class*="cart-icon" i],
    [id*="cart-icon" i],
    [aria-label*="cart" i],
    [data-open*="cart" i],
    [data-target*="cart" i] {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        pointer-events: none !important;
    }


    [class*="cart" i],
    [id*="cart" i] {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        pointer-events: none !important
    }


    .brand {
        display: flex;
        align-items: center;
        gap: 12px
    }

    .brand img.logo {
        height: 48px;
        width: auto;
        display: block
    }

    .brand b {
        font-size: 1.6rem;
        font-weight: 900
    }


    body::before {
        content: "";
        position: fixed;
        inset: 0;
        background: url('assets/artwork.png') center/cover no-repeat;
        opacity: .10;
        z-index: -1;
        pointer-events: none
    }

    .masthead-spacer {
        height: var(--headerH)
    }

    .header.scrolled {
        background: rgba(11, 11, 11, .92);
        border-bottom: var(--outline)
    }

    @media (min-width:981px) {

        .drawer,
        .backdrop {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            overflow: hidden !important
        }
    }


    .landing-hero {
        position: relative;
        isolation: isolate;
        min-height: clamp(640px, 86vh, 940px);
        border-radius: 28px;
        overflow: hidden;
        background: var(--panel);
        border: var(--outline);
        box-shadow: var(--shadow);
        margin: 0 0 34px;
    }

    .landing-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: url('assets/artwork.png') center/cover no-repeat;
        opacity: .16;
        filter: contrast(110%) saturate(105%)
    }

    .landing-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, .55), rgba(0, 0, 0, 0) 28%);
        pointer-events: none
    }

    .landing-grid {
        position: relative;
        z-index: 1;
        display: grid;
        gap: clamp(16px, 3vw, 32px);
        grid-template-columns: 1.45fr .9fr;
        align-items: center;
        padding: clamp(24px, 4vw, 46px);
        min-height: inherit
    }

    @media (max-width:1024px) {
        .landing-grid {
            grid-template-columns: 1fr
        }
    }

    .fan-stage {
        position: relative;
        height: min(74vh, 760px);
        min-height: 480px;
        display: grid;
        place-items: center;
        overflow: hidden
    }

    .fan {
        position: absolute;
        left: 0;
        top: 50%;
        transform: translate(-6%, -130%) scale(.94);
        width: clamp(420px, 44vw, 1100px);
        max-height: 82%;
        object-fit: contain;
        filter: drop-shadow(0 32px 50px rgba(0, 0, 0, .55));
        opacity: 0;
        animation: fanSlot 18s ease-in-out infinite;
        will-change: transform, opacity
    }

    .fan.f2 {
        animation-delay: 6s
    }

    .fan.f3 {
        animation-delay: 12s
    }

    @keyframes fanSlot {
        0% {
            opacity: 0;
            transform: translate(-6%, -130%) scale(.94) rotate(-3deg)
        }

        12% {
            opacity: 1;
            transform: translate(-6%, -50%) scale(1) rotate(0)
        }

        28% {
            opacity: 1;
            transform: translate(-6%, -50%) scale(1) rotate(0)
        }

        33% {
            opacity: 0;
            transform: translate(-6%, 130%) scale(.96) rotate(3deg)
        }

        100% {
            opacity: 0;
            transform: translate(-6%, 130%) scale(.96) rotate(3deg)
        }
    }

    .landing-copy {
        max-width: 720px
    }

    .landing-copy .kicker {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .07);
        border: 1px solid rgba(255, 255, 255, .14);
        color: var(--gold-2);
        font-weight: 800;
    }

    .landing-copy h1 {
        font-size: clamp(42px, 6.8vw, 100px);
        line-height: 1.02;
        font-weight: 900;
        margin: 12px 0 8px;
        letter-spacing: -.02em
    }

    .landing-copy p {
        color: var(--gold-2);
        max-width: 64ch
    }

    .landing-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 16px
    }


    .remarkable {
        margin: 28px 0 36px
    }

    .remarkable h2 {
        text-align: center;
        font-size: clamp(26px, 3.2vw, 38px);
        margin: 0 0 12px;
        font-weight: 900;
        letter-spacing: .2px
    }

    .remarkable .subtitle {
        color: var(--gold-2);
        text-align: center;
        margin-bottom: 18px
    }

    .deck-wrap {
        position: relative
    }

    .deck {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: min(72vw, 420px);
        gap: 18px;
        overflow: auto;
        padding: 10px 10px 26px;
        scroll-snap-type: x mandatory;
        scrollbar-width: none;
        perspective: 1200px
    }

    .deck::-webkit-scrollbar {
        display: none
    }

    .deck-card {
        position: relative;
        height: min(56vh, 520px);
        border-radius: 20px;
        overflow: hidden;
        border: var(--outline);
        scroll-snap-align: center;
        transform-style: preserve-3d;
        background: var(--panel);
        box-shadow: 0 18px 50px rgba(0, 0, 0, .35);
        transition: transform .35s ease, box-shadow .35s ease, filter .35s ease;
        filter: saturate(.92) contrast(.98) brightness(.92);
    }

    .deck-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, .0), rgba(0, 0, 0, .45) 60%, rgba(0, 0, 0, .75));
        z-index: 1
    }

    .deck-card img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: translateZ(0)
    }

    .deck-card .cap {
        position: absolute;
        left: 16px;
        right: 16px;
        bottom: 16px;
        z-index: 2;
        color: #fff;
        text-shadow: 0 2px 16px rgba(0, 0, 0, .6);
    }

    .deck-card .cap h3 {
        margin: 0 0 6px;
        font-size: clamp(18px, 2.6vw, 26px);
        font-weight: 900
    }

    .deck-card .cap p {
        margin: 0;
        color: rgba(255, 255, 255, .9)
    }


    .deck-card {
        transform: rotateY(-6deg) translateY(8px) scale(.92)
    }

    .deck-card.is-active {
        transform: rotateY(0deg) translateY(0) scale(1);
        filter: saturate(1) contrast(1) brightness(1);
        box-shadow: 0 30px 70px rgba(0, 0, 0, .55);
        z-index: 5
    }


    .deck-nav {
        position: absolute;
        inset: 0;
        pointer-events: none
    }

    .deck-btn {
        pointer-events: auto;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .14);
        background: rgba(0, 0, 0, .45);
        backdrop-filter: blur(4px);
        color: #fff;
        font-weight: 900;
        display: grid;
        place-items: center;
        cursor: pointer;
    }

    .deck-btn.prev {
        left: -6px
    }

    .deck-btn.next {
        right: -6px
    }

    @media(max-width:760px) {
        .deck-btn {
            display: none
        }
    }


    .section {
        margin: 40px 0
    }

    .section .section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px
    }

    .section h2 {
        font-size: clamp(24px, 3vw, 36px)
    }

    .card {
        position: relative;
        background: var(--panel);
        border-radius: 20px;
        overflow: hidden
    }

    .card::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: inherit;
        padding: 1px;
        background: linear-gradient(180deg, rgba(198, 163, 79, .35), rgba(198, 163, 79, .06));
        -webkit-mask: linear-gradient(180deg, rgba(198, 163, 79, .35), rgba(198, 163, 79, .06));
        mask: linear-gradient(180deg, rgba(198, 163, 79, .35), rgba(198, 163, 79, .06));
        -webkit-mask-composite: xor;
        mask-composite: exclude;
    }

    .card .thumb {
        aspect-ratio: 4/3;
        background: rgba(255, 255, 255, .04);
        overflow: hidden
    }

    .card .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease
    }

    .card:hover .thumb img {
        transform: scale(1.05)
    }

    .card .body {
        padding: 14px
    }
</style>


<div class="masthead-spacer"></div>


<section class="landing-hero">
    <div class="landing-grid">
        <div class="fan-stage" aria-hidden="true">
            <img class="fan f1" src="assets/fangrid1.png" alt="">
            <img class="fan f2" src="assets/fangrid2.png" alt="">
            <img class="fan f3" src="assets/fangrid3.png" alt="">
        </div>
        <div class="landing-copy">
            <span class="kicker">Crafted in Sri Lanka</span>
            <h1>Exquisite Handlooms, Masks & Cultural Experiences.</h1>
            <p>Discover authentic crafts from master artisans and book immersive workshops. Every purchase supports local makers and preserves heritage.</p>
            <div class="landing-actions">
                <a class="btn btn-gold" href="/products">Shop Crafts</a>
                <a class="btn btn-ghost" href="/experiences">Book an Experience</a>
            </div>
        </div>
    </div>
</section>


<section class="remarkable">
    <h2>Remarkable Treasures of Sri Lankan Craft &amp; Culture</h2>
    <p class="subtitle">A living gallery of stories, skills, and sacred traditions.</p>

    <div class="deck-wrap">
        <div class="deck" id="deck">

            <article class="deck-card is-active">
                <img src="assets/pic1.jpg" alt="Sigiriya Frescoes">
                <div class="cap">
                    <h3>Sigiriya Frescoes</h3>
                    <p>The world-famous celestial maidens painted on the western face of Sigiriya’s rock fortress.</p>
                </div>
            </article>

            <article class="deck-card">
                <img src="assets/pic2.jpg" alt="Sri Lankan traditional masks">
                <div class="cap">
                    <h3>Sri Lankan Traditional Masks</h3>
                    <p>Kolam, Raksha, and Sanni—intricate forms with bold colour and mythic energy.</p>
                </div>
            </article>

            <article class="deck-card">
                <img src="assets/pic3.jpg" alt="Dambulla Cave Temple Frescoes">
                <div class="cap">
                    <h3>Dambulla Cave Temple Frescoes</h3>
                    <p>Vast murals and over 150 Buddha statues illuminate centuries of Buddhist devotion.</p>
                </div>
            </article>

            <article class="deck-card">
                <img src="assets/pic4.jpg" alt="Sri Lankan Laksha">
                <div class="cap">
                    <h3>Sri Lankan Laksha</h3>
                    <p>Layered natural resins polished to brilliant patterns on wood, from boxes to walking sticks.</p>
                </div>
            </article>

            <article class="deck-card">
                <img src="assets/pic5.jpg" alt="Sri Lankan traditional ceramics">
                <div class="cap">
                    <h3>Sri Lankan Traditional Ceramics</h3>
                    <p>Clay shaped by heritage—durable wares prized for artistry and everyday use.</p>
                </div>
            </article>
        </div>


        <div class="deck-nav">
            <button class="deck-btn prev" type="button" aria-label="Previous">&lt;</button>
            <button class="deck-btn next" type="button" aria-label="Next">&gt;</button>
        </div>
    </div>
</section>


<section class="section" id="home-featured">
    <div class="section-head">
        <h2>Featured Crafts</h2>
        <a class="see-all" href="/products">See all</a>
    </div>
    <div class="grid">
        <?php
        $items = [
            ['img' => '/assets/shop1.png', 'title' => 'Handloom Saree – Sand Dunes', 'price' => 'Rs. 19,500', 'by' => 'Kalpani • Kurunegala'],
            ['img' => '/assets/shop2.png', 'title' => 'Ambalangoda Mask – Guardian', 'price' => 'Rs. 24,900', 'by' => 'Prasanna • Galle'],
            ['img' => '/assets/shop3.png', 'title' => 'Brass Oil Lamp – Peacock', 'price' => 'Rs. 32,000', 'by' => 'Sanjeewa • Kandy'],
            ['img' => '/assets/shop4.png', 'title' => 'Pottery Set – Terracotta', 'price' => 'Rs. 9,800', 'by' => 'Nuwani • Matara'],
        ];
        foreach ($items as $i): ?>
            <article class="card">
                <div class="thumb"><img src="<?= $i['img'] ?>" alt="<?= htmlspecialchars($i['title']) ?>"></div>
                <div class="body">
                    <div style="display:flex;align-items:center;justify-content:space-between;gap:10px">
                        <strong><?= htmlspecialchars($i['title']) ?></strong>
                        <span class="price"><?= $i['price'] ?></span>
                    </div>
                    <div class="muted"><?= htmlspecialchars($i['by']) ?></div>
                    <div class="actions-row">
                        <button class="btn btn-outline">Wishlist ♡</button>
                        <button class="btn btn-gold">Add to Cart</button>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>


<section class="section" id="home-experiences">
    <div class="section-head">
        <h2>Trending Experiences</h2>
        <a class="see-all" href="/experiences">Explore more</a>
    </div>
    <div class="grid">
        <?php for ($i = 0; $i < 4; $i++): ?>
            <article class="card">
                <div class="thumb"><img src="assets/experience<?= $i + 1 ?>.jpg" alt="Pottery Basics"></div>
                <div class="body">
                    <div style="display:flex;align-items:center;justify-content:space-between;gap:10px">
                        <strong>Pottery Basics (2h)</strong>
                        <span class="price">Rs. 4,500</span>
                    </div>
                    <div class="muted">Galle • Sat, 10:00 AM</div>
                    <div class="meta">
                        <span>Seats</span>
                        <div class="seats"><i style="width:72%"></i></div>
                        <span>9/12</span>
                    </div>
                    <div class="actions-row">
                        <a class="btn btn-outline" href="/experiences">Details</a>
                        <a class="btn btn-gold" href="/experiences">Book Seat</a>
                    </div>
                </div>
            </article>
        <?php endfor; ?>
    </div>
</section>

<script>
    const header = document.querySelector('.header');
    const onScroll = () => header && header.classList.toggle('scrolled', window.scrollY > 4);
    window.addEventListener('scroll', onScroll);
    onScroll();


    const SEL = [
        '.mini-cart',
        '.mini-cart-backdrop', '.cart-fab', '.cart-float', '.cart-bubble', '.fab-cart', '.floating-cart',
        '.mini-cart-backdrop', '.cart-fab', '.cart-float', '.cart-bubble', '.fab-cart', '.floating-cart',
        '[class*="mini-cart" i]', '[id*="mini-cart" i]', '[class*="cart-drawer" i]', '[id*="cart-drawer" i]',
        '[class*="cart-panel" i]', '[id*="cart-panel" i]', '[class*="header-cart" i]', '[id*="header-cart" i]',
        '[class*="cart-icon" i]', '[id*="cart-icon" i]', '[aria-label*="cart" i]', '[data-open*="cart" i]', '[data-target*="cart" i]',
        '[class*="cart" i]', '[id*="cart" i]'
    ];
    const nuke = (root = document) => SEL.forEach(s => root.querySelectorAll(s).forEach(el => {
        try {
            el.remove()
        } catch (e) {
            el.style.display = 'none';
            el.hidden = true;
            el.setAttribute('aria-hidden', 'true')
        }
    }));
    nuke();
    new MutationObserver(ms => ms.forEach(m => m.addedNodes && m.addedNodes.forEach(n => {
        if (n.nodeType === 1) nuke(n)
    }))).observe(document.documentElement, {
        childList: true,
        subtree: true
    });


    (function deck() {
        const deck = document.getElementById('deck');
        if (!deck) return;


        const activateCenter = () => {
            const cards = [...deck.children];
            const mid = deck.getBoundingClientRect().left + deck.clientWidth / 2;
            let best, bestDist = Infinity;
            cards.forEach(c => {
                const r = c.getBoundingClientRect();
                const center = r.left + r.width / 2;
                const d = Math.abs(center - mid);
                if (d < bestDist) {
                    bestDist = d;
                    best = c;
                }
            });
            cards.forEach(c => c.classList.remove('is-active'));
            if (best) best.classList.add('is-active');
        };


        deck.addEventListener('scroll', () => requestAnimationFrame(activateCenter));
        window.addEventListener('resize', activateCenter);
        activateCenter();


        let isDown = false,
            startX, scrollStart;
        const down = (x) => {
            isDown = true;
            startX = x;
            scrollStart = deck.scrollLeft;
            deck.classList.add('dragging')
        };
        const move = (x) => {
            if (!isDown) return;
            deck.scrollLeft = scrollStart - (x - startX)
        };
        const up = () => {
            isDown = false;
            deck.classList.remove('dragging')
        };
        deck.addEventListener('mousedown', e => down(e.pageX));
        window.addEventListener('mousemove', e => move(e.pageX));
        window.addEventListener('mouseup', up);
        deck.addEventListener('touchstart', e => down(e.touches[0].pageX), {
            passive: true
        });
        deck.addEventListener('touchmove', e => move(e.touches[0].pageX), {
            passive: true
        });
        deck.addEventListener('touchend', up);


        const prev = document.querySelector('.deck-btn.prev');
        const next = document.querySelector('.deck-btn.next');
        const scrollByAmount = () => Math.min(deck.clientWidth * 0.8, 480);
        prev?.addEventListener('click', () => deck.scrollBy({
            left: -scrollByAmount(),
            behavior: 'smooth'
        }));
        next?.addEventListener('click', () => deck.scrollBy({
            left: scrollByAmount(),
            behavior: 'smooth'
        }));


        deck.addEventListener('wheel', (e) => {
            if (Math.abs(e.deltaX) < Math.abs(e.deltaY)) {
                deck.scrollBy({
                    left: e.deltaY,
                    behavior: 'auto'
                });
                e.preventDefault();
            }
        }, {
            passive: false
        });
    })();
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>