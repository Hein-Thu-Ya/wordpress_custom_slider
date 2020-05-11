<div id="demo" class="carousel slide" data-ride="carousel">
    <?php
        $arg = array(
            'post_type'         => 'slider',
            'order'             => 'ASC'
        );
        $slider = new WP_Query($arg);
        $j = 0;
        $post_count = wp_count_posts('slider')->publish;
    ?>
    <!-- Indicators -->
    <ul class="carousel-indicators">
        <?php for($i=0;$i<$post_count; $i++): ?>
            <li data-target="#demo" data-slide-to="<?php echo $i; ?>" class="active"></li>
        <?php endfor; ?>
    </ul>
    <!-- The slideshow -->
    <div class="carousel-inner">
        <?php while($slider->have_posts()) : $slider->the_post(); ?>
            <div class="carousel-item  <?php echo $j==0 ? ' active': '';?>">
                <?php if(has_post_thumbnail()): the_post_thumbnail('slider'); endif; ?>
            </div>
        <?php $j++; endWhile; wp_reset_query(); ?>
    </div>
</div>