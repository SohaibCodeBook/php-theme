<?php
get_header();
$pid = get_the_ID();

/* ── Stats — read from Customizer (Homepage Settings) ───── */
$pl_stats = [
    [ 'num' => pl_home('stat1_num','200'),  'suffix' => pl_home('stat1_suffix','+'),  'label_hero' => pl_home('stat1_label_hero','Projects'),  'label_strip' => pl_home('stat1_label_strip','Projects Completed') ],
    [ 'num' => pl_home('stat2_num','150'),  'suffix' => pl_home('stat2_suffix','+'),  'label_hero' => pl_home('stat2_label_hero','Clients'),   'label_strip' => pl_home('stat2_label_strip','Satisfied Clients')  ],
    [ 'num' => pl_home('stat3_num','6'),    'suffix' => pl_home('stat3_suffix',''),   'label_hero' => pl_home('stat3_label_hero','Sectors'),   'label_strip' => pl_home('stat3_label_strip','Service Sectors')    ],
    [ 'num' => pl_home('stat4_num','10'),   'suffix' => pl_home('stat4_suffix','+'),  'label_hero' => pl_home('stat4_label_hero','Yrs Exp.'),  'label_strip' => pl_home('stat4_label_strip','Years Experience')   ],
];

/* ── Hero fields ─────────────────────────────────────────── */
$hero_eyebrow   = pl_home('hero_eyebrow',  'Sri Lankan Engineering & Technology');
$hero_line1     = pl_home('hero_line1',    'Connecting');
$hero_line2     = pl_home('hero_line2',    'Industries.');
$hero_line3     = pl_home('hero_line3',    'Unlocking Opportunities.');
$hero_lead      = pl_home('hero_lead',     'Ceylon PrimeLink Holdings provides trusted solutions in geotechnical engineering, GIS mapping, AutoCAD design, construction, software development, and IT products across Sri Lanka.');
$hero_btn1_text = pl_home('hero_btn1_text','Request a Quotation');
$hero_btn1_url  = pl_home('hero_btn1_url', home_url('/contact'));
$hero_btn2_text = pl_home('hero_btn2_text','Learn More');
$hero_btn2_url  = pl_home('hero_btn2_url', home_url('/about-us'));
$hero_img       = pl_home('hero_image',    'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=75&auto=format&fit=crop');
$hero_img_alt   = pl_home('hero_image_alt','Engineering site investigation in Sri Lanka');
$float1_label   = pl_home('float1_label',  '200+ Projects');
$float1_sub     = pl_home('float1_sub',    'Projects Done');
$float2_label   = pl_home('float2_label',  '10+ Years');
$float2_sub     = pl_home('float2_sub',    'Trusted Service');

/* ── About fields ────────────────────────────────────────── */
$about_badge   = pl_home('about_badge',   'Who We Are');
$about_heading = pl_home('about_heading', 'A Trusted Multi-Sector Company in Sri Lanka');
$about_text    = pl_home('about_text',    'Ceylon PrimeLink Holdings is a Sri Lankan company delivering practical engineering knowledge and modern technology solutions. We bridge geotechnical engineering, GIS, AutoCAD, construction, software development, and IT retail under one professional team.');
$about_est     = pl_home('about_est',     '2014');
$about_img     = pl_home('about_image',   'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=700&q=75&auto=format&fit=crop');
$about_img_alt = 'PrimeLink engineering team at a site investigation in Sri Lanka';

