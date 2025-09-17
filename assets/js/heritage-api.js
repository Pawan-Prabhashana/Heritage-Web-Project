
const API = {
  async json(url,data,method='POST'){ const r=await fetch(url,{method,headers:{'Content-Type':'application/json'},body:data?JSON.stringify(data):undefined,credentials:'same-origin'}); return r.json(); },
  async form(url,form,method='POST'){ const r=await fetch(url,{method,body:form,credentials:'same-origin'}); return r.json(); },
  login:(e,p)=>API.json('api/auth/login.php',{email:e,password:p}),
  register:(x)=>API.json('api/auth/register.php',x),
  me:()=>API.json('api/auth/me.php',null,'GET'),
  logout:()=>API.json('api/auth/logout.php',{}),
  categories:()=>fetch('api/categories/list.php').then(r=>r.json()),
  products:(params={})=>fetch('api/products/list.php?'+new URLSearchParams(params)).then(r=>r.json()),
  product:(id)=>fetch('api/products/get.php?id='+id).then(r=>r.json()),
  productCreate:(form)=>API.form('api/products/create.php',form),
  productUpdate:(payload)=>API.json('api/products/update.php',payload),
  experiences:(params={})=>fetch('api/experiences/list.php?'+new URLSearchParams(params)).then(r=>r.json()),
  expCreate:(form)=>API.form('api/experiences/create.php',form),
  bookingCreate:(payload)=>API.json('api/bookings/create.php',payload),
  cart:()=>fetch('api/orders/cart.php').then(r=>r.json()),
  addToCart:(payload)=>API.json('api/orders/add_to_cart.php',payload),
  checkout:()=>API.json('api/orders/checkout.php',{}),
  adminUsers:()=>fetch('api/admin/users_list.php').then(r=>r.json()),
  adminSetUserStatus:(payload)=>API.json('api/admin/user_set_status.php',payload),
};
document.addEventListener('DOMContentLoaded',()=>{
  const loginForm=document.querySelector('
  const regForm=document.querySelector('
  const adminUsersTable=document.querySelector('
  const prodForm=document.querySelector('
});
