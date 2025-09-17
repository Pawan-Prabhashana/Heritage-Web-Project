
(function(){
  const STORE_KEYS = {
    products: 'heritage_artisan_products',
    experiences: 'heritage_artisan_experiences'
  };

  function lsGet(key, fallback){
    try{
      const raw = localStorage.getItem(key);
      if(!raw) return fallback;
      return JSON.parse(raw);
    }catch(e){ return fallback; }
  }
  function lsSet(key, value){
    localStorage.setItem(key, JSON.stringify(value));
  }

  async function seedIfEmpty(){
    const p = lsGet(STORE_KEYS.products, null);
    if(!p){
      
      try{
        const res = await fetch('../data/products.json');
        const demo = await res.json();
        lsSet(STORE_KEYS.products, demo.map(x=>({...x, localId: 'seed-'+x.id})));
      }catch(e){ lsSet(STORE_KEYS.products, []); }
    }
    const ex = lsGet(STORE_KEYS.experiences, null);
    if(!ex){
      try{
        const res = await fetch('../data/experiences.json');
        const demo = await res.json();
        lsSet(STORE_KEYS.experiences, demo.map(x=>({...x, localId: 'seed-'+x.id, productId: null})));
      }catch(e){ lsSet(STORE_KEYS.experiences, []); }
    }
  }

  function uid(){ return 'p-' + Math.random().toString(36).slice(2,9); }

  
  function fileToDataURL(file){ return new Promise((resolve,reject)=>{
    const reader = new FileReader();
    reader.onload = ()=> resolve(reader.result);
    reader.onerror = reject;
    reader.readAsDataURL(file);
  }); }

  
  function q(sel, root=document){ return root.querySelector(sel); }
  function qa(sel, root=document){ return Array.from(root.querySelectorAll(sel)); }
  function toast(msg){
    let t = document.getElementById('toast');
    if(!t){ t = document.createElement('div'); t.id='toast'; t.className='card'; t.style.position='fixed'; t.style.right='16px'; t.style.bottom='16px'; t.innerHTML='<div class="card-body">'+msg+'</div>'; document.body.appendChild(t); }
    else t.innerHTML='<div class="card-body">'+msg+'</div>';
    t.style.display='block';
    setTimeout(()=> t.style.display='none', 2500);
  }
  function openDrawer(title, innerHTML){
    let overlay = q('.overlay'); if(!overlay){ overlay = document.createElement('div'); overlay.className='overlay'; document.body.appendChild(overlay); }
    let drawer = q('.drawer'); if(!drawer){ drawer = document.createElement('div'); drawer.className='drawer'; document.body.appendChild(drawer); }
    drawer.innerHTML = '<div class="card-body" style="display:flex;align-items:center;justify-content:space-between;"><strong>'+title+'</strong><button class="btn" id="closeDrawer">Close</button></div><hr style="border:0;border-top:var(--outline);opacity:.6"><div class="card-body">'+innerHTML+'</div>';
    overlay.classList.add('show'); drawer.classList.add('open');
    overlay.onclick = closeDrawer;
    q('
  }
  function closeDrawer(){ q('.overlay')?.classList.remove('show'); q('.drawer')?.classList.remove('open'); }

  
  function renderProducts(){
    const list = q('[data-products]'); if(!list) return;
    const items = lsGet(STORE_KEYS.products, []);
    list.innerHTML = '';
    items.forEach(p=>{
      const el = document.createElement('div');
      el.className='card product-card';
      el.innerHTML = `
        <img src="${p.preview || ('../'+(p.img||'assets/img/placeholders/product-placeholder.jpg'))}" alt="">
        <div class="card-body">
          <div style="display:flex;align-items:center;justify-content:space-between">
            <div class="title">${p.title||'Untitled'}</div>
            <span class="badge">LKR ${Number(p.price||0).toLocaleString('en-LK')}</span>
          </div>
          <div class="meta">${p.category||'—'} • Stock: ${p.stock||0}</div>
          <div class="meta">${p.experience? 'Includes experience' : ''}</div>
          <div style="display:flex; gap:8px; flex-wrap:wrap">
            <button class="btn" data-edit="${p.localId}">Edit</button>
            <button class="btn btn-danger" data-delete="${p.localId}">Delete</button>
          </div>
        </div>`;
      list.appendChild(el);
    });

    
    qa('[data-delete]').forEach(btn=>{
      btn.onclick = ()=>{
        const id = btn.getAttribute('data-delete');
        const all = lsGet(STORE_KEYS.products, []);
        const filtered = all.filter(x=>x.localId!==id);
        lsSet(STORE_KEYS.products, filtered);
        
        const ex = lsGet(STORE_KEYS.experiences, []);
        lsSet(STORE_KEYS.experiences, ex.filter(x=>x.productId!==id));
        renderProducts(); renderExperiences();
        toast('Product deleted');
      };
    });
    qa('[data-edit]').forEach(btn=>{
      btn.onclick = ()=>{
        const id = btn.getAttribute('data-edit');
        const p = lsGet(STORE_KEYS.products, []).find(x=>x.localId===id);
        if(!p) return;
        openDrawer('Edit Product', `
          <div class="form-row">
            <div><label>Title</label><input class="input" id="e_title" value="${p.title||''}"></div>
            <div><label>Category</label><input class="input" id="e_category" value="${p.category||''}"></div>
            <div><label>Price (LKR)</label><input class="input" id="e_price" type="number" value="${p.price||0}"></div>
            <div><label>Stock</label><input class="input" id="e_stock" type="number" value="${p.stock||0}"></div>
          </div>
          <div class="form-row"><div style="grid-column:1/-1"><label>Description</label><textarea class="input" id="e_desc" rows="5">${p.desc||''}</textarea></div></div>
          <div class="form-row"><button class="btn btn-primary" id="saveP">Save</button></div>
        `);
        q('
          const all = lsGet(STORE_KEYS.products, []);
          const idx = all.findIndex(x=>x.localId===id);
          all[idx] = {...all[idx],
            title: q('
            category: q('
            price: Number(q('
            stock: Number(q('
            desc: q('
          };
          lsSet(STORE_KEYS.products, all);
          closeDrawer(); renderProducts(); toast('Saved');
        };
      };
    });
  }

  function renderExperiences(){
    const list = q('[data-experiences]'); if(!list) return;
    const xp = lsGet(STORE_KEYS.experiences, []);
    list.innerHTML = '';
    xp.forEach(x=>{
      const el = document.createElement('div');
      el.className = 'card product-card';
      el.innerHTML = `
        <img src="${x.preview || '../assets/img/placeholders/experience-placeholder.jpg'}" alt="">
        <div class="card-body">
          <div style="display:flex;align-items:center;justify-content:space-between">
            <div class="title">${x.title||'Experience'}</div>
            <span class="badge">${x.date? x.date : ''}</span>
          </div>
          <div class="meta">Duration: ${x.duration||'—'} hrs • Max: ${x.max||'—'} people</div>
          <div class="meta">Linked product: ${x.productTitle||'—'}</div>
        </div>`;
      list.appendChild(el);
    });
  }

  async function attachUploader(area, state){
    const input = document.createElement('input');
    input.type='file'; input.accept='image/*';
    area.onclick = ()=> input.click();
    input.onchange = async ()=>{
      if(input.files && input.files[0]){
        state.preview = await fileToDataURL(input.files[0]);
        area.innerHTML = '<div class="badge">Image selected</div>';
      }
    };
  }

  
  async function mountAddProduct(){
    const form = q('
    const state = { preview: null };

    
    try{
      const res = await fetch('../data/categories.json');
      const cats = await res.json();
      const sel = q('
      if(sel && Array.isArray(cats) && cats.length){
        sel.innerHTML = cats.map(c=>`<option value="${c.name}">${c.name}</option>`).join('');
      }else if(sel){
        const fallback = ["Handloom Sarees","Traditional Masks","Brassware","Pottery","Laksha","Wood Carvings","Jewelry","Batik"];
        sel.innerHTML = fallback.map(n=>`<option value="${n}">${n}</option>`).join('');
      }
    }catch(_){
      const sel = q('
      if(sel){
        const fallback = ["Handloom Sarees","Traditional Masks","Brassware","Pottery","Laksha","Wood Carvings","Jewelry","Batik"];
        sel.innerHTML = fallback.map(n=>`<option value="${n}">${n}</option>`).join('');
      }
    }

    const drop = q('
    await attachUploader(drop, state);

    
    const chk = q('
    const expBox = q('
    const toggle = ()=>{ expBox.style.display = chk.checked? 'block' : 'none'; };
    chk.onchange = toggle; toggle();

    form.onsubmit = async (e)=>{
      e.preventDefault();
      const product = {
        localId: uid(),
        title: q('
        category: q('
        price: Number(q('
        stock: Number(q('
        desc: q('
        preview: state.preview,
        experience: chk.checked
      };
      const all = lsGet(STORE_KEYS.products, []);
      all.unshift(product);
      lsSet(STORE_KEYS.products, all);

      if(chk.checked){
        const xp = lsGet(STORE_KEYS.experiences, []);
        const exp = {
          localId: uid(),
          productId: product.localId,
          productTitle: product.title,
          title: q('
          date: q('
          duration: Number(q('
          max: Number(q('
          preview: product.preview
        };
        xp.unshift(exp);
        lsSet(STORE_KEYS.experiences, xp);
      }

      toast('Product created');
      setTimeout(()=> location.href='artisan-products.html', 600);
    };
  }

  async function init(){
    await seedIfEmpty();
    renderProducts();
    renderExperiences();
    mountAddProduct();
  }

  document.addEventListener('DOMContentLoaded', init);
})();



(function deck(){
  const deck = document.getElementById('deck');
  if(!deck) return;
  const activateCenter = () => {
    const cards = Array.from(deck.children);
    const mid = deck.getBoundingClientRect().left + deck.clientWidth/2;
    let best=null, bestDist=Infinity;
    cards.forEach(c=>{
      const r = c.getBoundingClientRect();
      const center = r.left + r.width/2;
      const d = Math.abs(center - mid);
      if(d<bestDist){ bestDist=d; best=c; }
    });
    cards.forEach(c=>c.classList.remove('is-active'));
    if(best) best.classList.add('is-active');
  };
  deck.addEventListener('scroll', ()=> requestAnimationFrame(activateCenter));
  window.addEventListener('resize', activateCenter);
  activateCenter();

  
  let isDown=false, startX, scrollStart;
  const down = x => { isDown=true; startX=x; scrollStart=deck.scrollLeft; deck.classList.add('dragging') };
  const move = x => { if(!isDown) return; deck.scrollLeft = scrollStart - (x - startX); };
  const up = ()=> { isDown=false; deck.classList.remove('dragging'); };
  deck.addEventListener('mousedown', e=> down(e.pageX));
  window.addEventListener('mousemove', e=> move(e.pageX));
  window.addEventListener('mouseup', up);
  deck.addEventListener('touchstart', e=> down(e.touches[0].pageX), {passive:true});
  deck.addEventListener('touchmove', e=> move(e.touches[0].pageX), {passive:true});
  deck.addEventListener('touchend', up);

  
  const prev = document.querySelector('.deck-btn.prev');
  const next = document.querySelector('.deck-btn.next');
  const scrollByAmount = ()=> Math.min(deck.clientWidth*0.8, 480);
  prev && prev.addEventListener('click', ()=> deck.scrollBy({left:-scrollByAmount(), behavior:'smooth'}));
  next && next.addEventListener('click', ()=> deck.scrollBy({left: scrollByAmount(), behavior:'smooth'}));

  
  deck.addEventListener('wheel', (e)=>{
    if(Math.abs(e.deltaX) < Math.abs(e.deltaY)){
      deck.scrollBy({ left: e.deltaY, behavior: 'auto' });
      e.preventDefault();
    }
  }, {passive:false});
})();

