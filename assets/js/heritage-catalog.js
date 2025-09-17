
window.CATALOG = window.CATALOG || []; window.CATEGORIES = window.CATEGORIES || [];
(async()=>{ try{ const cats=await fetch('api/categories/list.php').then(r=>r.json()); if(cats.ok) window.CATEGORIES=cats.categories; const prods=await fetch('api/products/list.php').then(r=>r.json()); if(prods.ok) window.CATALOG=prods.products; document.dispatchEvent(new Event('CATALOG_READY')); }catch(e){ console.warn('catalog load failed',e);} })();
