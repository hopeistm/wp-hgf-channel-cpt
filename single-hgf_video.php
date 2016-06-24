<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());

$show_navigation = get_post_meta(get_the_ID(), '_et_pb_project_nav', true);

?>

<div id="main-content">

    <?php while (have_posts()) :
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
                <div class="et_pb_section  et_pb_section_0 et_pb_with_background et_section_regular hgf-video-social-media-banner">
                    <div class=" et_pb_row et_pb_row_0 et_pb_row">
                        <div class="et_pb_column et_pb_column_2_2  et_pb_column_0">
                            <div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_0">
                                <h2>DISCOVER. SHARE. CHANGE THE WORLD.</h2>
                            </div> <!-- .et_pb_text -->
                        </div> <!-- .et_pb_column -->
                            <div class="et_pb_column et_pb_column_0_2  et_pb_column_1 hgf-video-social-column">
                                <ul class="et_pb_social_media_follow et_pb_module et_pb_bg_layout_light  et_pb_social_media_follow_0 clearfix">
                                    <li class="et_pb_social_icon et_pb_social_network_link et-social-facebook et_pb_social_media_follow_network_0">
                                        <a href="https://facebook.com/hopeglobalforum" class="icon circle" title="facebook" target="_blank" style="background-color: #000000;"><span>facebook</span></a>
                                    </li><li class="et_pb_social_icon et_pb_social_network_link et-social-twitter et_pb_social_media_follow_network_1">
                                    <a href="https://twitter.com/hopeglobalforum" class="icon circle" title="Twitter" target="_blank" style="background-color: #000000;"><span>Twitter</span></a>
                                </li><li class="et_pb_social_icon et_pb_social_network_link et-social-instagram et_pb_social_media_follow_network_2">
                                <a href="https://instagram.com/hopeglobalforum" class="icon circle" title="Instagram" target="_blank" style="background-color: #000000;"><span>Instagram</span></a>
                            </li><li class="et_pb_social_icon et_pb_social_network_link et-social-youtube et_pb_social_media_follow_network_3">
                            <a href="https://youtube.com/operationhopedotorg" class="icon circle" title="Youtube" target="_blank" style="background-color: #000000;"><span>Youtube</span></a>
                            </li>
                            </ul> <!-- .et_pb_counters -->
                            </div> <!-- .et_pb_column -->
                            </div> <!-- .et_pb_row -->
                        </div>

                <div class=" et_pb_row et_pb_row_1 hgf-video-fb-embed-row">

                    <div class="et_pb_column et_pb_column_2_3  et_pb_column_0">

                        <div class="">

                        <?php $video_url = get_field('url'); ?>
                        <?php if (preg_match('(facebook.com)' , $video_url)): ?>

                            <!-- display facebook div -->
                           <script>window.fbAsyncInit = function() {
                                FB.init({
                                    xfbml      : true,
                                    version    : 'v2.5'
                                });
                                }; (function(d, s, id){
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) {return;}
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-video" data-href="<?php echo $video_url; ?>" data-width="700" data-allowfullscreen="true"></div>

                        <?php else:
                            // strip youtube video id from user input
                            // parse_str( parse_url( $video_url, PHP_URL_QUERY ), $array_of_url_arguments );
                            preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $video_url, $matches);
                            $yt_video_url =  $matches[0];

                        ?>
                            <!-- display youtube div -->
                            <iframe width="560" height="315" src="<?php echo 'https://youtube.com/embed/', $yt_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                        <?php endif ?>

                        </div>
                    </div> <!-- .et_pb_column -->
                    <div class="et_pb_column et_pb_column_1_3  et_pb_column_1">

                        <div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_0">

                            <hr>
                            <h1 class="hgf-video-title"><?php the_title(); ?></h1>
                            <h3></h3>
                            <?php
                                $related_speakers = get_field('speaker_video');
                                $first = true;
                            ?>
                            <?php foreach ($related_speakers as $speaker) : ?>
                                <?php
                                    $title = get_field('Title', $speaker->ID);
                                    $company = get_field('Company', $speaker->ID);
                                    ?>
                                <hr>
                                <h3>
                                    <a class="hgf-video-speaker-name" href="<?php echo get_permalink($speaker->ID); ?>">
                                        <?php echo get_the_title($speaker->ID); ?>
                                    </a>
                                </h3>

                                <h5>

                                <?php if ($title && $company) : ?>
                                    <?php echo $title; ?>

                                    <?php if (substr($title, -1) != ','): ?>
                                    	,
                                    <?php endif ?>

                                    <br><?php echo $company; ?>

                                 <?php elseif ($title): ?>
                                 	<?php echo $title; ?>
                                <?php endif ?>

                                </h5>

                            <?php endforeach ?>

<!--                             access by index
                            <?php echo get_the_title($related_speakers[0]->ID); ?>
 -->
                         <hr>
                         <?php the_content( $more_link_text, $strip_teaser ); ?>
                         <?php $channel_url = get_post_type_archive_link( hgf_video ); ?>
                        <div class="hgf-video-back-social">
                            <a class="hgf-video-back-button" href="<?php echo $channel_url;?>">BACK TO VIDEOS</a>
                            <div class="hgf-video-social-wrapper">
                                <h6 class="hgf-video-share-label">SHARE</h6>
<!--                                 <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhgf2.dev%2Fchannel%2Fe-j-dionne%2F&amp;src=sdkpreparse">test</a>
 -->                                <!-- <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fhgf2.dev%2Fchannel%2Fe-j-dionne%2F&layout=icon&mobile_iframe=true&width=14&height=14&appId" width="14" height="14" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe> -->
                <!--                 <?php echo do_shortcode('[et_social_follow icon_style="flip" icon_shape="rounded" icons_location="top" col_number="auto" outer_color="dark"]'); ?> -->
                            </div>
                        </div>
                        <hr class="back-social-linebreak">
<!--                          <ul class="hgf-video-social-list">
                            <li><?php echo 'Twitter: @', get_field('twitter_handle', $related_speakers[0]->ID); ?></li>
                            <li><?php echo 'Facebook: ', get_field('facebook_page', $related_speakers[0]->ID); ?></li>
                            <li><?php echo 'Instgram: ', get_field('instagram', $related_speakers[0]->ID); ?></li>
                            <li><?php echo get_field('website', $related_speakers[0]->ID); ?></li>
                        </ul> -->
                        </div> <!-- .et_pb_text -->
                    </div> <!-- .et_pb_column -->

                </div> <!-- .et_pb_row -->

            </div> <!-- .et_pb_section -->

        </div> <!-- .entry-content -->

    </article> <!-- .et_pb_post -->

<?php endwhile; ?>
</div> <!-- #main-content -->
<?php get_footer(); ?>