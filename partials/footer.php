 <?php  ?>
 </main>
 <footer class="footer">
     <div class="container footer-inner">
         <div>
             <div class="brand" style="margin-bottom:6px"><i class="logo"></i><span>Heritage</span></div>
             <small>© <span id="year"></span> Heritage • Built in Sri Lanka 🇱🇰</small>
         </div>
         <div>
             <strong>Explore</strong><br>
             <a class="see-all" href="/products">Shop</a> ·
             <a class="see-all" href="/experiences">Experiences</a> ·
             <a class="see-all" href="/faq">FAQ</a>
         </div>
         <div>
             <strong>Contact</strong><br>
             <small class="muted">hello@heritage.lk</small>
         </div>
     </div>
 </footer>
 <script src="assets/js/heritage.js"></script>
 <script>
     document.getElementById('year').textContent = new Date().getFullYear();
 </script>

 <script src="assets/js/heritage-cart.js"></script>

 </body>

 </html>