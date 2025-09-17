<?php  ?>
<?php
$title = 'Heritage • About';
$page  = 'about';
include __DIR__ . '/partials/header.php';
?>

<style>
    
    .about-hero {
        position: relative;
        isolation: isolate;
        margin: 22px 0 18px;
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(255, 255, 255, .05), rgba(255, 255, 255, .02));
        border: var(--outline);
        box-shadow: var(--shadow);
        overflow: hidden
    }

    .about-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        opacity: .10;
        pointer-events: none;
        background: url('assets/artwork.png') center/cover no-repeat;
        filter: contrast(110%) saturate(105%)
    }

    .about-hero-inner {
        position: relative;
        display: grid;
        gap: 18px;
        grid-template-columns: 1.2fr .9fr;
        padding: 54px 32px
    }

    @media(max-width:980px) {
        .about-hero-inner {
            grid-template-columns: 1fr
        }
    }

    .about-kicker {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .12);
        color: 
        font-weight: 800
    }

    .about-hero h1 {
        font-size: clamp(34px, 6vw, 62px);
        line-height: 1.08;
        margin: 10px 0 8px
    }

    .about-hero p {
        max-width: 64ch
    }

    .about-visual {
        align-self: end;
        display: grid;
        place-items: center;
        padding: 10px
    }

    .about-card {
        width: min(560px, 100%);
        aspect-ratio: 16/10;
        border-radius: 22px;
        border: var(--outline);
        display: grid;
        place-items: center;
        background: linear-gradient(180deg, rgba(255, 255, 255, .06), rgba(255, 255, 255, .02))
    }

    .about-card img {
        max-width: 92%;
        filter: drop-shadow(0 28px 40px rgba(0, 0, 0, .6));
        opacity: .85
    }

    
    .value-grid {
        display: grid;
        gap: 16px;
        grid-template-columns: repeat(3, 1fr)
    }

    @media(max-width:1100px) {
        .value-grid {
            grid-template-columns: repeat(2, 1fr)
        }
    }

    @media(max-width:720px) {
        .value-grid {
            grid-template-columns: 1fr
        }
    }

    .value-card {
        border-radius: 18px;
        border: var(--outline);
        background: var(--panel);
        padding: 18px;
        box-shadow: var(--shadow)
    }

    .value-card strong {
        display: flex;
        gap: 10px;
        align-items: center;
        font-size: 18px
    }

    .value-card strong i {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: grid;
        place-items: center;
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .12)
    }

    
    .impact {
        display: grid;
        gap: 16px;
        grid-template-columns: repeat(4, 1fr)
    }

    @media(max-width:1100px) {
        .impact {
            grid-template-columns: repeat(2, 1fr)
        }
    }

    @media(max-width:720px) {
        .impact {
            grid-template-columns: 1fr
        }
    }

    .impact .kpi {
        border-radius: 18px;
        border: var(--outline);
        background: linear-gradient(180deg, rgba(255, 255, 255, .05), rgba(255, 255, 255, .02));
        padding: 22px 18px;
        box-shadow: var(--shadow);
        text-align: center
    }

    .impact .num {
        font-weight: 900;
        font-size: clamp(28px, 4.8vw, 44px);
        letter-spacing: .4px
    }

    .impact .label {
        color: var(--muted);
        font-weight: 600
    }

    
    .story {
        display: grid;
        grid-template-columns: 1.1fr 1fr;
        gap: 18px
    }

    @media(max-width:980px) {
        .story {
            grid-template-columns: 1fr
        }
    }

    .timeline {
        display: grid;
        gap: 12px
    }

    .step {
        position: relative;
        border: var(--outline);
        border-radius: 16px;
        background: rgba(0, 0, 0, .5);
        padding: 16px 16px 16px 44px
    }

    .step:before {
        content: "";
        position: absolute;
        left: 18px;
        top: 18px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--gold);
        box-shadow: 0 0 0 4px rgba(198, 163, 79, .18)
    }

    .step h4 {
        margin: 0 0 2px;
        font-size: 18px
    }

    .gallery {
        display: grid;
        gap: 12px;
        grid-template-columns: repeat(2, 1fr)
    }

    .gallery img {
        border-radius: 14px;
        border: var(--outline)
    }

    
    .values {
        display: grid;
        gap: 16px;
        grid-template-columns: repeat(4, 1fr)
    }

    @media(max-width:1100px) {
        .values {
            grid-template-columns: repeat(2, 1fr)
        }
    }

    @media(max-width:720px) {
        .values {
            grid-template-columns: 1fr
        }
    }

    .value {
        border-radius: 18px;
        border: var(--outline);
        padding: 18px;
        background: rgba(255, 255, 255, .04)
    }

    .value b {
        font-size: 18px
    }

    
    .quote {
        border-radius: 20px;
        border: var(--outline);
        padding: 22px;
        background: linear-gradient(180deg, rgba(255, 255, 255, .05), rgba(255, 255, 255, .02));
        position: relative;
        overflow: hidden
    }

    .quote:after {
        content: "\201C";
        position: absolute;
        right: 12px;
        bottom: -22px;
        font: 900 180px/1 'Inter', system-ui;
        opacity: .06
    }

    .quote footer {
        color: var(--muted);
        margin-top: 8px
    }

    
    .cta-band {
        display: grid;
        gap: 12px;
        grid-template-columns: 1.4fr 1fr;
        align-items: center;
        border: var(--outline);
        border-radius: 22px;
        background: linear-gradient(135deg, rgba(198, 163, 79, .10), rgba(227, 197, 118, .06));
        box-shadow: var(--shadow);
        padding: 22px
    }

    @media(max-width:980px) {
        .cta-band {
            grid-template-columns: 1fr
        }
    }

    .cta-band .btn {
        min-width: 180px;
        text-align: center
    }

    .cta-band .btn.btn-gold,
    .cta-band .btn.btn-outline {
        padding: 12px 20px
    }

    .cta-actions {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: flex-end;
        flex-wrap: wrap
    }

    @media(max-width:980px) {
        .cta-actions {
            justify-content: flex-start
        }
    }

    @media(max-width:980px) {
        .cta-band {
            grid-template-columns: 1fr
        }
    }

    
    .no-mini-cart .mini-cart,
    .no-mini-cart .cart-trigger,
    .no-mini-cart .header-cart,
    .no-mini-cart [data-role="mini-cart"] {
        display: none !important
    }
