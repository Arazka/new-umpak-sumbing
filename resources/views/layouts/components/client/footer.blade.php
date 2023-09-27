<!-- FOOTER -->
<div class="content" style="margin-bottom: 100px">
</div>
<style>
    .list-inline .bi:hover {
        color: rgb(117, 31, 15);
        transition: 0.2s;
    }

    .list-unstyled .link:hover {
        color: rgb(117, 31, 15);
        transition: 0.2s;
}
</style>
<footer class="footer bg-dark text-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <h5>About Us</h5>
          <p>Ikuti kami di media sosial:</p>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-white fs-4"><i class="bi bi-youtube"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-white fs-4"><i class="bi bi-tiktok"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <h5>Explore</h5>
          <ul class="list-unstyled">
            <li><a href="{{ url('/') }}" class="text-light link">Beranda</a></li>
            <li><a href="{{ url('/regulasi') }}" class="text-light link">Regulasi</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-12">
          <h5>Contact</h5>
          <address>
            <i class="bi bi-geo-alt-fill"></i> Kecamatan Bandongan, Kabupaten Magelang, Jawa Tengah<br>
            <i class="bi bi-envelope-fill"></i> <a href="mailto:umpaksumbing@gmail.com" class="text-light">umpaksumbing@gmail.com</a><br>
            <i class="bi bi-phone-fill"></i> +1234567890
          </address>
        </div>
      </div>
      <hr class="mt-4 mb-4">
      <div class="row">
        <div class="col-12 text-center">
          <p class="mb-0">&copy; {{ date('Y') }} Umpak Sumbing. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- END FOOTER -->