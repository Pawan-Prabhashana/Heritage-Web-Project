(function () {
    const topNav = document.querySelector('.header');
    const onScroll = () => topNav && topNav.classList.toggle('scrolled', window.scrollY > 4);
    window.addEventListener('scroll', onScroll);
    onScroll();

    
    const drawer = document.getElementById('drawer');
    const backdrop = document.getElementById('backdrop');
    const openBtn = document.getElementById('openMenu');
    const closeBtn = document.getElementById('closeMenu');
    const openDrawer = () => {
        if (drawer) drawer.classList.add('open');
        if (backdrop) backdrop.classList.add('show');
        if (drawer) drawer.setAttribute('aria-hidden', 'false');
    };
    const closeDrawer = () => {
        if (drawer) drawer.classList.remove('open');
        if (backdrop) backdrop.classList.remove('show');
        if (drawer) drawer.setAttribute('aria-hidden', 'true');
    };
    if (openBtn) openBtn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (backdrop) backdrop.addEventListener('click', closeDrawer);
    document.querySelectorAll('.drawer a').forEach(a => a.addEventListener('click', closeDrawer));

    
    const active = document.body.dataset.page;
    if (active) {
        document.querySelectorAll('.links a').forEach(a => {
            const p = a.getAttribute('data-page');
            if (p === active) a.classList.add('active');
        });
    }
})();