/* ── Service cards — icon & color fixed, text from Customizer */
$svc_icons = ['fa-mountain','fa-shield-halved','fa-map','fa-drafting-compass','fa-code','fa-laptop','fa-hammer','fa-house-chimney','fa-database','fa-chart-line','fa-file-contract','fa-store'];
$svc_colors= ['blue','amber','cyan','purple','green','blue','amber','pink','purple','green','cyan','pink'];
$svc_links = ['/engineering-solutions','/engineering-solutions','/engineering-solutions','/engineering-solutions','/it-services','/it-services','/services','/services','/it-services','/engineering-solutions','/engineering-solutions','/outlets'];
$svc_title_d = ['Engineering Solutions','Landslide Mitigation','GIS & Mapping','AutoCAD Design','Software Development','IT Products & Support','Construction Services','Housing Design','Database Solutions','Slope Stability Analysis','Geotechnical Reports','Retail Outlets'];
$svc_desc_d  = [
    'Geotechnical investigations, borehole drilling, SPT testing, and engineering reports.',
    'Slope stability analysis, retaining wall design, and government-rejected site re-evaluation.',
    'ArcGIS and QGIS project support, spatial analysis, and terrain modelling.',
    'Professional engineering drafting, housing plans, and structural concept designs.',
    'Custom business software, cashier systems, and database applications from LKR 45,000.',
    'Laptops, computers, accessories, networking equipment, and technical support.',
    'Construction consultancy, earth reinforcement, and infrastructure solutions.',
    'Residential and commercial housing plan designs and engineering feasibility studies.',
    'Small business databases and data management systems from LKR 45,000.',
    'GeoStudio and PLAXIS modelling and engineering analysis.',
    'Professional site investigation reports, borehole logs, and engineering documentation.',
    'Computer products, laptops, IT accessories at our Gampaha office and retail outlet.',
];
$services = [];
for ( $i = 0; $i < 12; $i++ ) {
    $n = $i + 1;
    $services[] = [
        'icon'  => $svc_icons[$i],
        'color' => $svc_colors[$i],
        'title' => pl_home('svc'.$n.'_title', $svc_title_d[$i]),
        'desc'  => pl_home('svc'.$n.'_desc',  $svc_desc_d[$i]),
        'link'  => home_url($svc_links[$i]),
    ];
}

/* ── Why Choose Us cards — icon fixed, text from Customizer ─ */
$why_icons   = ['fa-user-tie','fa-shield-halved','fa-laptop-code','fa-tag','fa-headset','fa-flag','fa-sliders','fa-graduation-cap'];
$why_title_d = ['Professional Engineering Experience','Reliable Technical Solutions','Modern Software Expertise','Affordable Pricing','Responsive Customer Service','Sri Lankan Based Company','Customized Solutions','University & Research Support'];
$why_desc_d  = [
    'Hands-on geotechnical, construction, and GIS project experience across Sri Lanka.',
    'Technically sound, well-documented solutions that meet industry standards.',
    'From custom business software to GIS analysis tools — full digital solutions.',
    'Competitive and transparent pricing tailored for Sri Lankan businesses.',
    'Quick responses via phone, email, and WhatsApp. We stay in contact throughout.',
    'We understand local terrain, regulations, and business needs. Based in Gampaha.',
    'No two projects are the same. Every solution is tailored to your requirements.',
    'GIS and engineering analysis support for undergrad and postgraduate projects.',
];
$reasons = [];
for ( $i = 0; $i < 8; $i++ ) {
    $n = $i + 1;
    $reasons[] = [
        'icon'  => $why_icons[$i],
        'title' => pl_home('why'.$n.'_title', $why_title_d[$i]),
        'desc'  => pl_home('why'.$n.'_desc',  $why_desc_d[$i]),
    ];
}
?>

