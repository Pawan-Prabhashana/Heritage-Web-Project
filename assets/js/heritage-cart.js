




(() => {
    const LS_CART = 'heritage_cart';
    const LS_WISH = 'heritage_wishlist';

    
    const $ = (sel, root = document) => root.querySelector(sel);
    const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));
    const money = n => 'Rs. ' + Number(n || 0).toLocaleString('en-LK');

    const getCart = () => JSON.parse(localStorage.getItem(LS_CART) || '{}'); 
    const setCart = (obj) => localStorage.setItem(LS_CART, JSON.stringify(obj));
    const getWish = () => new Set(JSON.parse(localStorage.getItem(LS_WISH) || '[]'));
    const setWish = (set) => localStorage.setItem(LS_WISH, JSON.stringify([...set]));

    const findProduct = (id) => {
        if (window.CATALOG) return window.CATALOG.find(p => String(p.id) === String(id));
        return null;
    };

    
    const injectStyles = () => {
        if ($('
        const css = `
      .cart-fab{position:fixed;right:22px;bottom:22px;z-index:60;display:grid;place-items:center;width:58px;height:58px;border-radius:50%;background:linear-gradient(135deg,
      .cart-badge{position:absolute;right:-4px;top:-4px;background:
      .mini-cart{position:fixed;right:22px;bottom:90px;z-index:60;width:min(380px,90vw);background:rgba(20,20,20,.92);border:1px solid rgba(255,215,0,.2);border-radius:16px;box-shadow:0 16px 40px rgba(0,0,0,.6);backdrop-filter:blur(12px);overflow:hidden;transform:translateY(20px);opacity:0;pointer-events:none;transition:.22s}
      .mini-cart.open{transform:translateY(0);opacity:1;pointer-events:auto}
      .mini-cart header,.mini-cart footer{padding:12px 14px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(255,215,0,.2)}
      .mini-cart footer{border-top:1px solid rgba(255,215,0,.2);border-bottom:none}
      .mini-cart .list{max-height:48vh;overflow:auto}
      .mini-cart .row{display:grid;grid-template-columns:56px 1fr auto;gap:10px;align-items:center;padding:10px 12px}
      .mini-cart .row img{width:56px;height:56px;object-fit:cover;border-radius:10px}
      .mini-cart .row strong{display:block;font-size:14px}
      .mini-cart .row .muted{font-size:12px;color:
      .btn-mini{padding:6px 10px;border-radius:10px;background:rgba(255,255,255,.08);color:
      .checkout{padding:10px 12px;border-radius:12px;background:linear-gradient(135deg,
      .wish-on{background:rgba(198,163,79,.25)!important;color:
    `;
        const style = document.createElement('style');
        style.id = 'heritage-cart-styles';
        style.textContent = css;
        document.head.appendChild(style);
    };

    
    const injectCartUI = () => {
        if ($('

        const fab = document.createElement('div');
        fab.className = 'cart-fab';
        fab.id = 'heritageCartFab';
        fab.innerHTML = `🛒<span class="cart-badge" id="heritageCartCount">0</span>`;
        document.body.appendChild(fab);

        const drawer = document.createElement('div');
        drawer.className = 'mini-cart';
        drawer.id = 'heritageMiniCart';
        drawer.innerHTML = `
      <header>
        <strong>Your Cart</strong>
        <button class="btn-mini" id="heritageCloseCart">Close</button>
      </header>
      <div class="list" id="heritageCartList"></div>
      <footer>
        <span id="heritageCartTotal" class="price">Rs. 0</span>
        <button class="checkout">Proceed to Checkout</button>
      </footer>`;
        document.body.appendChild(drawer);

        fab.addEventListener('click', () => drawer.classList.toggle('open'));
        $('
    };

    
    const setWishVisual = () => {
        const wish = getWish();
        $$('[data-wish]').forEach(btn => {
            const id = btn.dataset.id;
            const wished = wish.has(String(id));
            btn.classList.toggle('wish-on', wished);
            btn.textContent = wished ? '♥ Wished' : '♡ Wishlist';
        });
    };

    const toggleWish = (id) => {
        const wish = getWish();
        if (wish.has(String(id))) wish.delete(String(id));
        else wish.add(String(id));
        setWish(wish);
        setWishVisual();
        updateBadges();
    };

    
    const updateBadges = () => {
        const cart = getCart();
        let count = 0;
        for (const k in cart) count += Number(cart[k]) || 0;
        const badge = $('
        if (badge) badge.textContent = count;
    };

    const rebuildDrawer = () => {
        const list = $('
        const totalEl = $('
        const cart = getCart();
        list.innerHTML = '';
        let total = 0;

        Object.entries(cart).forEach(([id, qty]) => {
            const item = findProduct(id);
            if (!item) return;
            const line = (item.price || 0) * (qty || 0);
            total += line;
            const row = document.createElement('div');
            row.className = 'row';
            row.innerHTML = `
        <img src="${item.img}" alt="${item.title}">
        <div>
          <strong>${item.title}</strong>
          <div class="muted">${qty} × ${money(item.price)}</div>
        </div>
        <button class="btn-mini" data-remove="${id}">Remove</button>
      `;
            list.appendChild(row);
        });

        totalEl.textContent = money(total);
        $$('
            btn.onclick = () => removeFromCart(btn.dataset.remove);
        });
    };

    const addToCart = (id, qty = 1) => {
        const cart = getCart();
        cart[id] = (cart[id] || 0) + qty;
        setCart(cart);
        updateBadges();
        rebuildDrawer();
    };

    const removeFromCart = (id) => {
        const cart = getCart();
        delete cart[id];
        setCart(cart);
        updateBadges();
        rebuildDrawer();
    };

    
    const boot = () => {
        injectStyles();
        injectCartUI();
        setWishVisual();
        updateBadges();
        rebuildDrawer();
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else boot();

    
    window.HeritageCart = {
        addToCart,
        removeFromCart,
        toggleWishlist: toggleWish,
        refreshMiniCart: rebuildDrawer,
        refreshWishlistBadges: setWishVisual
    };
})();
