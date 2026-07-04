<?php
/**
 * PrimeLink – Meta Boxes
 * Registers editable content fields on each page in the WordPress admin.
 * Fields are read in templates via pl_field() with fallback defaults.
 */
defined( 'ABSPATH' ) || exit;

/* ================================================================
   HELPER: get a page meta field with a default fallback
   ================================================================ */
function pl_field( $post_id, $key, $default = '' ) {
    $val = get_post_meta( $post_id, '_pl_' . $key, true );
    return ( $val !== '' && $val !== false ) ? $val : $default;
}

/* ================================================================
   ICON LIST — 20 Font Awesome icons for card pickers
   ================================================================ */
function pl_icon_list() {
    return [
        'fa-mountain'          => 'Mountain (Geotechnical)',
        'fa-shield-halved'     => 'Shield (Protection/Safety)',
        'fa-map'               => 'Map (GIS/Mapping)',
        'fa-drafting-compass'  => 'Compass (AutoCAD/Design)',
        'fa-code'              => 'Code (Software Dev)',
        'fa-laptop'            => 'Laptop (IT Products)',
        'fa-hammer'            => 'Hammer (Construction)',
        'fa-house-chimney'     => 'House (Housing Design)',
        'fa-database'          => 'Database (Data Solutions)',
        'fa-chart-line'        => 'Chart (Analysis)',
        'fa-file-contract'     => 'File (Reports)',
        'fa-store'             => 'Store (Retail)',
        'fa-user-tie'          => 'Person (Professional)',
        'fa-headset'           => 'Headset (Customer Service)',
        'fa-tag'               => 'Tag (Pricing)',
        'fa-flag'              => 'Flag (Local Company)',
        'fa-sliders'           => 'Sliders (Customized)',
        'fa-graduation-cap'    => 'Graduation (Research/Uni)',
        'fa-wrench'            => 'Wrench (Technical Support)',
        'fa-globe'             => 'Globe (Global/Mining)',
    ];
}

/* ================================================================
   SHARED HELPER RENDERERS
   ================================================================ */
function pl_nonce() {
    wp_nonce_field( 'pl_save_meta', 'pl_meta_nonce' );
}

function pl_input( $post_id, $key, $label, $placeholder = '' ) {
    $val = esc_attr( pl_field( $post_id, $key ) );
    echo '<p><label style="font-weight:600;display:block;margin-bottom:4px;">' . esc_html( $label ) . '</label>';
    echo '<input type="text" name="pl_' . esc_attr( $key ) . '" value="' . $val . '" placeholder="' . esc_attr( $placeholder ) . '" style="width:100%;"></p>';
}

function pl_textarea( $post_id, $key, $label, $rows = 3, $placeholder = '' ) {
    $val = esc_textarea( pl_field( $post_id, $key ) );
    echo '<p><label style="font-weight:600;display:block;margin-bottom:4px;">' . esc_html( $label ) . '</label>';
    echo '<textarea name="pl_' . esc_attr( $key ) . '" rows="' . (int) $rows . '" placeholder="' . esc_attr( $placeholder ) . '" style="width:100%;">' . $val . '</textarea></p>';
}

function pl_url_input( $post_id, $key, $label, $placeholder = 'https://' ) {
    $val = esc_url( pl_field( $post_id, $key ) );
    echo '<p><label style="font-weight:600;display:block;margin-bottom:4px;">' . esc_html( $label ) . '</label>';
    echo '<input type="url" name="pl_' . esc_attr( $key ) . '" value="' . $val . '" placeholder="' . esc_attr( $placeholder ) . '" style="width:100%;"></p>';
}

/** Media upload input — URL field + Choose Image button */
function pl_media_input( $post_id, $key, $label ) {
    $val     = esc_url( pl_field( $post_id, $key ) );
    $fieldid = 'pl_media_' . esc_attr( $key );
    echo '<p>';
    echo '<label style="font-weight:600;display:block;margin-bottom:4px;">' . esc_html( $label ) . '</label>';
    echo '<div style="display:flex;gap:8px;align-items:center;">';
    echo '<input type="text" id="' . $fieldid . '" name="pl_' . esc_attr( $key ) . '" value="' . $val . '" placeholder="https://" style="flex:1;">';
    echo '<button type="button" class="button pl-media-upload-btn" data-target="#' . $fieldid . '">' . esc_html__( 'Choose Image', 'primelink' ) . '</button>';
    echo '</div>';
    if ( $val ) {
        echo '<img src="' . $val . '" style="max-height:80px;margin-top:8px;border-radius:4px;display:block;" alt="">';
    }
    echo '</p>';
}

