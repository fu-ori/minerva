<?php

function remove_wordpress_ui() {
    if (isset($_GET['page']) && $_GET['page'] === 'minerva') {
        echo '<style>
            html { --wp-admin--admin-bar--height: 0; }
            #adminmenu, #adminmenu .wp-has-submenu, #adminmenu .wp-has-submenu a { display: none !important; }
            #wpadminbar { display: none !important; }
            #wpcontent { margin-left: 0 !important; padding-left: 0;}
            #wpbody-content { margin-top: 0 !important; }
            #wpfooter { display: none !important; }
            #header { display: none !important; }
            #wpbody { margin-left: 0 !important; margin-top: 0 !important; }
            #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap { display: none; }
        </style>';
    }
}
add_action('admin_head', 'remove_wordpress_ui');

?>