<!-- HERO -->
<section class="pl-hero" aria-label="<?php esc_attr_e('Welcome to PrimeLink Holdings','primelink'); ?>">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container position-relative" style="z-index:2;">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <div class="pl-hero-eyebrow">
          <span class="dot" aria-hidden="true"></span>
          <?php echo esc_html($hero_eyebrow); ?>
        </div>
        <h1>
          <?php echo esc_html($hero_line1); ?><br>
          <span class="highlight"><?php echo esc_html($hero_line2); ?></span><br>
          <?php echo esc_html($hero_line3); ?>
        </h1>
        <p class="pl-hero-lead"><?php echo esc_html($hero_lead); ?></p>
        <div class="pl-hero-actions">
          <a href="<?php echo esc_url($hero_btn1_url); ?>" class="btn-pl btn-accent-pl btn-lg-pl">
            <i class="fa-solid fa-file-lines fa-sm" aria-hidden="true"></i> <?php echo esc_html($hero_btn1_text); ?>
          </a>
          <a href="<?php echo esc_url($hero_btn2_url); ?>" class="btn-pl btn-outline-pl">
            <i class="fa-solid fa-circle-play fa-sm" aria-hidden="true"></i> <?php echo esc_html($hero_btn2_text); ?>
          </a>
        </div>
        <div class="pl-hero-stats">
          <?php foreach (array_slice($pl_stats,0,3) as $stat) : ?>
          <div class="pl-hero-stat">
            <span class="pl-hero-stat-num"><?php echo esc_html($stat['num']); ?><?php if($stat['suffix']): ?><sup><?php echo esc_html($stat['suffix']); ?></sup><?php endif; ?></span>
            <span class="pl-hero-stat-label"><?php echo esc_html($stat['label_hero']); ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="col-lg-6 d-none d-lg-block">
        <div class="pl-hero-visual">
          <div class="pl-hero-card-stack">
            <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr($hero_img_alt); ?>" class="pl-hero-main-img" loading="eager" decoding="async" width="800" height="420">
            <div class="pl-hero-float-card top-left" aria-hidden="true">
              <div class="pl-hero-float-icon blue"><i class="fa-solid fa-hard-hat fa-lg" style="color:var(--pl-primary);" aria-hidden="true"></i></div>
              <div><strong><?php echo esc_html($float1_label); ?></strong><span><?php echo esc_html($float1_sub); ?></span></div>
            </div>
            <div class="pl-hero-float-card bottom-right" aria-hidden="true">
              <div class="pl-hero-float-icon amber"><i class="fa-solid fa-award fa-lg" style="color:var(--pl-accent);" aria-hidden="true"></i></div>
              <div><strong><?php echo esc_html($float2_label); ?></strong><span><?php echo esc_html($float2_sub); ?></span></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="section-lg" aria-labelledby="about-h">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <div class="pl-about-img-wrap pe-lg-3">
          <img src="<?php echo esc_url($about_img); ?>" alt="<?php echo esc_attr($about_img_alt); ?>" class="pl-about-img lazy" loading="lazy" decoding="async" width="700" height="500">
          <div class="pl-about-badge" aria-hidden="true">
            <strong><?php echo esc_html($about_est); ?></strong>
            <span><?php esc_html_e('Est. Sri Lanka','primelink'); ?></span>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="section-badge"><i class="fa-solid fa-building-columns fa-xs me-1" aria-hidden="true"></i> <?php echo esc_html($about_badge); ?></div>
        <h2 id="about-h" class="section-title"><?php echo esc_html($about_heading); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl mb-4"><?php echo esc_html($about_text); ?></p>
        <ul class="pl-check-list mb-4">
          <?php foreach ([
            ['fa-mountain','Geotechnical Engineering & Site Investigations'],
            ['fa-map','GIS & Mapping Solutions (ArcGIS / QGIS)'],
            ['fa-drafting-compass','AutoCAD Drafting & Housing Design'],
            ['fa-shield-halved','Landslide Mitigation & Slope Stability'],
            ['fa-code','Custom Software & Database Development'],
            ['fa-laptop','IT Products & Technical Support'],
          ] as [$icon,$label]) : ?>
          <li>
            <span class="check-icon"><i class="fa-solid fa-check fa-xs" aria-hidden="true"></i></span>
            <span><?php echo esc_html($label); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="btn-pl btn-primary-pl">
          <i class="fa-solid fa-arrow-right fa-sm" aria-hidden="true"></i> <?php esc_html_e('Learn More About Us','primelink'); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- CORE SERVICES -->
