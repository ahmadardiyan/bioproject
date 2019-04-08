 <!-- head profile -->
 <div class="jumbotron">
     <div class="row">
         <div class="col-md-3 col-xs-3">
             <img src="<?php base_url()?>assets/images/profile/<?= $member['foto'];?>" class="img-circle" width="150px">
         </div>
         <div class="col-md-7 col-xs-7">
             <h2><?= $member['nama_member'];?></h2>
             <h4><?= $member['deskripsi_member']?></h4>
         </div>
         <div class="col-md-2 col-xs-2">
             <a class="btn btn-default" href="<?=base_url()?>update-profile">
                 Edit Profile
             </a>
         </div>
     </div>

     <div class="row nav-profile">
         <!-- <div class="col-md-12"> -->
         <div class="col-md-2">
             <h3> <a href="member">Portofolio</a> </h3>
         </div>
         <div class="col-md-2">
             <h3><a href="about">About</a> </h3>
         </div>
         <!-- </div> -->
     </div>
 </div>
 <!--end head profile -->