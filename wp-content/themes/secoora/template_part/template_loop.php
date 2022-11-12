     <div class="news-section regular-para clearfix">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div <?php post_class("news-blk clearfix"); ?>>
                <div class="row">
                	<?php if ( has_post_thumbnail() ) : ?>
                    <div class="col-sm-3">
                        <div class="news-thumbnail">
                              
                                <div class="news-img form-group clearfix">
                                  <figure class="wp-caption alignright">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium',array('class'=>'img-fluid')); ?>
                                    </a>
                                    <figcaption class="wp-caption-text"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></figcaption>
                                  </figure>
                                </div>  
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ( has_post_thumbnail() ) : ?>
                    <?php $class="col-sm-8"; ?>
                    <?php else : ?>
                    <?php $class="col-sm-12"; ?>
                    <?php endif; ?>
                    <div class="<?php echo $class; ?>">
                        <div class="news-content">
                            <h3 class=""><a class="bs_inherite" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="text-muted"><i class="fa fa-calendar-o"></i> <?php the_time('F j, Y'); ?></p>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="marL0 btn text-uppercase btn-info">Read More</a>
                        </div>
                    </div>                            
                </div>
            </div>
            <hr />
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="center-block text-center">
          <?php content_nav(null); ?>
        </div>                    
     </div>
