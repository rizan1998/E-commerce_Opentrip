
  <!-- Footer -->
  <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45 mt-5">
    <div class="flex-w p-b-90">
      <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
          GET IN TOUCH
        </h4>

        <div>
          <p class="s-text7 w-size27">
            Ada Pertanyaa? kirim kami pesan agar kami tau apa yang kurang dari kami: Rizanalfalah@gmail.com
          </p>

          <div class="flex-m p-t-30">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
          </div>
        </div>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Categories
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              Gunung Tertinggi
            </a>
          </li>

          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              Gunung sabana
            </a>
          </li>

          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              Gunung Terlanday
            </a>
          </li>

          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              Gunung Tercuram
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Links
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              Search
            </a>
          </li>

          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              About Us
            </a>
          </li>

          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              Contact Us
            </a>
          </li>

          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              Returns
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Help
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="<?= base_url('assets/Template/view_Front-end/')?>#" class="s-text7">
              Kontak Kami
            </a>
          </li>

        </ul>
      </div>

      <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
          Newsletter
        </h4>

        <form>
          <div class="effect1 w-size9">
            <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
            <span class="effect1-line"></span>
          </div>

          <div class="w-size2 p-t-20">
            <!-- Button -->
            <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
              Subscribe
            </button>
          </div>

        </form>
      </div>
    </div>



    <div class="t-center s-text8 p-t-20">
      Copyright © 2020 All rights reserved. | This aplication <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
        href="<?= base_url('assets/Template/view_Front-end/')?>https://colorlib.com" target="_blank">MurialCode</a>
    </div>
    </div>
  </footer>



  <!-- Back to top -->
  <div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
  </div>

  <!-- Container Selection1 -->
  <div id="dropDownSelect1"></div>



  <!--===============================================================================================-->
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/bootstrap/js/popper.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/select2/select2.min.js"></script>
  <script type="text/javascript">
    $(".selection-1").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/slick/slick.min.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>js/slick-custom.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/lightbox2/js/lightbox.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?= base_url('assets/Template/view_Front-end/');?>vendor/sweetalert/sweetalert.min.js"></script>
  
  <!--===============================================================================================-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
  <script src="<?= base_url('assets/Template/view_Front-end/');?>js/map-custom.js"></script>
  <!--===============================================================================================-->
  <!--===============================================================================================-->
  <script src="<?= base_url('assets/')?>vendor/xzoom/dist/xzoom.min.js"></script>
  <!-- x-zoom -->
  <script>
    $(document).ready(function () {
      $('.xzoom, .xzoom-gallery').xzoom({
        zoomWidth: 500,
        title: false,
        tint: '#333',
        Xoffset: 15
      });
    });
  </script>
  <!--===============================================================================================-->
  <script src="<?= base_url('assets/Template/view_Front-end/');?>js/main.js"></script>

  <script>
    // popovers initialization - on hover
    // $('[data-toggle="popover-hover"]').popover({
    //   html: true,
    //   trigger: 'hover',
    //   placement: 'top',
    //   content: function () {
    //     return '<img src="<?= base_url('assets/Template/view_Front-end/');?>' + $(this).data('img') + '" />';
    //   }
    // });
  </script>

</body>

</html>