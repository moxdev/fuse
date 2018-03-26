<?php
/**
 * Displays custom Partners page sections
 *
 * @package Fuse_Engineering
 */

function fuse_eng_partners_page_sections() {
	if ( function_exists( 'get_field' ) ) {

    ?>

    <ul class="box-container three-cols">
      <li class="box">
        <a href="demo/img/large/gm1.jpg" class="glightbox" data-glightbox="title: Description Bottom; descPosition: bottom;">
          <img src="demo/img/small/my-small.jpg" alt="image">
          <div class="glightbox-desc">
            <p>You can set the position of the desciption in different ways for example top, bottom, left or right</p>
            <p>Duis quis ipsum vehicula eros ultrices lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
              posuere cubilia Curae Duis quis ipsum vehicula eros ultrices lacinia. Vestibulum ante ipsum primis in faucibus
              orci luctus et ultrices posuere</p>
          </div>
        </a>
      </li>
    </ul>

    <?php

	}
}