</style>

<section class="about-hero">
    <div class="about-hero-inner">
        <div>
            <span class="about-kicker">About Heritage</span>
            <h1>Craftsmanship, culture & community</h1>
            <p class="muted">Heritage is a marketplace and experiences platform dedicated to Sri Lankan arts & crafts — from Ambalangoda masks and handloom to brass, pottery and beeralu lace. We give makers fair exposure, pricing transparency and logistics support while helping customers discover authentic, ethically sourced pieces and workshops.</p>
            <div class="hero-actions" style="display:flex;gap:12px;margin-top:14px;flex-wrap:wrap">
                <a class="btn btn-gold" href="/products">Explore the Shop</a>
                <a class="btn btn-outline" href="/experiences">See Experiences</a>
            </div>
        </div>
        <div class="about-visual">
            <div class="about-card"><img src="assets/fangrid1.png" alt="Sri Lankan mask and handloom montage"></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>What we do</h2><a class="see-all" href="/faq">Learn more →</a>
    </div>
    <div class="value-grid">
        <div class="value-card">
            <strong><i>🛍️</i> Market access</strong>
            <p class="muted">Beautiful storefronts, storytelling and category curation so customers can browse by craft, artisan or region.</p>
        </div>
        <div class="value-card">
            <strong><i>🎟️</i> Experiences</strong>
            <p class="muted">Artisans can enable <b>experience booking</b> right on a product — customers add seats at checkout, up to the seats set by the artisan.</p>
        </div>
        <div class="value-card">
            <strong><i>📦</i> D2C support</strong>
            <p class="muted">Guidance for packaging, fulfillment, after‑sales and inventory — reducing the friction of selling direct.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Our impact</h2>
    </div>
    <div class="impact" id="impact">
        <div class="kpi">
            <div class="num" data-count="240">0</div>
            <div class="label">Artisans onboarded</div>
        </div>
        <div class="kpi">
            <div class="num" data-count="1800">0</div>
            <div class="label">Products listed</div>
        </div>
        <div class="kpi">
            <div class="num" data-count="38">0</div>
            <div class="label">Avg. higher payout (%)</div>
        </div>
        <div class="kpi">
            <div class="num" data-count="520">0</div>
            <div class="label">Experiences booked</div>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Our story</h2>
    </div>
    <div class="story">
        <div class="timeline">
            <div class="step">
                <h4>From village workshops to the world</h4>
                <p class="muted">Many makers only reach nearby markets. Heritage removes the geographic barrier with an online catalog, experience booking and storytelling that honours the craft.</p>
            </div>
            <div class="step">
                <h4>Fair pricing over middlemen</h4>
                <p class="muted">We benchmark prices and keep margins transparent so artisans are paid fairly — not squeezed by wholesalers.</p>
            </div>
            <div class="step">
                <h4>Simple tools, zero jargon</h4>
                <p class="muted">A friendly dashboard to add products, manage stock, accept/decline orders and set workshop schedules. No IT skills required.</p>
            </div>
            <div class="step">
                <h4>Experiences that preserve culture</h4>
                <p class="muted">Tourists and locals can learn from masters — pottery wheels, mask painting, beeralu lace — creating new income streams and cultural exchange.</p>
            </div>
        </div>
        <div class="gallery">
            <img src="assets/experience1.png" alt="Hands shaping clay">
            <img src="assets/experience3.png" alt="Mask painting closeup">
            <img src="assets/shop2.png" alt="Ambalangoda guardian mask">
            <img src="assets/shop1.png" alt="Handloom saree detail">
        </div>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Our values</h2>
    </div>
    <div class="values">
        <div class="value"><b>👐 Community first</b>
            <p class="muted">We co‑design features with artisans and reinvest in training and outreach across regions.</p>
        </div>
        <div class="value"><b>⚖️ Fair & transparent</b>
            <p class="muted">Clear fees, price guidance and visible artisan stories on every product page.</p>
        </div>
        <div class="value"><b>🔒 Trust & safety</b>
            <p class="muted">Verified profiles, review moderation and dispute handling to protect buyers and sellers.</p>
        </div>
        <div class="value"><b>🌿 Sustainable</b>
            <p class="muted">Encouraging responsible sourcing and packaging to keep our heritage — and planet — thriving.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="grid" style="grid-template-columns:1.4fr 1fr">
        <div class="quote">
            <p>“Before Heritage, I sold masks only at the weekend pola. Now I ship to Colombo and host monthly workshops — my income is steadier and I get to teach.”</p>
            <footer>— Nilanthi, Mask artisan • Ambalangoda</footer>
        </div>
        <div class="cta-band">
            <div>
                <h3 style="margin:0 0 6px">Are you an artisan?</h3>
                <p class="muted" style="margin:0">Create your profile, list products and add workshop dates. It takes minutes — we’ll guide you.</p>
            </div>
            <div class="cta-actions">
                <a class="btn btn-gold" href="/auth.php
                <a class="btn btn-outline" href="/faq">How it works</a>
            </div>
        </div>
    </div>
</section>

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('no-mini-cart');
    });

    
    (function() {
        const el = document.getElementById('impact');
        if (!el || !('IntersectionObserver' in window)) return;
        const nums = [...el.querySelectorAll('.num')];
        let done = false;
        const tick = (node, target) => {
            const start = 0,
                dur = 900 + Math.random() * 800; 
            const t0 = performance.now();
            const step = (t) => {
                const p = Math.min(1, (t - t0) / dur);
                const val = Math.floor(start + (target - start) * (0.5 - Math.cos(p * Math.PI) / 2));
                node.textContent = val.toLocaleString('en-LK');
                if (p < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        };
        const io = new IntersectionObserver((entries) => {
            if (done) return;
            const seen = entries.some(e => e.isIntersecting);
            if (seen) {
                done = true;
                nums.forEach(n => tick(n, Number(n.dataset.count || 0)));
                io.disconnect();
            }
        }, {
            threshold: .35
        });
        io.observe(el);
    })();
</script>