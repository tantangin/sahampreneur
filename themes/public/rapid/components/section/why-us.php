 <!--==========================
 Why Us Section
============================-->
 <hr>
 <section id="why-us" class="wow fadeIn">
   <div class="container-fluid">

     <header class="section-header">
       <h3>Apa yang didapatkan dari program Sahampreneur?</h3>
       <p></p>
     </header>

     <div class="row">

       <!-- <div class="col-lg-6">
        <div class="why-us-img">
          <img src="<?= $thema_folder; ?>assets/img/why-us.jpg" alt="" class="img-fluid">
        </div>
      </div> -->

       <div class="col-lg-12">
         <div class="why-us-content">
           <div class="container">
             <!-- <p class="text-center">Dari awal kami berprinsip untuk tidak memanjakan atau memberi sinyal ke member Sahampreneur.
             </p>

             <p class="text-center">
               “Kasih seseorang seekor ikan, dia bisa makan untuk sehari. Ajarin seseorang cara memancing dan dia bisa makan untuk seumur hidup.” Tetapi sesuai tujuan kami dari awal, kami ingin membimbing kalian untuk menjadi seorang trader dan investor yang mandiri. Tidak ada yang mudah untuk mempelajari sebuah ilmu baru dan berharga ini. Tetapi kalau kalian punya passion dalam dunia trading dan investasi, sudah saatnya kalian berhenti untuk berpikir dan mulai mengambil tindakan.
             </p> -->
             <div class="row row-eq-height three-sections d-flex">

               <div class="col-md-6  wow bounceInUp aos-init aos-animate align-self-stretch my-2" data-aos="zoom-in" data-aos-delay="100">
                 <div class="d-flex justify-content-center flex-column rounded-lg my-2 text-center h-100" style="background-color: #f5f8fd;">
                   <div class="my-3">
                     <img src="<?= base_url('assets/img/icon/video.jpeg'); ?>" alt="video" class="rounded-circle" style="width:110;height:100px">
                   </div>
                   <h5 class=" font-weight-bold">10+ Video Online Course</h5>
                   <!-- <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p> -->
                 </div>
               </div>
               <div class="col-md-6  wow bounceInUp aos-init aos-animate align-self-stretch my-2" data-aos="zoom-in" data-aos-delay="100">
                 <div class="d-flex justify-content-center flex-column rounded-lg my-2 text-center h-100" style="background-color: #f5f8fd;">
                   <div class="my-3">
                     <img src="<?= base_url('assets/img/icon/kalkulator.jpeg'); ?>" alt="video" class="rounded-circle" style="width:110;height:100px">
                   </div>
                   <h5 class=" font-weight-bold display-5">Kalkulator Perhitungan Harga Wajar Saham <br />( Value Investing )
                   </h5>
                   <!-- <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p> -->
                 </div>
               </div>
               <div class="col-md-6  wow bounceInUp aos-init aos-animate align-self-stretch my-2" data-aos="zoom-in" data-aos-delay="100">
                 <div class="d-flex justify-content-center flex-column rounded-lg my-2 text-center h-100" style="background-color: #f5f8fd;">
                   <div class="my-3">
                     <img src="<?= base_url('assets/img/icon/komunitas.jpeg'); ?>" alt="video" class="rounded-circle" style="width:110;height:100px">
                   </div>
                   <h5 class=" font-weight-bold">Komunitas Private Sahampreneur lewat Telegram</h5>
                   <!-- <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p> -->
                 </div>
               </div>
               <div class="col-md-6  wow bounceInUp aos-init aos-animate align-self-stretch my-2" data-aos="zoom-in" data-aos-delay="100">
                 <div class="d-flex justify-content-center flex-column rounded-lg my-2 text-center h-100" style="background-color: #f5f8fd;">
                   <div class="my-3">
                     <img src="<?= base_url('assets/img/icon/posisi.jpeg'); ?>" alt="video" class="rounded-circle" style="width:110;height:100px">
                   </div>
                   <h5 class="  font-weight-bold">Posisi / Titik, Langkah dan Strategy Jual Beli Saham Felix Tohanda</h5>
                   <!-- <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p> -->
                 </div>
               </div>
             </div>
           </div>

           <!-- <div class="features wow bounceInUp clearfix">
            <i class="fa fa-diamond" style="color: #f058dc;"></i>
            <h4>Corporis dolorem</h4>
            <p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
          </div>

          <div class="features wow bounceInUp clearfix">
            <i class="fa fa-object-group" style="color: #ffb774;"></i>
            <h4>Eum ut aspernatur</h4>
            <p>Molestias eius rerum iusto voluptas et ab cupiditate aut enim. Assumenda animi occaecati. Quo dolore fuga quasi autem aliquid ipsum odit. Perferendis doloremque iure nulla aut.</p>
          </div>

          <div class="features wow bounceInUp clearfix">
            <i class="fa fa-language" style="color: #589af1;"></i>
            <h4>Voluptates dolores</h4>
            <p>Voluptates nihil et quis omnis et eaque omnis sint aut. Ducimus dolorum aspernatur. Totam dolores ut enim ullam voluptas distinctio aut.</p>
          </div> -->

         </div>

       </div>

     </div>
   </div>

   <div class="container">
     <div class="row counters">

       <?php foreach ($whyUses as $whyUs) : ?>
         <div class="col-lg-3 col-6 text-center">
           <span data-toggle="counter-up"><?= @$whyUs->val ?? 274; ?></span>
           <p><?= $whyUs->name; ?></p>
         </div>
       <?php endforeach; ?>
     </div>

   </div>
 </section>