/** Icon picker dropdown */
function pl_icon_select( $post_id, $key, $label, $default = 'fa-mountain' ) {
    $current = pl_field( $post_id, $key, $default );
    $icons   = pl_icon_list();
    echo '<p><label style="font-weight:600;display:block;margin-bottom:4px;">' . esc_html( $label ) . '</label>';
    echo '<select name="pl_' . esc_attr( $key ) . '" style="width:100%;">';
    foreach ( $icons as $fa_class => $icon_label ) {
        $sel = selected( $current, $fa_class, false );
        echo '<option value="' . esc_attr( $fa_class ) . '"' . $sel . '>' . esc_html( $icon_label ) . ' — ' . esc_html( $fa_class ) . '</option>';
    }
    echo '</select></p>';
}

/* ================================================================
   ENQUEUE MEDIA UPLOADER + PICKER JS in admin
   ================================================================ */
add_action( 'admin_enqueue_scripts', function( $hook ) {
    if ( ! in_array( $hook, [ 'post.php', 'post-new.php' ], true ) ) return;
    wp_enqueue_media();
    wp_add_inline_script( 'jquery-core', "
    jQuery(function($){
        $(document).on('click', '.pl-media-upload-btn', function(e){
            e.preventDefault();
            var target = $(this).data('target');
            var frame = wp.media({ title: 'Select Image', button: { text: 'Use this image' }, multiple: false });
            frame.on('select', function(){
                var att = frame.state().get('selection').first().toJSON();
                $(target).val(att.url);
                var prev = $(target).closest('p').find('img');
                if(prev.length){ prev.attr('src', att.url); } else {
                    $(target).closest('div').after('<img src=\"'+att.url+'\" style=\"max-height:80px;margin-top:8px;border-radius:4px;display:block;\">');
                }
            });
            frame.open();
        });
    });
    " );
} );

/* ================================================================
   REGISTER ALL META BOXES
   ================================================================ */
function primelink_register_meta_boxes() {

    $home = [ 'template' => 'front-page.php' ];

    add_meta_box( 'pl_home_hero',     __( 'Hero Section',             'primelink' ), 'pl_mb_home_hero',     'page', 'normal', 'high',    $home );
    add_meta_box( 'pl_home_stats',    __( 'Statistics (4 items)',      'primelink' ), 'pl_mb_home_stats',    'page', 'normal', 'high',    $home );
    add_meta_box( 'pl_home_about',    __( 'About Section',             'primelink' ), 'pl_mb_home_about',    'page', 'normal', 'default', $home );
    add_meta_box( 'pl_home_services', __( 'Core Services (12 cards)',   'primelink' ), 'pl_mb_home_services', 'page', 'normal', 'default', $home );
    add_meta_box( 'pl_home_why',      __( 'Why Choose Us (8 cards)',    'primelink' ), 'pl_mb_home_why',      'page', 'normal', 'default', $home );

    add_meta_box( 'pl_about_content',    __( 'About Us Content',          'primelink' ), 'pl_mb_about_content',    'page', 'normal', 'high',    [ 'template' => 'page-about-us.php' ] );
    add_meta_box( 'pl_contact_details',  __( 'Contact Details',           'primelink' ), 'pl_mb_contact_details',  'page', 'normal', 'high',    [ 'template' => 'page-contact.php' ] );
    add_meta_box( 'pl_contact_map',      __( 'Google Maps Embed URL',     'primelink' ), 'pl_mb_contact_map',      'page', 'normal', 'default', [ 'template' => 'page-contact.php' ] );
    add_meta_box( 'pl_eng_content',      __( 'Engineering Sections',      'primelink' ), 'pl_mb_eng_content',      'page', 'normal', 'high',    [ 'template' => 'page-engineering-solutions.php' ] );
    add_meta_box( 'pl_it_content',       __( 'IT Services Content',       'primelink' ), 'pl_mb_it_content',       'page', 'normal', 'high',    [ 'template' => 'page-it-services.php' ] );
    add_meta_box( 'pl_services_pricing', __( 'Pricing Cards',             'primelink' ), 'pl_mb_services_pricing', 'page', 'normal', 'high',    [ 'template' => 'page-services.php' ] );
    add_meta_box( 'pl_outlets_content',  __( 'Outlets Content',           'primelink' ), 'pl_mb_outlets_content',  'page', 'normal', 'high',    [ 'template' => 'page-outlets.php' ] );
    add_meta_box( 'pl_page_banner',      __( 'Page Banner',               'primelink' ), 'pl_mb_page_banner',      'page', 'normal', 'high' );
    add_meta_box( 'pl_global_info',      __( 'Global Site Info',          'primelink' ), 'pl_mb_global_info',      'page', 'side',   'default' );
}
add_action( 'add_meta_boxes', 'primelink_register_meta_boxes' );

/* ================================================================
   RENDER: Page Banner
   ================================================================ */
function pl_mb_page_banner( $post ) {
    if ( get_post_meta( $post->ID, '_wp_page_template', true ) === 'front-page.php' ) {
        echo '<p style="color:#888;">The homepage uses the Hero Section box instead.</p>';
        return;
    }
    pl_nonce();
    pl_input( $post->ID, 'banner_badge',   'Badge Text',          'e.g. Who We Are' );
    pl_input( $post->ID, 'banner_heading', 'Page Banner Heading', 'e.g. About Ceylon PrimeLink Holdings' );
    pl_textarea( $post->ID, 'banner_subtext', 'Banner Subtitle',  2 );
}

/* ================================================================
   RENDER: Home Hero
   ================================================================ */
function pl_mb_home_hero( $post ) {
    pl_nonce();
    pl_input(    $post->ID, 'hero_eyebrow',   'Eyebrow Label',                   'e.g. Sri Lankan Engineering & Technology' );
    pl_input(    $post->ID, 'hero_line1',     'Heading Line 1',                  'e.g. Connecting' );
    pl_input(    $post->ID, 'hero_line2',     'Heading Line 2 (accent/gold)',     'e.g. Industries.' );
    pl_input(    $post->ID, 'hero_line3',     'Heading Line 3',                  'e.g. Unlocking Opportunities.' );
    pl_textarea( $post->ID, 'hero_lead',      'Lead Paragraph',              3 );
    pl_input(    $post->ID, 'hero_btn1_text', 'Primary Button Text',             'e.g. Request a Quotation' );
    pl_url_input( $post->ID,'hero_btn1_url',  'Primary Button URL' );
    pl_input(    $post->ID, 'hero_btn2_text', 'Secondary Button Text',           'e.g. Learn More' );
    pl_url_input( $post->ID,'hero_btn2_url',  'Secondary Button URL' );
    echo '<hr style="margin:16px 0;"><strong>Hero Image</strong>';
    pl_media_input( $post->ID, 'hero_image_url', 'Hero Image (click to upload from Media Library)' );
    pl_input( $post->ID, 'hero_image_alt', 'Hero Image Alt Text', 'e.g. Engineering site investigation' );
    echo '<hr style="margin:16px 0;"><strong>Float Card — Top Left</strong>';
    pl_input( $post->ID, 'float1_label', 'Float Card Label (e.g. "200+")',   '200+' );
    pl_input( $post->ID, 'float1_sub',   'Float Card Sub-text',              'Projects Done' );
    echo '<strong>Float Card — Bottom Right</strong>';
    pl_input( $post->ID, 'float2_label', 'Float Card Label (e.g. "10+ Years")', '10+ Years' );
    pl_input( $post->ID, 'float2_sub',   'Float Card Sub-text',               'Trusted Service' );
}

/* ================================================================
   RENDER: Home Stats
   ================================================================ */
function pl_mb_home_stats( $post ) {
    echo '<p style="color:#555;font-size:0.85em;">The first three stats appear in the hero section below the call-to-action buttons.</p>';
    for ( $i = 1; $i <= 4; $i++ ) {
        echo '<hr style="margin:12px 0;"><strong>Stat ' . $i . '</strong>';
        pl_input( $post->ID, 'stat' . $i . '_num',         'Number',      'e.g. 200' );
        pl_input( $post->ID, 'stat' . $i . '_suffix',      'Suffix',      'e.g. +' );
        pl_input( $post->ID, 'stat' . $i . '_label_hero',  'Hero Label',  'e.g. Projects' );
        pl_input( $post->ID, 'stat' . $i . '_label_strip', 'Strip Label', 'e.g. Projects Completed' );
    }
}

/* ================================================================
   RENDER: Home About
   ================================================================ */
function pl_mb_home_about( $post ) {
    pl_input(    $post->ID, 'about_badge',    'Badge Text',       'e.g. Who We Are' );
    pl_input(    $post->ID, 'about_heading',  'Heading',          'e.g. A Trusted Multi-Sector Company' );
    pl_textarea( $post->ID, 'about_text',     'Paragraph',    4 );
    pl_input(    $post->ID, 'about_est_year', 'Established Year', '2014' );
    pl_media_input( $post->ID, 'about_image_url', 'About Section Image' );
    pl_input(    $post->ID, 'about_image_alt','Image Alt Text' );
}

/* ================================================================
   RENDER: Core Services — 12 cards with icon picker
   ================================================================ */
function pl_mb_home_services( $post ) {
    $defaults = [
        1  => [ 'fa-mountain',         'blue',   'Engineering Solutions',   'Geotechnical investigations, borehole drilling, SPT testing, and engineering reports.',      '/engineering-solutions' ],
        2  => [ 'fa-shield-halved',    'amber',  'Landslide Mitigation',    'Slope stability analysis, retaining wall design, and government-rejected site re-evaluation.','/engineering-solutions' ],
        3  => [ 'fa-map',              'cyan',   'GIS & Mapping',            'ArcGIS and QGIS project support, spatial analysis, and terrain modelling.',                  '/engineering-solutions' ],
        4  => [ 'fa-drafting-compass', 'purple', 'AutoCAD Design',           'Professional engineering drafting, housing plans, and structural concept designs.',          '/engineering-solutions' ],
        5  => [ 'fa-code',             'green',  'Software Development',     'Custom business software, cashier systems, and database applications from LKR 45,000.',     '/it-services' ],
        6  => [ 'fa-laptop',           'blue',   'IT Products & Support',    'Laptops, computers, accessories, networking equipment, and technical support.',              '/it-services' ],
        7  => [ 'fa-hammer',           'amber',  'Construction Services',    'Construction consultancy, earth reinforcement, and infrastructure solutions.',               '/services' ],
        8  => [ 'fa-house-chimney',    'pink',   'Housing Design',           'Residential and commercial housing plan designs and engineering feasibility studies.',       '/services' ],
        9  => [ 'fa-database',         'purple', 'Database Solutions',       'Small business databases and data management systems from LKR 45,000.',                     '/it-services' ],
        10 => [ 'fa-chart-line',       'green',  'Slope Stability Analysis', 'GeoStudio and PLAXIS modelling and engineering analysis.',                                  '/engineering-solutions' ],
        11 => [ 'fa-file-contract',    'cyan',   'Geotechnical Reports',     'Professional site investigation reports, borehole logs, and engineering documentation.',    '/engineering-solutions' ],
        12 => [ 'fa-store',            'pink',   'Retail Outlets',           'Computer products, laptops, IT accessories at our Gampaha office and retail outlet.',       '/outlets' ],
    ];
    echo '<p style="color:#555;font-size:0.85em;">Edit each service card displayed in the Core Services grid on the homepage.</p>';
    foreach ( $defaults as $i => $d ) {
        echo '<hr style="margin:14px 0;"><strong>Card ' . $i . ' — ' . esc_html( $d[2] ) . '</strong>';
        pl_icon_select( $post->ID, 'svc' . $i . '_icon',  'Icon',         $d[0] );
        pl_input(       $post->ID, 'svc' . $i . '_title', 'Title',        $d[2] );
        pl_textarea(    $post->ID, 'svc' . $i . '_desc',  'Description',  2, $d[3] );
        pl_url_input(   $post->ID, 'svc' . $i . '_link',  'Link URL',     home_url( $d[4] ) );
    }
}

/* ================================================================
   RENDER: Why Choose Us — 8 cards with icon picker
   ================================================================ */
function pl_mb_home_why( $post ) {
    $defaults = [
        1 => [ 'fa-user-tie',       'Professional Engineering Experience', 'Hands-on geotechnical, construction, and GIS project experience across Sri Lanka.' ],
        2 => [ 'fa-shield-halved',  'Reliable Technical Solutions',        'Technically sound, well-documented solutions that meet industry standards.' ],
        3 => [ 'fa-laptop-code',    'Modern Software Expertise',           'From custom business software to GIS analysis tools — full digital solutions.' ],
        4 => [ 'fa-tag',            'Affordable Pricing',                  'Competitive and transparent pricing tailored for Sri Lankan businesses.' ],
        5 => [ 'fa-headset',        'Responsive Customer Service',         'Quick responses via phone, email, and WhatsApp. We stay in contact throughout.' ],
        6 => [ 'fa-flag',           'Sri Lankan Based Company',            'We understand local terrain, regulations, and business needs. Based in Gampaha.' ],
        7 => [ 'fa-sliders',        'Customized Solutions',                'No two projects are the same. Every solution is tailored to your requirements.' ],
        8 => [ 'fa-graduation-cap', 'University & Research Support',       'GIS and engineering analysis support for undergrad and postgraduate projects.' ],
    ];
    echo '<p style="color:#555;font-size:0.85em;">Edit each card in the "Why Choose PrimeLink?" section.</p>';
    foreach ( $defaults as $i => $d ) {
        echo '<hr style="margin:14px 0;"><strong>Card ' . $i . ' — ' . esc_html( $d[1] ) . '</strong>';
        pl_icon_select( $post->ID, 'why' . $i . '_icon',  'Icon',         $d[0] );
        pl_input(       $post->ID, 'why' . $i . '_title', 'Title',        $d[1] );
        pl_textarea(    $post->ID, 'why' . $i . '_desc',  'Description',  2, $d[2] );
    }
}

/* ================================================================
   RENDER: Remaining callbacks (About, Contact, Engineering, IT,
           Services, Outlets, Global) — unchanged from previous
   ================================================================ */
function pl_mb_about_content( $post ) {
    pl_nonce();
    pl_input(    $post->ID, 'about_est_year', 'Established Year', '2014' );
    pl_media_input( $post->ID, 'about_image_url', 'Story Image' );
    pl_textarea( $post->ID, 'about_para1', 'Story Paragraph 1', 4 );
    pl_textarea( $post->ID, 'about_para2', 'Story Paragraph 2', 4 );
    pl_textarea( $post->ID, 'about_para3', 'Story Paragraph 3', 3 );
    echo '<hr style="margin:16px 0;">';
    pl_textarea( $post->ID, 'mission_text', 'Mission Statement', 3 );
    pl_textarea( $post->ID, 'vision_text',  'Vision Statement',  3 );
}
function pl_mb_contact_details( $post ) {
    pl_nonce();
    pl_input( $post->ID, 'contact_address',   'Office Address',        '54A, Sanasa Ideal Shopping Complex, Colombo Road, Gampaha 10019, Sri Lanka' );
    pl_input( $post->ID, 'contact_phone',     'Phone Number',          '+94 775 860 868' );
    pl_input( $post->ID, 'contact_phone_url', 'Phone for tel: link',   '+94775860868' );
    pl_input( $post->ID, 'contact_whatsapp',  'WhatsApp Number',       '94775860868' );
    pl_input( $post->ID, 'contact_email',     'Email Address',         'info@primelink.com.lk' );
    echo '<hr style="margin:16px 0;"><strong>Business Hours</strong>';
    pl_input( $post->ID, 'hours_weekday',  'Monday – Friday', '8:30 AM – 5:30 PM' );
    pl_input( $post->ID, 'hours_saturday', 'Saturday',        '9:00 AM – 2:00 PM' );
    pl_input( $post->ID, 'hours_sunday',   'Sunday',          'Closed' );
}
function pl_mb_contact_map( $post ) {
    $val = esc_attr( pl_field( $post->ID, 'map_embed_url' ) );
    echo '<p style="color:#555;font-size:0.85em;">Paste the <strong>src</strong> URL from a Google Maps embed iframe — just the URL, not the full iframe HTML.</p>';
    echo '<p><label style="font-weight:600;display:block;margin-bottom:4px;">Map Embed src URL</label>';
    echo '<input type="text" name="pl_map_embed_url" value="' . $val . '" placeholder="https://www.google.com/maps/embed?pb=..." style="width:100%;"></p>';
}
function pl_mb_eng_content( $post ) {
    pl_nonce();
    echo '<strong>Geotechnical</strong>';
    pl_textarea( $post->ID, 'geotech_intro',   'Intro Paragraph',  3 );
    pl_input(    $post->ID, 'geotech_pricing', 'Pricing Note',     'e.g. Starting from LKR 100,000' );
    echo '<hr style="margin:16px 0;"><strong>Landslide Mitigation</strong>';
    pl_textarea( $post->ID, 'landslide_intro', 'Intro Paragraph',  3 );
    echo '<hr style="margin:16px 0;"><strong>GIS & Mapping</strong>';
    pl_textarea( $post->ID, 'gis_intro',       'Intro Paragraph',  3 );
    echo '<hr style="margin:16px 0;"><strong>AutoCAD</strong>';
    pl_input(    $post->ID, 'autocad_heading', 'Section Heading',  'AutoCAD & Engineering Design' );
    echo '<hr style="margin:16px 0;"><strong>Featured Projects Note</strong>';
    pl_textarea( $post->ID, 'projects_note',   'Subtitle',         2 );
    $val = esc_attr( pl_field( $post->ID, 'map_embed_url' ) );
    echo '<hr style="margin:16px 0;"><strong>Map Embed URL</strong>';
    echo '<p><input type="text" name="pl_map_embed_url" value="' . $val . '" placeholder="https://www.google.com/maps/embed?pb=..." style="width:100%;"></p>';
}
function pl_mb_it_content( $post ) {
    pl_nonce();
    pl_textarea( $post->ID, 'it_software_intro', 'Software Section Subtitle', 2 );
    pl_textarea( $post->ID, 'it_laptop_intro',   'Laptops Section Subtitle',  2 );
    pl_input(    $post->ID, 'it_enquiry_email',  'Enquiry emails to',          'info@primelink.com.lk' );
    $val = esc_attr( pl_field( $post->ID, 'map_embed_url' ) );
    echo '<p><label style="font-weight:600;display:block;margin-bottom:4px;">Map Embed URL</label>';
    echo '<input type="text" name="pl_map_embed_url" value="' . $val . '" placeholder="https://www.google.com/maps/embed?pb=..." style="width:100%;"></p>';
}
function pl_mb_services_pricing( $post ) {
    pl_nonce();
    foreach ( [ ['db','Database Solutions','LKR 45,000','Starting price per project'], ['biz','Business Software','LKR 50,000','Per system, per project'], ['eng','Engineering & GIS','LKR 100,000','Starting price per project'] ] as [ $p, $dl, $dp, $dd ] ) {
        echo '<hr style="margin:16px 0;"><strong>' . esc_html( $dl ) . '</strong>';
        pl_input( $post->ID, 'price_' . $p . '_label', 'Label', $dl );
        pl_input( $post->ID, 'price_' . $p . '_price', 'Price', $dp );
        pl_input( $post->ID, 'price_' . $p . '_desc',  'Desc',  $dd );
    }
}
function pl_mb_outlets_content( $post ) {
    pl_nonce();
    pl_input(    $post->ID, 'outlet_name',     'Outlet Name',    'PrimeLink Holdings – Gampaha' );
    pl_input(    $post->ID, 'outlet_address',  'Full Address',   '54A, Sanasa Ideal Shopping Complex, Colombo Road, Gampaha 10019, Sri Lanka' );
    pl_input(    $post->ID, 'outlet_phone',    'Phone',          '+94 775 860 868' );
    pl_input(    $post->ID, 'outlet_email',    'Email',          'info@primelink.com.lk' );
    pl_textarea( $post->ID, 'outlet_intro',    'Intro',          3 );
    pl_media_input( $post->ID, 'outlet_image_url', 'Outlet Photo' );
    pl_textarea( $post->ID, 'outlet_expansion','Expansion Note', 3 );
    $val = esc_attr( pl_field( $post->ID, 'outlet_map_url' ) );
    echo '<p><label style="font-weight:600;display:block;margin-bottom:4px;">Map Embed URL</label>';
    echo '<input type="text" name="pl_outlet_map_url" value="' . $val . '" placeholder="https://www.google.com/maps/embed?pb=..." style="width:100%;"></p>';
}
function pl_mb_global_info( $post ) {
    echo '<p style="font-size:0.82em;color:#555;">Sitewide contact details and social links are managed in <a href="' . esc_url( admin_url( 'customize.php' ) ) . '" target="_blank">Appearance → Customize → Contact Info</a>.</p>';
}

/* ================================================================
   SAVE META — handles all pl_ fields including new card fields
   ================================================================ */
function primelink_save_meta( $post_id ) {
    if ( ! isset( $_POST['pl_meta_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['pl_meta_nonce'], 'pl_save_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // Build dynamic service card fields (12 cards)
    $svc_fields = [];
    for ( $i = 1; $i <= 12; $i++ ) {
        $svc_fields[] = 'svc' . $i . '_icon';
        $svc_fields[] = 'svc' . $i . '_title';
        $svc_fields[] = 'svc' . $i . '_desc';
    }
    // Build dynamic why-choose-us fields (8 cards)
    $why_fields = [];
    for ( $i = 1; $i <= 8; $i++ ) {
        $why_fields[] = 'why' . $i . '_icon';
        $why_fields[] = 'why' . $i . '_title';
        $why_fields[] = 'why' . $i . '_desc';
    }
    // Service card link fields (URL)
    $svc_url_fields = [];
    for ( $i = 1; $i <= 12; $i++ ) {
        $svc_url_fields[] = 'svc' . $i . '_link';
    }

    $text_fields = array_merge( $svc_fields, $why_fields, [
        'banner_badge', 'banner_heading', 'banner_subtext',
        'hero_eyebrow', 'hero_line1', 'hero_line2', 'hero_line3',
        'hero_lead', 'hero_btn1_text', 'hero_btn2_text', 'hero_image_alt',
        'float1_label', 'float1_sub', 'float2_label', 'float2_sub',
        'stat1_num','stat1_suffix','stat1_label_hero','stat1_label_strip',
        'stat2_num','stat2_suffix','stat2_label_hero','stat2_label_strip',
        'stat3_num','stat3_suffix','stat3_label_hero','stat3_label_strip',
        'stat4_num','stat4_suffix','stat4_label_hero','stat4_label_strip',
        'about_badge','about_heading','about_text','about_est_year','about_image_alt',
        'about_para1','about_para2','about_para3','mission_text','vision_text',
        'contact_address','contact_phone','contact_phone_url','contact_whatsapp','contact_email',
        'hours_weekday','hours_saturday','hours_sunday',
        'geotech_intro','geotech_pricing','landslide_intro','gis_intro','autocad_heading','projects_note',
        'it_software_intro','it_laptop_intro','it_repair_heading','it_enquiry_email',
        'price_db_label','price_db_price','price_db_desc',
        'price_biz_label','price_biz_price','price_biz_desc',
        'price_eng_label','price_eng_price','price_eng_desc',
        'outlet_name','outlet_address','outlet_phone','outlet_email','outlet_intro','outlet_expansion',
    ] );

    foreach ( $text_fields as $field ) {
        $key = 'pl_' . $field;
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, '_pl_' . $field, sanitize_textarea_field( $_POST[ $key ] ) );
        }
    }

    $url_fields = array_merge( $svc_url_fields, [
        'hero_btn1_url','hero_btn2_url','hero_image_url',
        'about_image_url','outlet_image_url','map_embed_url','outlet_map_url',
    ] );
    foreach ( $url_fields as $field ) {
        $key = 'pl_' . $field;
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, '_pl_' . $field, esc_url_raw( $_POST[ $key ] ) );
        }
    }
}
add_action( 'save_post', 'primelink_save_meta' );