<section class="section-lg" style="background:var(--pl-bg);" aria-labelledby="services-h">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-grid-2 fa-xs me-1" aria-hidden="true"></i> <?php esc_html_e('What We Offer','primelink'); ?></div>
      <h2 id="services-h" class="section-title"><?php esc_html_e('Our Core Services','primelink'); ?></h2>
      <div class="section-divider center"></div>
      <p class="section-subtitle"><?php esc_html_e('From complex engineering investigations to custom software and retail IT products — solutions tailored for Sri Lankan businesses and projects.','primelink'); ?></p>
    </div>
    <div class="row g-4">
      <?php foreach ($services as $svc) : ?>
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="pl-service-card h-100">
          <div class="pl-service-icon <?php echo esc_attr($svc['color']); ?>">
            <i class="fa-solid <?php echo esc_attr($svc['icon']); ?>" aria-hidden="true"></i>
          </div>
          <h4><?php echo esc_html($svc['title']); ?></h4>
          <p><?php echo esc_html($svc['desc']); ?></p>
          <a href="<?php echo esc_url($svc['link']); ?>" class="pl-service-link">
            <?php esc_html_e('Learn more','primelink'); ?> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY CHOOSE US -->
<section class="section-lg" aria-labelledby="why-h">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-star fa-xs me-1" aria-hidden="true"></i> <?php esc_html_e('Why PrimeLink','primelink'); ?></div>
      <h2 id="why-h" class="section-title"><?php esc_html_e('Why Choose PrimeLink Holdings?','primelink'); ?></h2>
      <div class="section-divider center"></div>
    </div>
    <div class="row g-4">
      <?php foreach ($reasons as $r) : ?>
      <div class="col-lg-3 col-md-6">
        <div class="pl-why-card">
          <div class="pl-why-icon"><i class="fa-solid <?php echo esc_attr($r['icon']); ?>" aria-hidden="true"></i></div>
          <h5><?php echo esc_html($r['title']); ?></h5>
          <p><?php echo esc_html($r['desc']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- QUOTE FORM -->
<section class="pl-quote-section section-lg" aria-labelledby="quote-h">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <div class="section-badge accent"><i class="fa-solid fa-file-invoice fa-xs me-1" aria-hidden="true"></i> <?php esc_html_e('Get Started','primelink'); ?></div>
        <div class="pl-quote-info mt-3">
          <h2 id="quote-h"><?php esc_html_e('Request a Free Quotation','primelink'); ?></h2>
          <p class="lead"><?php esc_html_e('Have a project in mind? Reach out and our team will get back to you promptly.','primelink'); ?></p>
          <a href="tel:<?php echo esc_attr(pl_site('phone_raw')); ?>" class="pl-contact-pill text-decoration-none mb-2">
            <div class="pl-contact-pill-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
            <div><strong><?php echo esc_html(pl_site('phone')); ?></strong><span><?php echo esc_html(pl_site('hours_weekday')); ?></span></div>
          </a>
          <a href="mailto:<?php echo esc_attr(pl_site('email')); ?>" class="pl-contact-pill text-decoration-none mb-2">
            <div class="pl-contact-pill-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></div>
            <div><strong><?php echo esc_html(pl_site('email')); ?></strong><span><?php esc_html_e('We respond within 24 hours','primelink'); ?></span></div>
          </a>
          <a href="https://wa.me/<?php echo esc_attr(pl_site('whatsapp')); ?>" class="pl-contact-pill text-decoration-none" target="_blank" rel="noopener noreferrer">
            <div class="pl-contact-pill-icon"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></div>
            <div><strong><?php esc_html_e('WhatsApp Chat','primelink'); ?></strong><span><?php esc_html_e('Quick response guaranteed','primelink'); ?></span></div>
          </a>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="pl-form-card">
          <h3><?php esc_html_e('Send Your Request','primelink'); ?></h3>
          <p class="subtitle"><?php esc_html_e('We respond within 24 hours on business days.','primelink'); ?></p>
          <form id="quote-form" novalidate>
            <div class="row g-3">
              <div class="col-md-6"><div class="pl-form-group"><label for="qf-name"><?php esc_html_e('Full Name','primelink'); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><input type="text" id="qf-name" name="name" placeholder="<?php esc_attr_e('Your full name','primelink'); ?>" required autocomplete="name" aria-required="true"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="qf-phone"><?php esc_html_e('Phone Number','primelink'); ?></label><input type="tel" id="qf-phone" name="phone" placeholder="+94 77X XXX XXX" autocomplete="tel"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="qf-email"><?php esc_html_e('Email Address','primelink'); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><input type="email" id="qf-email" name="email" placeholder="your@email.com" required autocomplete="email" aria-required="true"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="qf-subject"><?php esc_html_e('Service Required','primelink'); ?></label>
                <select id="qf-subject" name="subject">
                  <option value=""><?php esc_html_e('Select a service…','primelink'); ?></option>
                  <?php foreach (['Geotechnical Engineering','Landslide Mitigation','GIS & Mapping','AutoCAD Design','Software Development','Database Solutions','IT Products','Construction Services','General Enquiry'] as $opt) : ?>
                  <option><?php echo esc_html($opt); ?></option>
                  <?php endforeach; ?>
                </select></div></div>
              <div class="col-12"><div class="pl-form-group"><label for="qf-message"><?php esc_html_e('Project Details','primelink'); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><textarea id="qf-message" name="message" rows="4" placeholder="<?php esc_attr_e('Briefly describe your project or requirements…','primelink'); ?>" required aria-required="true"></textarea></div></div>
            </div>
            <div id="quote-form-msg" class="form-msg" role="status" aria-live="polite"></div>
            <button type="submit" class="btn-pl btn-primary-pl w-100 justify-content-center mt-2">
              <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e('Send Request','primelink'); ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="section-lg" style="background:var(--pl-bg);" aria-labelledby="reviews-h">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-star fa-xs me-1" aria-hidden="true"></i> <?php esc_html_e('Client Reviews','primelink'); ?></div>
      <h2 id="reviews-h" class="section-title"><?php esc_html_e('What Our Clients Say','primelink'); ?></h2>
      <div class="section-divider center"></div>
    </div>
    <div class="row g-4">
      <?php foreach ([
        ['DR','Dinesh Rajapaksha',  'Property Developer, Gampaha',5,'PrimeLink provided an excellent geotechnical investigation report. The borehole drilling and SPT testing were professional and the report was very detailed.'],
        ['AP','Amali Perera',       'Civil Engineer, Kandy',       5,'They re-evaluated the slope stability and provided a proper mitigation plan. Very professional service.'],
        ['MF','Mohamed Farouk',     'Business Owner, Colombo',     5,'The cashier software works perfectly. Setup was quick and they provided good training. The price was reasonable.'],
        ['KD','Kavinda Dissanayake','Engineering Student, USJP',   4,'PrimeLink completed the ArcGIS analysis within the timeline. Good quality output.'],
        ['NB','Nilupul Bandara',    'Teacher, Gampaha',            5,'Good prices compared to Colombo stores. Staff was knowledgeable and helped me choose the right specifications.'],
        ['SW','Sushantha Wijeratne','Contractor, Kelaniya',        5,'AutoCAD drawings for our housing plan were done neatly and precisely. Communication was good throughout.'],
      ] as [$init,$name,$role,$stars,$text]) : ?>
      <div class="col-lg-4 col-md-6">
        <div class="pl-review-card h-100">
          <div class="pl-stars" aria-label="<?php echo esc_attr($stars.' out of 5 stars'); ?>"><?php echo str_repeat('★',$stars).str_repeat('☆',5-$stars); ?></div>
          <p class="pl-review-text">"<?php echo esc_html($text); ?>"</p>
          <div class="pl-reviewer">
            <div class="pl-reviewer-avatar" aria-hidden="true"><?php echo esc_html($init); ?></div>
            <div>
              <span class="pl-reviewer-name"><?php echo esc_html($name); ?></span>
              <span class="pl-reviewer-title"><?php echo esc_html($role); ?></span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
