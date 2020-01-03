<?php while (have_posts()) : the_post(); ?>

<section id="voices" class="block golden">
  <div class="site-wrapper">
    <div class="container narrow ">

       <div class="row">
          <div class="col-md-12 header-big">
             <h2 class="">Team</h2>
          </div>
       </div>

       <div class="row">
         <div class="col-md-12">
           <div class="staff">
            <?php
             $args = array(
               'post_type' => 'bio',
               'post__in' => array(1647, 1663, 13081, 26641, 32468, 26684, 41796, 49249, 65207, 91561, 91283, 84979),   // Mebane, Alex, Nation, Liz, Nancy, Molly, Analisa, Robert, Rupen, Carol, Taylor
               'posts_per_page' => -1,
               'orderby' => 'post__in',
               'order' => 'ASC'
             );

             $staff = new WP_Query($args);

             if ($staff->have_posts()) : while ($staff->have_posts()) : $staff->the_post();
               $user = get_field('user');
               //print_r ($user);
               ?>
              <div class="flex-section-4">
                 <div class="position-relative">
                    <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                    <div class="">
                       <?php the_post_thumbnail('medium-square'); ?>
                    </div>
                    <h4 class=""><?php the_title(); ?></h4>
                 </div>
              </div>
            <?php endwhile; endif; wp_reset_query(); ?>
           </div>
         </div>
      </div>
    </div>
  </div>
</section>

<section id="voices" class="block-small green ">
  <div class="site-wrapper ">
    <div class="container narrow ">
       <div class="row">
         <div class="col-md-12 header-big">
            <h2 class="">Specialists</h2>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="specialists">
             <?php
              $args = array(
                'post_type' => 'bio',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'meta_value title',
                'meta_key' => 'last_name_to_sort_by',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'author-type',
                    'field' => 'slug',
                    'terms' => 'specialist'
                  ),
                  array(
                    'taxonomy' => 'author-year',
                    'field' => 'slug',
                    'terms' => '2018'
                  )
                )
              );

              $specialists = new WP_Query($args);

              if ($specialists->have_posts()) : while ($specialists->have_posts()) : $specialists->the_post();
              $user = get_field('user');
              ?>
              <div class="flex-section-4">
                <div class="position-relative">
                   <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                   <div class="circle-image">
                      <?php the_post_thumbnail('medium-square'); ?>
                   </div>
                   <h4 class=""><?php the_title(); ?></h4>
                </div>
              </div>
             <?php endwhile; endif; wp_reset_query(); ?>
           </div>
         </div>
       </div>
     </div>
  </div>
</section>

<section id="voices" class="block-small bright-blue">
  <div class="site-wrapper">
    <div class="container narrow ">
       <div class="row">
         <div class="col-md-12 header-big">
            <h2 class="">Correspondents</h2>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="correspondents">
             <?php
              $args = array(
                'post_type' => 'bio',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'meta_value title',
                'meta_key' => 'last_name_to_sort_by',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'author-type',
                    'field' => 'slug',
                    'terms' => 'correspondent'
                  ),
                  array(
                    'taxonomy' => 'author-year',
                    'field' => 'slug',
                    'terms' => '2018'
                  )
                )
              );

              $correspondents = new WP_Query($args);

              if ($correspondents->have_posts()) : while ($correspondents->have_posts()) : $correspondents->the_post();
                $user = get_field('user');
                ?>
                <div class="flex-section-5">
                   <div class="position-relative">
                      <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                      <div class="circle-image">
                         <?php the_post_thumbnail('bio-headshot'); ?>
                      </div>
                      <h4 class=""><?php the_title(); ?></h4>
                   </div>
                </div>
              <?php endwhile; endif; wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="voices" class="block-small dark-blue">
  <div class="site-wrapper">
    <div class="container narrow ">
       <div class="row">
         <div class="col-md-12 header-big">
            <h2 class="">EdAmbassadors</h2>
         </div>
       </div>
       <div class="row">
          <div class="col-md-12">
             <div class="edambassadors">
               <?php
                  $args = array(
                    'post_type' => 'bio',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'meta_value title',
                    'meta_key' => 'last_name_to_sort_by',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'author-type',
                        'field' => 'slug',
                        'terms' => 'edambassador'
                      ),
                      array(
                        'taxonomy' => 'author-year',
                        'field' => 'slug',
                        'terms' => '2018'
                      )
                    )
                  );

                  $edambassadors = new WP_Query($args);

                  if ($edambassadors->have_posts()) : while ($edambassadors->have_posts()) : $edambassadors->the_post();
                    $user = get_field('user');
                    ?>
                    <div class="flex-section-6">
                       <div class="position-relative">
                          <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                          <div class="circle-image">
                             <?php the_post_thumbnail('bio-headshot'); ?>
                          </div>
                          <h4 class=""><?php the_title(); ?></h4>
                       </div>
                    </div>
                   <?php endwhile; endif; wp_reset_query(); ?>
                </div>
             </div>
        </div>
     </div>
  </div>
