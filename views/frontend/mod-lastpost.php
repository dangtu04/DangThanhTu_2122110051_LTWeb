<?php

use App\Models\Post;

$page = Post::where([['type', '=', 'post'], ['status', '=', 1]])->first();; ?>
<section class="hdl-lastpost bg-main mt-3 py-4">
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <h3>BÀI VIẾT MỚI</h3>
            <div class="row">
               <div class="col-md-10">
                  <a href="index.php?option=post-detail">
                     <img class="img-fluid" src="public/images/post/<?=$page->image;?>" />
                  </a>
                  <h3 class="post-title fs-4 py-2">
                     <a href="index.php?option=post-detail">
                       <?=$page->title;?>
                     </a>
                  </h3>
                  <p>  <?=$page->detail;?></p>
               </div>
               <!-- <div class="col-md-6">


                  <div class="row mb-3">
                     <div class="col-md-4">
                        <a href="index.php?option=post-detail">
                           <img class="img-fluid" src="public/images/post/post-1.jpg" />
                        </a>
                     </div>
                     <div class="col-md-8">
                        <h3 class="post-title fs-5">
                           <a href="index.php?option=post-detail">
                              <?= $page->title; ?>
                           </a>
                        </h3>
                        <p><?= $page->detail; ?></p>
                     </div>
                  </div>

                  <div class="row mb-3">
                        <div class="col-md-4">
                           <a href="index.php?option=post-detail">
                              <img class="img-fluid" src="public/images/post/post-2.jpg" />
                           </a>
                        </div>
                        <div class="col-md-8">
                           <h3 class="post-title fs-5">
                              <a href="index.php?option=post-detail">
                                 Tieu đề bài viết mói nhất 3
                              </a>
                           </h3>
                           <p>Tieu đề bài viết mói nhất 1Tieu đề bài viết mói nhất 1Tieu đề bài viết mói nhất 1</p>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-4">
                           <a href="index.php?option=post-detail">
                              <img class="img-fluid" src="public/images/post/post-3.jpg" />
                           </a>
                        </div>
                        <div class="col-md-8">
                           <h3 class="post-title fs-5">
                              <a href="index.php?option=post-detail">
                                 Tieu đề bài viết mói nhất 4
                              </a>
                           </h3>
                           <p>Tieu đề bài viết mói nhất 1Tieu đề bài viết mói nhất 1Tieu đề bài viết mói nhất 1</p>
                        </div>
                     </div> 
               </div> -->
            </div>
         </div>
         <div class="col-md-3">FACEBOOK</div>
      </div>
   </div>
</section>