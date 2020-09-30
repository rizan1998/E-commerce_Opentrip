
  <section class=" camp  ">
    <div class="container-fluid">
      <h1 class=" primary-title-text">Kontak Kami</h1>
      <p class="mb-3 secondary-title-text ">
        Beri kami masukan tentang apa yang harus ada kami tambahkan
      </p>
    </div>
  </section>

  <!-- content page -->
  <section class="bgwhite p-t-66 p-b-60">
    <div class="container">
      <div class="row">
        <?= $this->session->flashdata('notif'); ?>
        <div class="col-md-6 p-b-30">
          <form class="leave-comment"  required action="<?= base_url('Feedback/kirimFeedback');?>" method="post">
            <h4 class="m-text26 p-b-36 p-t-15">
              Send us your message
            </h4>
            
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" required type="text" name="nama_lengkap" placeholder="Full Name">
            </div>

            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" required type="text" name="nomer_hp" placeholder="Phone Number">
            </div>

            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" required type="text" name="email" placeholder="Email Address">
            </div>

            <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="isi_feedback"
              placeholder="Message"></textarea>

            <div class="w-size25">
              <!-- Button -->
              <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                Send
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