</section>

<section id="voices" class="block-small coral">
  <div class="site-wrapper">
    <div class="container narrow ">
       <div class="row">
         <div class="col-md-12 header-big tabs-section">
            <h2 class="">Contributers</h2>
            <ul class="nav nav-tabs" role="tablist">
               <li role="presentation" class="active"><a href="#y2020" aria-controls="y2020" role="tab" data-toggle="tab">2020</a></li>
               <li role="presentation"><a href="#y2019" aria-controls="y2019" role="tab" data-toggle="tab">2019</a></li>
               <li role="presentation"><a href="#y2018" aria-controls="y2018" role="tab" data-toggle="tab">2018</a></li>
               <li role="presentation"><a href="#y2017" aria-controls="y2017" role="tab" data-toggle="tab">2017</a></li>
               <li role="presentation"><a href="#y2016" aria-controls="y2016" role="tab" data-toggle="tab">2016</a></li>
               <li role="presentation"><a href="#y2015" aria-controls="y2015" role="tab" data-toggle="tab">2015</a></li>
            </ul>
         </div>
       </div>

       <!-- <div class="row"> -->
       <div class="tab-content">
         <div role="tabpanel" class="tab-pane active" id="y2020">
            <div class="col-md-12">
              <div class="contributors">
                 <?php
                    $args = array(
                      'post_type' => 'bio',
                      'posts_per_page' => -1,
                      'order' => 'ASC',
                      'orderby' => 'meta_value title',
                      'meta_key' => 'last_name_to_sort_by',
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'author-type',
                          'field' => 'slug',
                          'terms' => 'contributor'
                        ),
                        array(
                          'taxonomy' => 'author-year',
                          'field' => 'slug',
                          'terms' => '2020'
                        )
                      )
                    );
                    $contributors = new WP_Query($args);

                    if ($contributors->have_posts()) : while ($contributors->have_posts()) : $contributors->the_post();
                      $user = get_field('user');
                      ?>
                      <div class="flex-section-6">
                         <div class="position-relative">
                            <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                            <div class="circle-image">
                               <?php the_post_thumbnail('bio-headshot'); ?>
                            </div>
                            <h4 class=""><?php the_title(); ?></h4>
                         </div>
                      </div>
                    <?php endwhile; endif; wp_reset_query(); ?>
                  </div>
               </div>
            </div>
         <div role="tabpanel" class="tab-pane" id="y2019">
            <div class="col-md-12">
              <div class="contributors">
                 <?php
                    $args = array(
                      'post_type' => 'bio',
                      'posts_per_page' => -1,
                      'order' => 'ASC',
                      'orderby' => 'meta_value title',
                      'meta_key' => 'last_name_to_sort_by',
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'author-type',
                          'field' => 'slug',
                          'terms' => 'contributor'
                        ),
                        array(
                          'taxonomy' => 'author-year',
                          'field' => 'slug',
                          'terms' => '2019'
                        )
                      )
                    );
                    $contributors = new WP_Query($args);

                    if ($contributors->have_posts()) : while ($contributors->have_posts()) : $contributors->the_post();
                      $user = get_field('user');
                      ?>
                      <div class="flex-section-6">
                         <div class="position-relative">
                            <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                            <div class="circle-image">
                               <?php the_post_thumbnail('bio-headshot'); ?>
                            </div>
                            <h4 class=""><?php the_title(); ?></h4>
                         </div>
                      </div>
                    <?php endwhile; endif; wp_reset_query(); ?>
                  </div>
               </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="y2018">
               <div class="col-md-12">
                 <div class="contributors">
                    <?php
                       $args = array(
                         'post_type' => 'bio',
                         'posts_per_page' => -1,
                         'order' => 'ASC',
                         'orderby' => 'meta_value title',
                         'meta_key' => 'last_name_to_sort_by',
                         'tax_query' => array(
                           array(
                             'taxonomy' => 'author-type',
                             'field' => 'slug',
                             'terms' => 'contributor'
                           ),
                           array(
                             'taxonomy' => 'author-year',
                             'field' => 'slug',
                             'terms' => '2018'
                           )
                         )
                       );
                       $contributors = new WP_Query($args);

                       if ($contributors->have_posts()) : while ($contributors->have_posts()) : $contributors->the_post();
                         $user = get_field('user');
                         ?>
                         <div class="flex-section-6">
                            <div class="position-relative">
                               <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                               <div class="circle-image">
                                  <?php the_post_thumbnail('bio-headshot'); ?>
                               </div>
                               <h4 class=""><?php the_title(); ?></h4>
                            </div>
                         </div>
                       <?php endwhile; endif; wp_reset_query(); ?>
                   </div>
                </div>
            </div>


            <div role="tabpanel" class="tab-pane" id="y2017">
               <div class="col-md-12">
                 <div class="contributors">
                    <?php
                       $args = array(
                         'post_type' => 'bio',
                         'posts_per_page' => -1,
                         'order' => 'ASC',
                         'orderby' => 'meta_value title',
                         'meta_key' => 'last_name_to_sort_by',
                         'tax_query' => array(
                           array(
                             'taxonomy' => 'author-type',
                             'field' => 'slug',
                             'terms' => 'contributor'
                           ),
                           array(
                             'taxonomy' => 'author-year',
                             'field' => 'slug',
                             'terms' => '2017'
                           )
                         )
                       );
                       $contributors = new WP_Query($args);

                       if ($contributors->have_posts()) : while ($contributors->have_posts()) : $contributors->the_post();
                         $user = get_field('user');
                         ?>
                         <div class="flex-section-6">
                            <div class="position-relative">
                               <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                               <div class="circle-image">
                                  <?php the_post_thumbnail('bio-headshot'); ?>
                               </div>
                               <h4 class=""><?php the_title(); ?></h4>
                            </div>
                         </div>
                       <?php endwhile; endif; wp_reset_query(); ?>
                   </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="y2016">
               <div class="col-md-12">
                 <div class="contributors">
                    <?php
                       $args = array(
                         'post_type' => 'bio',
                         'posts_per_page' => -1,
                         'order' => 'ASC',
                         'orderby' => 'meta_value title',
                         'meta_key' => 'last_name_to_sort_by',
                         'tax_query' => array(
                           array(
                             'taxonomy' => 'author-type',
                             'field' => 'slug',
                             'terms' => 'contributor'
                           ),
                           array(
                             'taxonomy' => 'author-year',
                             'field' => 'slug',
                             'terms' => '2016'
                           )
                         )
                       );
                       $contributors = new WP_Query($args);

                       if ($contributors->have_posts()) : while ($contributors->have_posts()) : $contributors->the_post();
                         $user = get_field('user');
                         ?>
                         <div class="flex-section-6">
                            <div class="position-relative">
                               <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                               <div class="circle-image">
                                  <?php the_post_thumbnail('bio-headshot'); ?>
                               </div>
                               <h4 class=""><?php the_title(); ?></h4>
                            </div>
                         </div>
                       <?php endwhile; endif; wp_reset_query(); ?>
                   </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="y2015">
               <div class="col-md-12">
                 <div class="contributors">
                    <?php
                       $args = array(
                         'post_type' => 'bio',
                         'posts_per_page' => -1,
                         'order' => 'ASC',
                         'orderby' => 'meta_value title',
                         'meta_key' => 'last_name_to_sort_by',
                         'tax_query' => array(
                           array(
                             'taxonomy' => 'author-type',
                             'field' => 'slug',
                             'terms' => 'contributor'
                           ),
                           array(
                             'taxonomy' => 'author-year',
                             'field' => 'slug',
                             'terms' => '2015'
                           )
                         )
                       );
                       $contributors = new WP_Query($args);

                       if ($contributors->have_posts()) : while ($contributors->have_posts()) : $contributors->the_post();
                         $user = get_field('user');
                         ?>
                         <div class="flex-section-6">
                            <div class="position-relative">
                               <a class="mega-link" href="<?php echo get_author_posts_url($user['ID']); ?>"></a>
                               <div class="circle-image">
                                  <?php the_post_thumbnail('bio-headshot'); ?>
                               </div>
                               <h4 class=""><?php the_title(); ?></h4>
                            </div>
                         </div>
                       <?php endwhile; endif; wp_reset_query(); ?>
                   </div>
                </div>
            </div>
        </div>






       </div>
    </div>
  </div>
</section>

<?php endwhile; ?>
