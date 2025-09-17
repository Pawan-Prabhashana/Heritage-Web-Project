<?php  ?>
<?php
$title = 'Heritage • FAQ';
$page  = 'faq';
include_once __DIR__ . '/partials/header.php';
?>


<script type="application/ld+json">
    {
        "@context": "https:
        "@type": "FAQPage",
        "mainEntity": [{
                "@type": "Question",
                "name": "What is Heritage?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Heritage is a marketplace and experiences platform for Sri Lankan arts & crafts. Artisans list products and can enable experience booking; customers shop authentic items and book workshops."
                }
            },
            {
                "@type": "Question",
                "name": "How do experiences work?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "When an artisan enables experience booking on a product, buyers can optionally add seats at checkout up to the artisan's seat limit. Confirmation and details appear in the customer dashboard."
                }
            },
            {
                "@type": "Question",
                "name": "Do you take commissions?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "We charge a transparent platform fee that covers payment handling, platform operations and dispute support. Exact fees are shown before you publish a product."
                }
            },
            {
                "@type": "Question",
                "name": "How are artisans verified?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "We review identity, craft history and sample work. Verified badges appear on profiles and product pages to build trust and protect buyers."
                }
            }
        ]
    }
</script>

<style>
    
    .faq-hero {
        position: relative;
        margin: 22px 0;
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(255, 255, 255, .05), rgba(255, 255, 255, .02));
        border: var(--outline);
        box-shadow: var(--shadow);
        overflow: hidden
    }

    .faq-hero>div {
        display: grid;
        gap: 18px;
        grid-template-columns: 1.2fr .9fr;
        padding: 46px 28px
    }

    @media(max-width:980px) {
        .faq-hero>div {
            grid-template-columns: 1fr
        }
    }

    .faq-kicker {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .12);
        color: 
        font-weight: 800
    }

    .faq-hero h1 {
        font-size: clamp(34px, 6vw, 58px);
        line-height: 1.08;
        margin: 10px 0 8px
    }

    .faq-visual {
        align-self: end;
        display: grid;
        place-items: center;
        padding: 10px
    }

    .faq-card {
        width: min(560px, 100%);
        aspect-ratio: 16/10;
        border-radius: 22px;
        border: var(--outline);
        display: grid;
        place-items: center;
        background: linear-gradient(180deg, rgba(255, 255, 255, .06), rgba(255, 255, 255, .02))
    }

    .faq-card img {
        max-width: 92%;
        filter: drop-shadow(0 28px 40px rgba(0, 0, 0, .6));
        opacity: .88
    }

    
    .faq-toolbar {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 12px;
        margin: 18px 0
    }

    @media(max-width:980px) {
        .faq-toolbar {
            grid-template-columns: 1fr
        }
    }

    .faq-search {
        display: flex;
        gap: 10px;
        align-items: center;
        border: var(--outline);
        border-radius: 14px;
        background: var(--panel);
        padding: 10px 12px
    }

    .faq-search input {
        flex: 1;
        background: transparent;
        border: 0;
        outline: none;
        color: 
        font: inherit;
        font-size: 16px
    }

    .faq-search input::placeholder {
        color: rgba(255, 255, 255, .6)
    }

    .faq-filter {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: center;
        justify-content: flex-end
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
        background: rgba(198, 163, 79, .16);
        border-color: rgba(198, 163, 79, .28)
    }

    
    .faq-grid {
        display: grid;
        gap: 16px;
        grid-template-columns: 1.2fr .8fr
    }

    @media(max-width:1100px) {
        .faq-grid {
            grid-template-columns: 1fr
        }
    }

    .accordion {
        display: grid;
        gap: 10px
    }

    .qa {
        border: var(--outline);
        border-radius: 16px;
        background: linear-gradient(180deg, rgba(255, 255, 255, .05), rgba(255, 255, 255, .02));
        overflow: hidden
    }

    .qa summary {
        list-style: none;
        cursor: pointer;
        display: flex;
        gap: 12px;
        align-items: center;
        padding: 16px 16px
    }

    .qa summary::-webkit-details-marker {
        display: none
    }

    .qa summary .tag {
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .06)
    }

    .qa .q {
        font-weight: 700
    }

    .qa .a {
        padding: 0 16px 16px;
        color: var(--muted)
    }

    .qa[open] {
        box-shadow: 0 10px 24px rgba(0, 0, 0, .35)
    }

    
    .side-card {
        border: var(--outline);
        border-radius: 18px;
        padding: 18px;
        background: var(--panel);
        box-shadow: var(--shadow)
    }

    .side-card .btn {
        width: 100%;
        justify-content: center
    }

    .side-card ul {
        margin: 10px 0 0;
        padding: 0 0 0 18px
    }

    
    .support-strip {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        border: var(--outline);
        border-radius: 20px;
        background: linear-gradient(135deg, rgba(198, 163, 79, .10), rgba(227, 197, 118, .06));
        padding: 20px;
        align-items: center
    }

    @media(max-width:980px) {
        .support-strip {
            grid-template-columns: 1fr
        }
    }

    .support-strip input {
        color: 
        font-size: 17px
    }

    .support-strip input::placeholder {
        color: rgba(255, 255, 255, .7)
    }

    
    .qa:target {
        outline: 2px solid rgba(198, 163, 79, .55);
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
    .floating-cart {
        display: none !important
    }
</style>

<section class="faq-hero">
    <div>
        <div>
            <span class="faq-kicker">FAQ</span>
            <h1>Answers for shoppers & artisans</h1>
            <p class="muted">Everything you need to know about orders, experiences, payouts, verification and more. Use search or filter by topic.</p>
            <div class="faq-toolbar">
                <div class="faq-search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http:
                        <path d="M21 21l-3.8-3.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6" />
                    </svg>
                    <input id="faqSearch" type="search" placeholder="Search: payments, booking, delivery…" aria-label="Search FAQ">
                </div>
                <div class="faq-filter" id="faqFilter">
                    <span class="chip active" data-topic="all">All</span>
                    <span class="chip" data-topic="shopping">Shopping</span>
                    <span class="chip" data-topic="experiences">Experiences</span>
                    <span class="chip" data-topic="artisan">For Artisans</span>
                    <span class="chip" data-topic="account">Account</span>
                </div>
            </div>
        </div>
        <div class="faq-visual">
            <div class="faq-card"><img src="assets/fangrid1.png" alt="Craft montage"></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="faq-grid">
        <div>
            <div class="accordion" id="faqList">
                
                <details class="qa" data-topic="shopping" id="shipping-times">
                    <summary><span class="tag">Shopping</span><span class="q">What are the delivery options and times?</span></summary>
                    <div class="a">We ship island‑wide via trusted couriers. Processing is typically 1–3 business days; delivery 2–5 days depending on region and product size. You’ll see estimates at checkout and can track from your dashboard.</div>
                </details>
                <details class="qa" data-topic="shopping" id="returns">
                    <summary><span class="tag">Shopping</span><span class="q">What is your return & refund policy?</span></summary>
                    <div class="a">If an item arrives damaged or not as described, report it within 5 days with photos. We coordinate a replacement or refund with the artisan. Because items are handmade and often made‑to‑order, change‑of‑mind returns may be limited.</div>
                </details>
                <details class="qa" data-topic="shopping" id="payments">
                    <summary><span class="tag">Shopping</span><span class="q">What payment methods are supported?</span></summary>
                    <div class="a">Multiple methods including cards and cash‑on‑delivery where supported. For this build, checkout captures selections without a live gateway; payments can be enabled later.</div>
                </details>

                
                <details class="qa" data-topic="experiences" id="exp-how">
                    <summary><span class="tag">Experiences</span><span class="q">How do experiences and seat limits work?</span></summary>
                    <div class="a">When an artisan enables <b>Experience Booking</b> on a product, you’ll see an option to add tickets at checkout. You can add seats up to the maximum set by the artisan. After purchase, your confirmation and details appear under <i>My Experiences</i>.</div>
                </details>
                <details class="qa" data-topic="experiences" id="reschedule">
                    <summary><span class="tag">Experiences</span><span class="q">Can I cancel or reschedule?</span></summary>
                    <div class="a">Yes — manage your booking from your dashboard. Free rescheduling is available up to 48 hours before the start time; later changes depend on the artisan’s policy.</div>
                </details>
                <details class="qa" data-topic="experiences" id="safety">
                    <summary><span class="tag">Experiences</span><span class="q">Are workshops safe for kids?</span></summary>
                    <div class="a">Each listing shows age guidance and safety notes. Some activities (e.g., brass casting) may have age limits; others like mask‑painting are family‑friendly.</div>
                </details>

                
                <details class="qa" data-topic="artisan" id="join-artisan">
                    <summary><span class="tag">For Artisans</span><span class="q">How do I join as an artisan?</span></summary>
                    <div class="a">Create an account and finish your profile with craft background and sample work. Add products with photos, set stock and price, and optionally add workshop dates. Our team verifies details and helps you publish.</div>
                </details>
                <details class="qa" data-topic="artisan" id="fees">
                    <summary><span class="tag">For Artisans</span><span class="q">What fees do you charge?</span></summary>
                    <div class="a">A transparent platform fee is applied on each order/booking to cover operations and support. You’ll see the fee before your product goes live.</div>
                </details>
                <details class="qa" data-topic="artisan" id="payouts">
                    <summary><span class="tag">For Artisans</span><span class="q">How do payouts and inventory work?</span></summary>
                    <div class="a">Payouts are settled on a schedule shown in your dashboard. Inventory tools let you set variants, manage stock and receive low‑stock alerts so you never oversell.</div>
                </details>

                
                <details class="qa" data-topic="account" id="verify">
                    <summary><span class="tag">Account</span><span class="q">How are artisans verified?</span></summary>
                    <div class="a">We review identity, craft history and sample work. Verified profiles show a badge on product and profile pages to improve buyer confidence.</div>
                </details>
                <details class="qa" data-topic="account" id="privacy">
                    <summary><span class="tag">Account</span><span class="q">What do you do with my data?</span></summary>
                    <div class="a">We only use your data to operate the platform (orders, bookings, support). See our Privacy Policy for details.</div>
                </details>
            </div>
        </div>

        <aside>
            <div class="side-card">
                <h3 style="margin:0 0 8px">Still need help?</h3>
                <p class="muted" style="margin:0 0 12px">Reach us and we’ll reply fast.</p>
                <a class="btn btn-gold" href="/contact">Contact support</a>
                <ul>
                    <li><a href="/about">About Heritage</a></li>
                    <li><a href="/experiences">Browse experiences</a></li>
                    <li><a href="/products">Shop crafts</a></li>
                </ul>
            </div>
        </aside>
    </div>
</section>

<section class="section">
    <div class="support-strip">
        <div>
            <h3 style="margin:0 0 8px">Didn’t find your answer?</h3>
            <p class="muted" style="margin:0">Send us your question. We’ll add common questions here to help others.</p>
        </div>
        <form class="grid" style="grid-template-columns:1fr 180px;gap:8px" onsubmit="event.preventDefault(); faqToast('Thanks! We\'ll get back to you.'); this.reset();">
            <input required type="text" placeholder="Type your question…" aria-label="Question" style="border:var(--outline);border-radius:12px;background:var(--panel);padding:12px 14px;color:
            <button class="btn btn-outline" type="submit">Submit</button>
        </form>
    </div>
</section>

<script>
    
    (function() {
        document.body.classList.add('no-mini-cart');
        const SELECTORS = ['.mini-cart', '
        const nuke = (root = document) => {
            SELECTORS.forEach(sel => root.querySelectorAll(sel).forEach(el => el.remove()));
        };
        nuke();
        
        const mo = new MutationObserver(muts => {
            muts.forEach(m => {
                m.addedNodes && m.addedNodes.forEach(node => {
                    if (node.nodeType === 1) {
                        nuke(node);
                    }
                });
            });
        });
        mo.observe(document.documentElement, {
            childList: true,
            subtree: true
        });
        
        window.addEventListener('click', (e) => {
            const t = e.target.closest('[data-open="mini-cart"], .open-mini-cart, .cart-trigger, .header-cart');
            if (t) {
                e.preventDefault();
                e.stopPropagation();
            }
        }, true);
    })();

    
    (function() {
        const list = document.getElementById('faqList');
        const qas = [...list.querySelectorAll('.qa')];
        const search = document.getElementById('faqSearch');
        const chips = document.getElementById('faqFilter');

        function apply() {
            const query = (search.value || '').toLowerCase().trim();
            const active = chips.querySelector('.chip.active')?.dataset.topic || 'all';
            qas.forEach(d => {
                const topic = d.dataset.topic;
                const text = (d.querySelector('.q').textContent + ' ' + d.querySelector('.a').textContent).toLowerCase();
                const hit = (!query || text.includes(query)) && (active === 'all' || topic === active);
                d.style.display = hit ? '' : 'none';
                if (!hit) d.open = false;
            });
        }

        chips.addEventListener('click', (e) => {
            const c = e.target.closest('.chip');
            if (!c) return;
            chips.querySelectorAll('.chip').forEach(x => x.classList.remove('active'));
            c.classList.add('active');
            apply();
        });
        search.addEventListener('input', apply);

        
        function openHash() {
            if (!location.hash) return;
            const el = document.querySelector(location.hash);
            if (el && el.matches('.qa')) {
                el.style.display = '';
                el.open = true;
                el.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
        window.addEventListener('hashchange', openHash);
        openHash();
    })();

    
    function faqToast(msg) {
        const t = document.createElement('div');
        t.textContent = msg;
        t.style.position = 'fixed';
        t.style.left = '50%';
        t.style.bottom = '24px';
        t.style.transform = 'translateX(-50%)';
        t.style.padding = '10px 14px';
        t.style.borderRadius = '12px';
        t.style.border = 'var(--outline)';
        t.style.background = 'var(--panel)';
        t.style.boxShadow = 'var(--shadow)';
        t.style.zIndex = '9999';
        document.body.appendChild(t);
        setTimeout(() => {
            t.remove();
        }, 2200);
    }
</script>

<?php include_once __DIR__ . '/partials/footer.php'; ?>