<?php  ?>
<?php
$title = 'Heritage • Contact';
$page  = 'contact';
include_once __DIR__ . '/partials/header.php';
?>

<style>
    
    
    .site-header~.site-header {
        display: none !important
    }

    
    .contact-top {
        position: relative;
        margin: 22px 0;
        border-radius: 28px;
        border: var(--outline);
        box-shadow: var(--shadow);
        overflow: hidden;
        background: radial-gradient(1200px 500px at 20% -10%, rgba(198, 163, 79, .18), transparent 60%),
            radial-gradient(1000px 400px at 110% 10%, rgba(255, 255, 255, .09), transparent 60%),
            linear-gradient(180deg, rgba(255, 255, 255, .05), rgba(255, 255, 255, .02));
    }

    .contact-top::after {
        content: "";
        position: absolute;
        inset: 0;
        background: url('assets/artwork.png') center/cover no-repeat;
        opacity: .08;
        pointer-events: none;
        mix-blend: normal
    }

    .contact-top .grid {
        display: grid;
        gap: 14px;
        grid-template-columns: 1.2fr 1fr
    }

    @media(max-width:1100px) {
        .contact-top .grid {
            grid-template-columns: 1fr
        }
    }

    .contact-intro {
        padding: 34px 26px 20px
    }

    .contact-intro h1 {
        font-size: clamp(36px, 6vw, 60px);
        line-height: 1.04;
        margin: 6px 0
    }

    .contact-intro p {
        max-width: 65ch
    }

    .contact-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 14px
    }

    @media(max-width:720px) {
        .contact-stats {
            grid-template-columns: 1fr 1fr
        }
    }

    .stat {
        border: var(--outline);
        border-radius: 16px;
        background: rgba(255, 255, 255, .05);
        padding: 14px;
        text-align: center
    }

    .stat .num {
        font-weight: 900;
        font-size: clamp(22px, 4.2vw, 36px)
    }

    .stat .lab {
        color: var(--muted);
        font-weight: 600
    }

    .mosaic {
        display: grid;
        gap: 14px;
        padding: 14px 14px 14px 0;
        grid-template-columns: 1fr
    }

    .tile {
        position: relative;
        border: var(--outline);
        border-radius: 18px;
        background: var(--panel);
        padding: 18px;
        box-shadow: var(--shadow);
        overflow: hidden
    }

    .tile h3 {
        margin: 0 0 6px
    }

    .tile p {
        margin: 0
    }

    .tile .actions {
        margin-top: 10px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap
    }

    .tile:after {
        content: "";
        position: absolute;
        right: -70px;
        top: -70px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        opacity: .07;
        background: radial-gradient(circle, 
    }

    .tile.badge {
        display: grid;
        grid-template-columns: 40px 1fr;
        gap: 10px;
        align-items: start
    }

    
    .contact-grid {
        display: grid;
        gap: 16px;
        grid-template-columns: 1.1fr .9fr;
        margin-top: 18px
    }

    @media(max-width:1100px) {
        .contact-grid {
            grid-template-columns: 1fr
        }
    }

    .form {
        border: var(--outline);
        border-radius: 18px;
        padding: 18px;
        background: var(--panel);
        box-shadow: var(--shadow)
    }

    .form .row {
        display: grid;
        gap: 10px;
        grid-template-columns: 1fr 1fr
    }

    @media(max-width:720px) {
        .form .row {
            grid-template-columns: 1fr
        }
    }

    .input {
        display: flex;
        flex-direction: column;
        gap: 6px
    }

    .input label {
        font-weight: 700
    }

    .input input,
    .input textarea,
    .input select {
        border: var(--outline);
        border-radius: 12px;
        background: transparent;
        color: 
        padding: 12px 14px;
        outline: none;
        transition: font-size .18s ease
    }

    .input textarea {
        min-height: 160px;
        resize: vertical
    }

    .aside {
        display: grid;
        gap: 12px
    }

    .info-card {
        border: var(--outline);
        border-radius: 18px;
        padding: 18px;
        background: var(--panel);
        box-shadow: var(--shadow)
    }

    .info-card .row {
        display: grid;
        grid-template-columns: 28px 1fr;
        gap: 10px;
        align-items: flex-start
    }

    .info-card a {
        font-weight: 600
    }

    .contact-chips {
        display: flex;
        gap: 8px;
        flex-wrap: wrap
    }

    .chip {
        padding: 8px 12px;
        border-radius: 999px;
        border: var(--outline);
        background: rgba(255, 255, 255, .04);
        user-select: none
    }

    
    .support-strip {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        border: var(--outline);
        border-radius: 20px;
        background: linear-gradient(135deg, rgba(198, 163, 79, .10), rgba(227, 197, 118, .06));
        padding: 20px;
        align-items: center;
        margin-top: 16px
    }

    @media(max-width:980px) {
        .support-strip {
            grid-template-columns: 1fr
        }
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

<section class="contact-top">
    <div class="grid">
        <div class="contact-intro">
            <span class="contact-kicker">Contact</span>
            <h1>Talk to real people who care</h1>
            <p class="muted">Whether you’re tracking an order, booking a workshop, or joining as an artisan, our Colombo‑based team is here to help.</p>
            <div class="contact-stats">
                <div class="stat">
                    <div class="num">&le; 1h</div>
                    <div class="lab">Avg. first reply</div>
                </div>
                <div class="stat">
                    <div class="num">98%</div>
                    <div class="lab">Satisfaction</div>
                </div>
                <div class="stat">
                    <div class="num">7d</div>
                    <div class="lab">Support, all week</div>
                </div>
            </div>
        </div>
        <div class="mosaic">
            <div class="tile">
                <h3>Orders & Delivery</h3>
                <p class="muted">Need help with shipping, returns or tracking?</p>
                <div class="actions">
                    <a class="btn btn-outline" href="/faq.php
                    <a class="btn btn-gold" href="
                </div>
            </div>
            <div class="tile">
                <h3>Experiences</h3>
                <p class="muted">Questions about dates, rescheduling or seat limits?</p>
                <div class="actions">
                    <a class="btn btn-outline" href="/faq.php
                    <a class="btn btn-gold" href="
                </div>
            </div>
            <div class="tile badge">
                <div>🧵</div>
                <div>
                    <h3>Join as an artisan</h3>
                    <p class="muted">Create your profile, list products, and add workshop dates.</p>
                    <div class="actions">
                        <a class="btn btn-gold" href="/auth.php
                        <a class="btn btn-outline" href="/faq.php
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="contact-grid">
        
        <form class="form" id="contactForm" onsubmit="contactSubmit(event)">
            <div class="row">
                <div class="input">
                    <label for="name">Full name</label>
                    <input id="name" name="name" type="text" required placeholder="Your name">
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" required placeholder="you@example.com">
                </div>
            </div>
            <div class="row">
                <div class="input">
                    <label for="topic">Topic</label>
                    <select id="topic" name="topic">
                        <option>General</option>
                        <option>Order or delivery</option>
                        <option>Experience booking</option>
                        <option>Join as artisan</option>
                        <option>Partnership</option>
                    </select>
                </div>
                <div class="input">
                    <label for="order">Order/Booking ID (optional)</label>
                    <input id="order" name="order" type="text" placeholder="
                </div>
            </div>
            <div class="input">
                <label for="message">Your message</label>
                <textarea id="message" name="message" required placeholder="Tell us a bit about your issue or request…"></textarea>
                <div class="contact-chips" style="margin-top:6px">
                    <span class="chip">Tip: include order 
                    <span class="chip">We reply in \u22641h</span>
                </div>
            </div>

            
            <input type="text" name="website" id="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;opacity:0" aria-hidden="true">

            <div style="display:flex;gap:10px;align-items:center;justify-content:flex-end;margin-top:10px;flex-wrap:wrap">
                <button class="btn btn-outline" type="reset">Clear</button>
                <button class="btn btn-gold" type="submit">Send message</button>
            </div>
        </form>

        
        <div class="aside">
            <div class="info-card">
                <div class="row"><span>📧</span>
                    <div><b>Email</b>
                        <div><a href="mailto:contactus.heritage@gmail.com">contactus.heritage@gmail.com</a></div>
                    </div>
                </div>
                <div class="row"><span>☎️</span>
                    <div><b>Phone</b>
                        <div><a href="tel:+94771234567">+94 77 123 4567</a> (Mon–Fri 9:00–18:00 IST)</div>
                    </div>
                </div>
                <div class="row"><span>📍</span>
                    <div><b>Office</b>
                        <div>Colombo, Sri Lanka</div>
                    </div>
                </div>
            </div>
            <div class="info-card">
                <b>Quick links</b>
                <ul style="margin:10px 0 0;padding:0 0 0 18px">
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/experiences">Browse experiences</a></li>
                    <li><a href="/products">Shop crafts</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="support-strip">
        <div>
            <h3 style="margin:0 0 8px">Prefer email?</h3>
            <p class="muted" style="margin:0">Write to <a href="mailto:support@heritage.lk">support@heritage.lk</a> and we’ll respond soon.</p>
        </div>
        <div style="display:flex;gap:10px;align-items:center;justify-content:flex-end;flex-wrap:wrap">
            <a class="btn btn-outline" href="/faq">Read the FAQ</a>
            <a class="btn btn-gold" href="/auth.php
        </div>
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

    
    function contactSubmit(ev) {
        ev.preventDefault();
        const form = ev.currentTarget;
        if (form.website && form.website.value) {
            return;
        } 
        const data = Object.fromEntries(new FormData(form).entries());
        const toast = document.createElement('div');
        toast.textContent = 'Thanks ' + (data.name || '') + ' — we\'ll get back to you!';
        toast.style.position = 'fixed';
        toast.style.left = '50%';
        toast.style.bottom = '24px';
        toast.style.transform = 'translateX(-50%)';
        toast.style.padding = '10px 14px';
        toast.style.borderRadius = '12px';
        toast.style.border = 'var(--outline)';
        toast.style.background = 'var(--panel)';
        toast.style.boxShadow = 'var(--shadow)';
        toast.style.zIndex = '9999';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 2200);
        form.reset();
    }

    
    (function() {
        const msg = document.getElementById('message');
        if (!msg) return;
        const base = parseFloat(getComputedStyle(msg).fontSize) || 16;
        msg.addEventListener('input', () => {
            const hasBruh = /\bbruh\b/i.test(msg.value);
            msg.style.fontSize = (hasBruh ? (base + 2) : base) + 'px';
        });
    })();
</script>

<?php include_once __DIR__ . '/partials/footer.php'; ?>