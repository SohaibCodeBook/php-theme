<?php
/**
 * PrimeLink – Customizer Registrations
 * All controls use built-in WP types (text, url, image) — no custom classes.
 */
defined( 'ABSPATH' ) || exit;

function primelink_customizer( $wp_customize ) {

    // ── Social Media ──────────────────────────────────────────
    $wp_customize->add_section( 'primelink_social', [ 'title' => 'Social Media Links', 'priority' => 120 ] );
    $wp_customize->add_setting( 'primelink_facebook_url', [ 'default' => '', 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh' ] );
    $wp_customize->add_control( 'primelink_facebook_url', [ 'label' => 'Facebook Page URL', 'section' => 'primelink_social', 'type' => 'url' ] );
    $wp_customize->add_setting( 'primelink_linkedin_url', [ 'default' => '', 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh' ] );
    $wp_customize->add_control( 'primelink_linkedin_url', [ 'label' => 'LinkedIn Page URL', 'section' => 'primelink_social', 'type' => 'url' ] );

    // ── Contact Info (Global) ─────────────────────────────────
    $wp_customize->add_section( 'primelink_contact', [ 'title' => 'Contact Info (Global)', 'priority' => 115 ] );
    $c = [
        'primelink_company_name'  => [ 'Company Name',       'Ceylon PrimeLink Holdings (Pvt) Ltd' ],
        'primelink_address_short' => [ 'Address (short)',     '54A Sanasa Complex, Colombo Rd, Gampaha' ],
        'primelink_address_full'  => [ 'Address (full)',      '54A, Sanasa Ideal Shopping Complex, Colombo Road, Gampaha 10019, Sri Lanka' ],
        'primelink_phone'         => [ 'Phone Number',        '+94 775 860 868' ],
        'primelink_phone_raw'     => [ 'Phone (tel: link)',   '+94775860868' ],
        'primelink_whatsapp'      => [ 'WhatsApp Number',     '94775860868' ],
        'primelink_email'         => [ 'Email Address',       'info@primelink.com.lk' ],
        'primelink_hours_weekday' => [ 'Mon-Fri Hours',       '8:30 AM - 5:30 PM' ],
        'primelink_hours_sat'     => [ 'Saturday Hours',      '9:00 AM - 2:00 PM' ],
        'primelink_footer_desc'   => [ 'Footer Description',  'A Sri Lankan multi-sector company delivering engineering, geotechnical, GIS, construction, software, and IT solutions.' ],
    ];
    foreach ( $c as $key => [ $lbl, $def ] ) {
        $wp_customize->add_setting( $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( $key, [ 'label' => $lbl, 'section' => 'primelink_contact', 'type' => 'text' ] );
    }

    // ── Homepage Settings ─────────────────────────────────────
    $wp_customize->add_section( 'primelink_homepage', [
        'title'       => 'Homepage Settings',
        'priority'    => 100,
        'capability'  => 'edit_theme_options',
        'description' => 'Edit all homepage content: hero, stats, about, service cards, and why-choose-us cards.',
    ] );

    // Shortcut: register a text field
    $t = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_hp_' . $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( 'pl_hp_' . $key, [ 'label' => $lbl, 'section' => 'primelink_homepage', 'type' => 'text' ] );
    };

    // Shortcut: register an image field
    $img = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_hp_' . $key, [ 'default' => $def, 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pl_hp_' . $key, [ 'label' => $lbl, 'section' => 'primelink_homepage' ] ) );
    };

    // Hero
    $t( 'hero_eyebrow',   'Hero: Eyebrow Label',           'Sri Lankan Engineering & Technology' );
    $t( 'hero_line1',     'Hero: Heading Line 1',           'Connecting' );
    $t( 'hero_line2',     'Hero: Heading Line 2 (accent)',  'Industries.' );
    $t( 'hero_line3',     'Hero: Heading Line 3',           'Unlocking Opportunities.' );
    $t( 'hero_lead',      'Hero: Lead Paragraph',           'Ceylon PrimeLink Holdings provides trusted solutions in geotechnical engineering, GIS mapping, AutoCAD design, construction, software development, and IT products across Sri Lanka.' );
    $t( 'hero_btn1_text', 'Hero: Primary Button Text',      'Request a Quotation' );
    $t( 'hero_btn1_url',  'Hero: Primary Button URL',       '' );
    $t( 'hero_btn2_text', 'Hero: Secondary Button Text',    'Learn More' );
    $t( 'hero_btn2_url',  'Hero: Secondary Button URL',     '' );
    $img( 'hero_image',   'Hero: Main Image (click Upload)', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=75&auto=format&fit=crop' );
    $t( 'hero_image_alt', 'Hero: Image Alt Text',            'Engineering site investigation in Sri Lanka' );
    $t( 'float1_label',   'Hero: Float Card 1 Label',        '200+ Projects' );
    $t( 'float1_sub',     'Hero: Float Card 1 Sub-text',     'Projects Done' );
    $t( 'float2_label',   'Hero: Float Card 2 Label',        '10+ Years' );
    $t( 'float2_sub',     'Hero: Float Card 2 Sub-text',     'Trusted Service' );

    // Stats
    $t( 'stat1_num', 'Stat 1: Number', '200' ); $t( 'stat1_suffix', 'Stat 1: Suffix', '+' );
    $t( 'stat1_label_hero', 'Stat 1: Hero Label', 'Projects' ); $t( 'stat1_label_strip', 'Stat 1: Strip Label', 'Projects Completed' );
    $t( 'stat2_num', 'Stat 2: Number', '150' ); $t( 'stat2_suffix', 'Stat 2: Suffix', '+' );
    $t( 'stat2_label_hero', 'Stat 2: Hero Label', 'Clients' ); $t( 'stat2_label_strip', 'Stat 2: Strip Label', 'Satisfied Clients' );
    $t( 'stat3_num', 'Stat 3: Number', '6' ); $t( 'stat3_suffix', 'Stat 3: Suffix', '' );
    $t( 'stat3_label_hero', 'Stat 3: Hero Label', 'Sectors' ); $t( 'stat3_label_strip', 'Stat 3: Strip Label', 'Service Sectors' );
    $t( 'stat4_num', 'Stat 4: Number', '10' ); $t( 'stat4_suffix', 'Stat 4: Suffix', '+' );
    $t( 'stat4_label_hero', 'Stat 4: Hero Label', 'Yrs Exp.' ); $t( 'stat4_label_strip', 'Stat 4: Strip Label', 'Years Experience' );

    // About section
    $t( 'about_badge',   'About: Badge Text',    'Who We Are' );
    $t( 'about_heading', 'About: Heading',        'A Trusted Multi-Sector Company in Sri Lanka' );
    $t( 'about_text',    'About: Paragraph',      'Ceylon PrimeLink Holdings is a Sri Lankan company delivering practical engineering knowledge and modern technology solutions.' );
    $t( 'about_est',     'About: Est. Year',      '2014' );
    $img( 'about_image', 'About: Section Image (click Upload)', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=700&q=75&auto=format&fit=crop' );

    // Service cards (12)
    $svcs = [
        1=>['Engineering Solutions','Geotechnical investigations, borehole drilling, SPT testing, and engineering reports.'],
        2=>['Landslide Mitigation','Slope stability analysis, retaining wall design, and government-rejected site re-evaluation.'],
        3=>['GIS & Mapping','ArcGIS and QGIS project support, spatial analysis, and terrain modelling.'],
        4=>['AutoCAD Design','Professional engineering drafting, housing plans, and structural concept designs.'],
        5=>['Software Development','Custom business software, cashier systems, and database applications from LKR 45,000.'],
        6=>['IT Products & Support','Laptops, computers, accessories, networking equipment, and technical support.'],
        7=>['Construction Services','Construction consultancy, earth reinforcement, and infrastructure solutions.'],
        8=>['Housing Design','Residential and commercial housing plan designs and engineering feasibility studies.'],
        9=>['Database Solutions','Small business databases and data management systems from LKR 45,000.'],
        10=>['Slope Stability Analysis','GeoStudio and PLAXIS modelling and engineering analysis.'],
        11=>['Geotechnical Reports','Professional site investigation reports, borehole logs, and engineering documentation.'],
        12=>['Retail Outlets','Computer products, laptops, IT accessories at our Gampaha office and retail outlet.'],
    ];
    foreach ( $svcs as $i => [ $dt, $dd ] ) {
        $t( 'svc'.$i.'_title', 'Service '.$i.': Title', $dt );
        $t( 'svc'.$i.'_desc',  'Service '.$i.': Description', $dd );
    }

    // Why choose us cards (8)
    $whys = [
        1=>['Professional Engineering Experience','Hands-on geotechnical, construction, and GIS project experience across Sri Lanka.'],
        2=>['Reliable Technical Solutions','Technically sound, well-documented solutions that meet industry standards.'],
        3=>['Modern Software Expertise','From custom business software to GIS analysis tools - full digital solutions.'],
        4=>['Affordable Pricing','Competitive and transparent pricing tailored for Sri Lankan businesses.'],
        5=>['Responsive Customer Service','Quick responses via phone, email, and WhatsApp. We stay in contact throughout.'],
        6=>['Sri Lankan Based Company','We understand local terrain, regulations, and business needs. Based in Gampaha.'],
        7=>['Customized Solutions','No two projects are the same. Every solution is tailored to your requirements.'],
        8=>['University & Research Support','GIS and engineering analysis support for undergrad and postgraduate projects.'],
    ];
    foreach ( $whys as $i => [ $dt, $dd ] ) {
        $t( 'why'.$i.'_title', 'Why '.$i.': Title', $dt );
        $t( 'why'.$i.'_desc',  'Why '.$i.': Description', $dd );
    }

    // ── About Us Page ─────────────────────────────────────────
    $wp_customize->add_section( 'primelink_about', [
        'title'      => 'About Us Page',
        'priority'   => 101,
        'capability' => 'edit_theme_options',
        'description'=> 'Edit all content on the About Us page.',
    ] );

    // Shortcut closures scoped to About Us section
    $at = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_au_' . $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( 'pl_au_' . $key, [ 'label' => $lbl, 'section' => 'primelink_about', 'type' => 'text' ] );
    };
    $ai = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_au_' . $key, [ 'default' => $def, 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pl_au_' . $key, [ 'label' => $lbl, 'section' => 'primelink_about' ] ) );
    };
    $ata = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_au_' . $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( 'pl_au_' . $key, [ 'label' => $lbl, 'section' => 'primelink_about', 'type' => 'textarea' ] );
    };

    // Banner
    $at( 'banner_badge',   'Banner: Badge Text',    'Who We Are' );
    $at( 'banner_heading', 'Banner: Heading',        'About Ceylon PrimeLink Holdings' );
    $at( 'banner_subtext', 'Banner: Sub-text',       'A Sri Lankan multi-sector company delivering engineering, geotechnical, GIS, construction, software, and IT solutions with precision and integrity.' );

    // Story section
    $ai( 'story_image',   'Story: Photo (Upload)',   'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=75&auto=format&fit=crop' );
    $at( 'est_year',       'Story: Established Year', '2014' );
    $at( 'story_title',    'Story: Section Heading',  'Ceylon PrimeLink Holdings (Pvt) Ltd' );
    $ata( 'para1',          'Story: Paragraph 1 (Core Expertise)', 'Our company primarily specializes in landslide investigations and geotechnical testing. Much of our work focuses on landslide-prone areas in Sri Lanka, including districts such as Kandy, Nuwara Eliya, Badulla, Kegalle, Ratnapura, Galle, Kalutara, and parts of Gampaha and Kurunegala. This has been our core expertise, and over time we expanded our services to include AutoCAD drafting, engineering design, and related consultancy services.' );
    $at( 'para2',          'Story: Paragraph 2',      "Our mission is to provide practical, cost-effective, and professionally delivered services that make a real difference to our clients' projects." );
    $at( 'para3',          'Story: Paragraph 3',      'We are based at our main office and retail outlet in Gampaha, conveniently located in the Western Province of Sri Lanka, and we serve clients across the island.' );

    // Mission & Vision
    $at( 'mission', 'Mission Statement', 'To connect industries through practical engineering knowledge, modern technology, and innovative solutions — delivering reliable services that empower Sri Lankan businesses and communities to grow and prosper.' );
    $at( 'vision',  'Vision Statement',  'To be the most trusted multi-sector solutions provider in Sri Lanka — recognised for professional integrity, technical excellence, and commitment to delivering real value to every client we serve.' );

    // Expertise cards (12)
    $exp = [
        1  => [ 'Geotechnical Engineering',  'Soil investigations, borehole drilling, SPT testing, and detailed geotechnical reports.' ],
        2  => [ 'Construction Consultancy',  'Site assessments, retaining wall design, earth reinforcement, and advisory services.' ],
        3  => [ 'Landslide Mitigation',       'Slope stability analysis, hazard assessment, and practical mitigation solutions.' ],
        4  => [ 'GIS & Mapping',              'ArcGIS and QGIS projects, spatial analysis, terrain modelling, and engineering GIS.' ],
        5  => [ 'AutoCAD Drafting',           'Precision engineering drawings, housing plans, and structural concept designs.' ],
        6  => [ 'Software Development',       'Custom business software, cashier systems, and database applications.' ],
        7  => [ 'Database Solutions',         'Small business database setup, data management, and ongoing support.' ],
        8  => [ 'IT Products & Support',      'Laptops, desktops, accessories, and networking equipment.' ],
        9  => [ 'Housing Design',             'Residential and commercial housing plan designs and feasibility studies.' ],
        10 => [ 'Mining Support',             'Engineering support services for mining operations and geological investigations.' ],
        11 => [ 'Engineering Reports',        'Professional technical reports for geotechnical and site assessment projects.' ],
        12 => [ 'University & Research',      'GIS and engineering analysis support for undergraduate and postgraduate projects.' ],
    ];
    foreach ( $exp as $i => [ $dt, $dd ] ) {
        $at( 'exp'.$i.'_title', 'Expertise '.$i.': Title', $dt );
        $at( 'exp'.$i.'_desc',  'Expertise '.$i.': Description', $dd );
    }

    // Core Values (6)
    $vals = [
        1 => [ 'Integrity',     'We uphold honesty and transparency in every client relationship.' ],
        2 => [ 'Precision',     'Engineering work demands accuracy. We deliver detailed, reliable outputs.' ],
        3 => [ 'Innovation',    'We continuously adopt modern tools to deliver forward-thinking solutions.' ],
        4 => [ 'Reliability',   'Our clients trust us to deliver what we promise, on time.' ],
        5 => [ 'Affordability', 'Professional-grade services at pricing that works for Sri Lankan budgets.' ],
        6 => [ 'Community',     'As a Sri Lankan company, we contribute positively to local development.' ],
    ];
    foreach ( $vals as $i => [ $dt, $dd ] ) {
        $at( 'val'.$i.'_title', 'Value '.$i.': Title', $dt );
        $at( 'val'.$i.'_desc',  'Value '.$i.': Description', $dd );
    }

    // CTA section
    $at( 'cta_heading', 'CTA: Heading', 'How to Reach PrimeLink Holdings' );
    $at( 'cta_subtext', 'CTA: Sub-text', 'All enquiries are handled promptly via email, telephone, and WhatsApp. Use our enquiry form to describe your project and we will respond with a tailored solution.' );

    // ── Services Page ─────────────────────────────────────────
    $wp_customize->add_section( 'primelink_services', [
        'title'       => 'Services Page',
        'priority'    => 102,
        'capability'  => 'edit_theme_options',
        'description' => 'Edit all content on the Services page.',
    ] );

    $st = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_sv_' . $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( 'pl_sv_' . $key, [ 'label' => $lbl, 'section' => 'primelink_services', 'type' => 'text' ] );
    };
    $si = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_sv_' . $key, [ 'default' => $def, 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pl_sv_' . $key, [ 'label' => $lbl, 'section' => 'primelink_services' ] ) );
    };

    // Banner
    $st( 'banner_badge',   'Banner: Badge Text',  'What We Offer' );
    $st( 'banner_heading', 'Banner: Heading',      'Our Services' );
    $st( 'banner_subtext', 'Banner: Sub-text',     'Professional engineering, GIS, software, and IT services for businesses and individuals across Sri Lanka.' );

    // Engineering section
    $st( 'eng_heading', 'Engineering: Section Heading', 'Engineering & Geotechnical Services' );
    $st( 'eng_intro',   'Engineering: Intro Paragraph', 'Professional geotechnical, construction, and engineering services delivered with technical precision and industry-standard methodologies.' );
    $st( 'eng_price',   'Engineering: Starting Price',  'LKR 100,000' );
    $si( 'eng_image',   'Engineering: Photo (Upload)',   'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=700&q=75&auto=format&fit=crop' );
    // Engineering checklist items (9)
    $eng_items = [
        'Geotechnical Investigations & SPT', 'Borehole Drilling (Soil & Rock)',
        'Core Logging & Engineering Reports', 'Landslide Mitigation Works',
        'Retaining Wall Design', 'Earth Reinforcement Systems',
        'Foundation Engineering', 'Site Re-evaluation (Gov-Rejected)', 'Construction Consultancy',
    ];
    for ( $i = 1; $i <= 9; $i++ ) {
        $st( 'eng_item'.$i, 'Engineering: Item '.$i, $eng_items[ $i - 1 ] );
    }

    // GIS & AutoCAD section
    $st( 'gis_heading', 'GIS: Section Heading',   'GIS, Mapping & AutoCAD Services' );
    $st( 'gis_intro',   'GIS: Intro Paragraph',   'GIS mapping, spatial analysis, and AutoCAD drafting services for engineering firms, universities, researchers, and businesses across Sri Lanka.' );
    $st( 'gis_price',   'GIS: Starting Price',     'LKR 100,000' );
    $si( 'gis_image',   'GIS: Photo (Upload)',      'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=700&q=75&auto=format&fit=crop' );
    // GIS checklist items (10)
    $gis_items = [
        'ArcGIS Project Support', 'QGIS Project Support', 'Spatial Analysis', 'Terrain Modelling',
        'Highway Engineering GIS', 'Infrastructure GIS Studies', 'AutoCAD Engineering Drafting',
        'Housing & Building Plans', 'Structural Concept Drawings', 'Site Layout Plans',
    ];
    for ( $i = 1; $i <= 10; $i++ ) {
        $st( 'gis_item'.$i, 'GIS: Item '.$i, $gis_items[ $i - 1 ] );
    }

    // Software & IT section
    $st( 'sw_heading', 'Software: Section Heading', 'Software Development & IT Services' );
    $st( 'sw_intro',   'Software: Intro Paragraph', 'Custom software, database solutions, and complete IT services for small and medium businesses across Sri Lanka.' );
    $st( 'sw_price',   'Software: Starting Price',  'LKR 45,000' );
    $si( 'sw_image',   'Software: Photo (Upload)',   'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=700&q=75&auto=format&fit=crop' );
    // Software checklist items (8)
    $sw_items = [
        'Database Development', 'Custom Business Software', 'Retail Cashier Systems',
        'Restaurant Management Systems', 'Barcode & Inventory Systems',
        'Small Business Solutions', 'Technical Support', 'Software Installation',
    ];
    for ( $i = 1; $i <= 8; $i++ ) {
        $st( 'sw_item'.$i, 'Software: Item '.$i, $sw_items[ $i - 1 ] );
    }

    // Pricing cards (3)
    $st( 'price_db_label',  'Pricing Card 1: Label',    'Database Solutions' );
    $st( 'price_db_price',  'Pricing Card 1: Price',    '45,000' );
    $st( 'price_db_desc',   'Pricing Card 1: Desc',     'Starting price per project' );
    $st( 'price_biz_label', 'Pricing Card 2: Label',    'Business Software' );
    $st( 'price_biz_price', 'Pricing Card 2: Price',    '50,000' );
    $st( 'price_biz_desc',  'Pricing Card 2: Desc',     'Per system, per project' );
    $st( 'price_eng_label', 'Pricing Card 3: Label',    'Engineering & GIS' );
    $st( 'price_eng_price', 'Pricing Card 3: Price',    '100,000' );
    $st( 'price_eng_desc',  'Pricing Card 3: Desc',     'Starting price per project' );

    // ── Engineering Solutions Page ────────────────────────────
    $wp_customize->add_section( 'primelink_engineering', [
        'title'       => 'Engineering Solutions Page',
        'priority'    => 103,
        'capability'  => 'edit_theme_options',
        'description' => 'Edit all content on the Engineering Solutions page.',
    ] );

    $et = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_en_' . $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( 'pl_en_' . $key, [ 'label' => $lbl, 'section' => 'primelink_engineering', 'type' => 'text' ] );
    };
    $ei = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_en_' . $key, [ 'default' => $def, 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pl_en_' . $key, [ 'label' => $lbl, 'section' => 'primelink_engineering' ] ) );
    };

    // Banner
    $et( 'banner_badge',   'Banner: Badge Text',  'Engineering' );
    $et( 'banner_heading', 'Banner: Heading',      'Engineering Solutions' );
    $et( 'banner_subtext', 'Banner: Sub-text',     'Professional geotechnical investigations, landslide mitigation, GIS mapping, and AutoCAD design services for Sri Lankan projects.' );

    // Geotechnical section
    $et( 'geo_heading', 'Geotechnical: Heading',        'Geotechnical Engineering' );
    $et( 'geo_intro',   'Geotechnical: Intro',          'We carry out comprehensive geotechnical site investigations for construction, housing, infrastructure, and research projects. Our investigations provide the ground data needed to make informed foundation and design decisions.' );
    $et( 'geo_pricing', 'Geotechnical: Pricing Note',   'Starting from LKR 100,000. Larger investigations range up to LKR 500,000+ depending on number of boreholes and depth required.' );
    $ei( 'geo_image',   'Geotechnical: Photo (Upload)', 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=700&q=75&auto=format&fit=crop' );
    $geo_items = [ 'Soil Investigation & Sampling','Standard Penetration Test (SPT)','Borehole Drilling Through Soil','Rock Core Drilling & Core Logging','Field & Laboratory Testing','Geotechnical Engineering Reports','Foundation Depth Recommendations','Bearing Capacity Analysis' ];
    for ( $i = 1; $i <= 8; $i++ ) {
        $et( 'geo_item'.$i, 'Geotechnical: Item '.$i, $geo_items[ $i - 1 ] );
    }

    // Landslide section
    $et( 'ls_heading', 'Landslide: Heading', 'Landslide Mitigation & Slope Engineering' );
    $et( 'ls_intro',   'Landslide: Intro',   "Sri Lanka's hilly terrain presents unique challenges for construction and infrastructure. PrimeLink specialises in evaluating unstable slopes, designing mitigation measures, and providing engineering solutions for sites previously rejected due to slope instability." );
    $ei( 'ls_image',   'Landslide: Photo (Upload)', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=700&q=75&auto=format&fit=crop' );
    $ls_items = [ 'Landslide Mitigation Works','Retaining Wall Design','Slope Stabilisation Solutions','Earth Reinforcement Systems','Gov-Rejected Site Re-evaluation','Site Stability Assessments','Slope Stability Analysis (GeoStudio)','PLAXIS Modelling','Factor of Safety Calculations','Foundation Recommendations' ];
    for ( $i = 1; $i <= 10; $i++ ) {
        $et( 'ls_item'.$i, 'Landslide: Item '.$i, $ls_items[ $i - 1 ] );
    }

    // GIS section
    $et( 'gis_heading', 'GIS: Heading', 'GIS & Mapping Solutions' );
    $et( 'gis_intro',   'GIS: Intro',   'We provide GIS mapping and spatial analysis for engineering companies, government agencies, universities, and individual researchers. Our GIS team works with ArcGIS and QGIS to deliver accurate, professionally produced spatial outputs.' );
    $et( 'gis_warning', 'GIS: Integrity Notice', 'PrimeLink only accepts legitimate project work. GIS support is available for genuine research, industry projects, and approved academic work.' );
    $ei( 'gis_image',   'GIS: Photo (Upload)', 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=700&q=75&auto=format&fit=crop' );
    $gis_caps = [ 'ArcGIS Projects','QGIS Projects','Spatial Analysis','Terrain Modelling','Highway Engineering GIS','Infrastructure Studies','University Research Support','Government Projects' ];
    for ( $i = 1; $i <= 8; $i++ ) {
        $et( 'gis_cap'.$i, 'GIS: Capability '.$i, $gis_caps[ $i - 1 ] );
    }

    // AutoCAD section
    $et( 'autocad_heading', 'AutoCAD: Section Heading', 'AutoCAD & Engineering Design' );
    $autocad_cards = [
        [ 'AutoCAD Drafting',    'Precise engineering drawings and technical drafting to professional standards.' ],
        [ 'Housing Plans',       'Residential housing layout plans, floor plans, and elevation drawings for permit submission.' ],
        [ 'Building Layouts',    'Architectural and structural layout plans for commercial and residential projects.' ],
        [ 'Structural Concepts', 'Conceptual structural designs and sketches for review and planning purposes.' ],
        [ 'Site Plans',          'Site layout plans including boundaries, setbacks, and infrastructure locations.' ],
        [ 'Large Scale Projects','Drafting support for larger engineering and infrastructure development projects.' ],
    ];
    for ( $i = 1; $i <= 6; $i++ ) {
        $et( 'autocad_card'.$i.'_title', 'AutoCAD Card '.$i.' Title', $autocad_cards[ $i - 1 ][0] );
        $et( 'autocad_card'.$i.'_desc',  'AutoCAD Card '.$i.' Desc',  $autocad_cards[ $i - 1 ][1] );
    }

    // Projects section
    $et( 'projects_subtitle', 'Projects: Subtitle', 'A selection of representative projects by our engineering team. Images are illustrative and will be updated with actual project photographs.' );

    // CTA / Enquiry form
    $et( 'cta_heading', 'CTA: Heading',  'Discuss Your Engineering Project' );
    $et( 'cta_subtext', 'CTA: Sub-text', 'Contact our engineering team for project quotes on geotechnical, GIS, AutoCAD, and construction consultancy services.' );

    // ── Outlets Page ──────────────────────────────────────────
    $wp_customize->add_section( 'primelink_outlets', [
        'title'       => 'Outlets Page',
        'priority'    => 104,
        'capability'  => 'edit_theme_options',
        'description' => 'Edit all content on the Outlets page.',
    ] );

    $ot = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_ot_' . $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( 'pl_ot_' . $key, [ 'label' => $lbl, 'section' => 'primelink_outlets', 'type' => 'text' ] );
    };
    $oi = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_ot_' . $key, [ 'default' => $def, 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pl_ot_' . $key, [ 'label' => $lbl, 'section' => 'primelink_outlets' ] ) );
    };

    // Banner
    $ot( 'banner_badge',   'Banner: Badge Text',  'Find Us' );
    $ot( 'banner_heading', 'Banner: Heading',      'Our Outlets' );
    $ot( 'banner_subtext', 'Banner: Sub-text',     'Visit our main office and retail outlet in Gampaha for IT products, engineering service enquiries, and technical support.' );

    // Main outlet info
    $ot( 'outlet_name',    'Outlet: Name',          'PrimeLink Holdings – Gampaha' );
    $ot( 'outlet_address', 'Outlet: Address',       '54A, Sanasa Ideal Shopping Complex, Colombo Road, Gampaha 10019, Sri Lanka' );
    $ot( 'outlet_phone',   'Outlet: Phone',         '+94 775 860 868' );
    $ot( 'outlet_email',   'Outlet: Email',         'info@primelink.com.lk' );
    $ot( 'outlet_intro',   'Outlet: Intro Paragraph', 'Our main office serves as both our operational headquarters and retail outlet. Visit us for computer products, IT accessories, engineering service enquiries, and software consultations.' );
    $oi( 'outlet_image',   'Outlet: Photo (Upload)', 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&q=75&auto=format&fit=crop' );

    // Products available (10 tags)
    $prod_defaults = [ 'Laptops','Desktop PCs','Computer Accessories','Networking Equipment','SSDs & RAM','USB Drives','Keyboards & Mice','Monitors','Laptop Bags','Chargers & Cables' ];
    for ( $i = 1; $i <= 10; $i++ ) {
        $ot( 'product'.$i, 'Available Product '.$i, $prod_defaults[ $i - 1 ] );
    }

    // Business hours
    $ot( 'hours_weekday', 'Hours: Mon-Fri', '8:30 AM - 5:30 PM' );
    $ot( 'hours_sat',     'Hours: Saturday', '9:00 AM - 2:00 PM' );

    // Expansion section
    $ot( 'expansion_heading',   'Expansion: Section Heading', 'Future Outlet Expansion' );
    $ot( 'expansion_intro',     'Expansion: Intro Paragraph', 'PrimeLink Holdings plans to expand its retail presence to additional districts across Sri Lanka. More outlets are coming soon to better serve our growing client base island-wide.' );
    $ot( 'expansion_notice',    'Expansion: Notice Text',     'While physical outlets are limited to Gampaha currently, all our engineering and software services are available island-wide. We visit project sites throughout Sri Lanka.' );

    // Planned districts (10)
    $district_defaults = [ 'Colombo','Kandy','Kurunegala','Negombo','Kalutara','Ratnapura','Kegalle','Matara','Anuradhapura','Galle' ];
    for ( $i = 1; $i <= 10; $i++ ) {
        $ot( 'district'.$i, 'Planned District '.$i, $district_defaults[ $i - 1 ] );
    }

    // Map
    $ot( 'map_url', 'Google Maps Embed src URL', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9!2d80.00222!3d7.08643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f8b5bdb5b0ab%3A0x5d7b3f0f3f7b3f0f!2s54A%20Sanasa%20Ideal%20Shopping%20Complex%2C%20Colombo%20Rd%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1' );

    // ── IT Services Page ──────────────────────────────────────
    $wp_customize->add_section( 'primelink_it', [
        'title'       => 'IT Services Page',
        'priority'    => 105,
        'capability'  => 'edit_theme_options',
        'description' => 'Edit all content on the IT Services page.',
    ] );

    $it = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_it_' . $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( 'pl_it_' . $key, [ 'label' => $lbl, 'section' => 'primelink_it', 'type' => 'text' ] );
    };

    // Banner
    $it( 'banner_badge',   'Banner: Badge Text',  'Technology' );
    $it( 'banner_heading', 'Banner: Heading',      'IT Services & Products' );
    $it( 'banner_subtext', 'Banner: Sub-text',     'Custom software development, business systems, laptops, hardware, and technical support for Sri Lankan businesses.' );

    // Software section
    $it( 'sw_heading',  'Software: Section Heading',   'Software Solutions for Sri Lankan Businesses' );
    $it( 'sw_subtitle', 'Software: Sub-text',           'Custom-built software systems designed specifically for small and medium businesses in Sri Lanka. Cost-effective, reliable, and easy to use.' );

    // Software cards (6)
    $sw_card_def = [
        1 => [ 'Retail Cashier Software',          'LKR 50,000',   'Complete point-of-sale system for retail shops. Handles sales, receipts, daily reports, and user management.' ],
        2 => [ 'Restaurant Management System',     'LKR 50,000',   'Table management, order tracking, kitchen display, and billing system for restaurants and cafes.' ],
        3 => [ 'Barcode & Inventory System',        'LKR 75,000',   'Full inventory management with barcode scanning, stock tracking, purchase orders, and reporting.' ],
        4 => [ 'Database Development',              'LKR 45,000',   'Custom database design and setup for businesses needing secure, structured data management solutions.' ],
        5 => [ 'Custom Business Software',          'LKR 100,000+', 'Fully customized business applications built to your exact workflow and business process requirements.' ],
        6 => [ 'Technical Support & Maintenance',   'Contact Us',   'Ongoing technical support, software maintenance, updates, and IT troubleshooting for businesses.' ],
    ];
    foreach ( $sw_card_def as $i => [ $dt, $dp, $dd ] ) {
        $it( 'sw'.$i.'_title', 'Software Card '.$i.' Title', $dt );
        $it( 'sw'.$i.'_price', 'Software Card '.$i.' Price', $dp );
        $it( 'sw'.$i.'_desc',  'Software Card '.$i.' Desc',  $dd );
    }

    // Laptops section
    $it( 'laptop_heading',  'Laptops: Section Heading', 'Laptops & Computers' );
    $it( 'laptop_subtitle', 'Laptops: Sub-text',         'A selection of laptops available at our Gampaha outlet. Contact us for current stock and pricing.' );

    // Hardware section
    $it( 'hw_heading', 'Hardware: Section Heading', 'Hardware & Accessories' );

    // Repair/Support section
    $it( 'repair_heading', 'Repair: Section Heading', 'Computer Repair & Technical Support' );

    // CTA form
    $it( 'cta_heading', 'CTA: Heading',  'Send Your IT Enquiry' );
    $it( 'cta_subtext', 'CTA: Sub-text', 'For software, hardware, or technical support enquiries. We respond within 24 hours on business days.' );
    $it( 'map_url',     'Google Maps Embed src URL', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9!2d80.00222!3d7.08643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f8b5bdb5b0ab%3A0x5d7b3f0f3f7b3f0f!2s54A%20Sanasa%20Ideal%20Shopping%20Complex%2C%20Colombo%20Rd%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1' );

    // ── Contact Page ──────────────────────────────────────────
    $wp_customize->add_section( 'primelink_contact_page', [
        'title'       => 'Contact Page',
        'priority'    => 106,
        'capability'  => 'edit_theme_options',
        'description' => 'Edit all content on the Contact page.',
    ] );

    $cp = function( $key, $lbl, $def ) use ( $wp_customize ) {
        $wp_customize->add_setting( 'pl_cp_' . $key, [ 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( 'pl_cp_' . $key, [ 'label' => $lbl, 'section' => 'primelink_contact_page', 'type' => 'text' ] );
    };

    $cp( 'banner_badge',   'Banner: Badge Text',  'Get In Touch' );
    $cp( 'banner_heading', 'Banner: Heading',      'Contact PrimeLink Holdings' );
    $cp( 'banner_subtext', 'Banner: Sub-text',     'Have a project enquiry, need a quotation, or want to discuss a service? Our team is ready to assist.' );
    $cp( 'form_heading',   'Form: Heading',         'Send Us a Message' );
    $cp( 'form_subtitle',  'Form: Sub-text',        'Use this form for project enquiries, quotation requests, or general questions. We respond within 24 hours on business days.' );
    $cp( 'map_url',        'Google Maps Embed src URL', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9!2d80.00222!3d7.08643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f8b5bdb5b0ab%3A0x5d7b3f0f3f7b3f0f!2s54A%20Sanasa%20Ideal%20Shopping%20Complex%2C%20Colombo%20Rd%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1' );
}
add_action( 'customize_register', 'primelink_customizer' );

function pl_site( $key ) {
    $d = [
        'company_name'  => 'Ceylon PrimeLink Holdings (Pvt) Ltd',
        'address_short' => '54A Sanasa Complex, Colombo Rd, Gampaha',
        'address_full'  => '54A, Sanasa Ideal Shopping Complex, Colombo Road, Gampaha 10019, Sri Lanka',
        'phone'         => '+94 775 860 868',
        'phone_raw'     => '+94775860868',
        'whatsapp'      => '94775860868',
        'email'         => 'info@primelink.com.lk',
        'hours_weekday' => '8:30 AM - 5:30 PM',
        'hours_sat'     => '9:00 AM - 2:00 PM',
        'footer_desc'   => 'A Sri Lankan multi-sector company delivering engineering, geotechnical, GIS, construction, software, and IT solutions.',
    ];
    return get_theme_mod( 'primelink_' . $key, $d[ $key ] ?? '' );
}

function pl_home( $key, $default = '' ) {
    return get_theme_mod( 'pl_hp_' . $key, $default );
}

function pl_about( $key, $default = '' ) {
    return get_theme_mod( 'pl_au_' . $key, $default );
}

function pl_services( $key, $default = '' ) {
    return get_theme_mod( 'pl_sv_' . $key, $default );
}

function pl_eng( $key, $default = '' ) {
    return get_theme_mod( 'pl_en_' . $key, $default );
}

function pl_outlets( $key, $default = '' ) {
    return get_theme_mod( 'pl_ot_' . $key, $default );
}

function pl_it( $key, $default = '' ) {
    return get_theme_mod( 'pl_it_' . $key, $default );
}

function pl_contact_page( $key, $default = '' ) {
    return get_theme_mod( 'pl_cp_' . $key, $default );
}
