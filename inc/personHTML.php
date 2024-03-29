<?php

function generatePersonHTML($id) {

    if("" !== $id) {       
        // return 'hello From Our New FILE Generate Person HTML' . $id;
    
        $personPost = new WP_Query(array(
            'post_type' => 'mo_persons',
            'p' => $id,
        ));
    
        while($personPost->have_posts()) {
            $personPost->the_post();
            ob_start();
    
            $person_first_name = carbon_get_post_meta($id, 'first_name');
            $person_last_name = carbon_get_post_meta($id, 'last_name');
            $person_description = carbon_get_post_meta($id, 'description');
            $person_image = carbon_get_post_meta($id, 'image');
            $person_position = carbon_get_post_meta($id, 'position');
            $person_github = carbon_get_post_meta($id, 'github');
            $person_linkedin = carbon_get_post_meta($id, 'linkedin');
            $person_xing = carbon_get_post_meta($id, 'xing');
            $person_facebook = carbon_get_post_meta($id, 'facebook');
    
            ?>
            <div class="person_container_content">
                <div class="mo_person_full_name">
                    <?php echo $person_first_name . ' ' . $person_last_name; ?>
                </div>
                <div class="mo_person_description">
                    <?php echo $person_description; ?>
                </div>
                <div class="mo_person_image">
                    <?php echo wp_get_attachment_image($person_image, 'thumbnail'); ?>
                </div>
                <div class="mo_person_position">
                    <?php echo $person_position; ?>
                </div>
                <ul class="mo_person_social_media">
                    <li class="social_item_list mo_person_github_link">
                        <a class="social_link" href="<?php echo $person_github; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                            </svg>
                            Github
                        </a>
                    </li>
                    <li class="social_item_list mo_person_linkedin_link">
                        <a class="social_link" href="<?php echo $person_linkedin; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                        </svg>    
                        LinkedIn
                        </a>
                    </li>
                    <li class="social_item_list mo_person_xing_link">
                        <a class="social_link" href="<?php echo $person_xing; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-14.085 15l2.744-4.825-1.846-3.162h3.292l1.83 3.152-2.744 4.835h-3.276zm8.79-1.445l3.514 6.445h-3.252l-3.55-6.445 5.38-9.555h3.289l-5.381 9.555z"/>
                        </svg>   
                        Xing
                        </a>
                    </li>
                    <li class="social_item_list mo_person_facebook_link">
                        <a class="social_link" href="<?php echo $person_facebook; ?>">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"  fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>Facebook
                        </a>
                    </li>
                </ul>
            </div>
    
            <?php
            wp_reset_postdata();
            return ob_get_clean();
        }
    } else {
        return NULL;
    }
}