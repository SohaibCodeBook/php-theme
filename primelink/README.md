# PrimeLink Corporate – WordPress Theme v2.0.0

## Installation

1. Upload the entire `primelink` folder to `/wp-content/themes/` on your server.
2. Log into WordPress admin → **Appearance → Themes → Activate PrimeLink Corporate**.
3. The setup wizard runs automatically on activation. It creates all pages, assigns templates, registers the navigation menu, and sets the static front page. No manual page creation is needed.

## After Activation

### Logo
Go to **Appearance → Customize → Site Identity → Logo** to upload your actual logo.  
The fallback icon + wordmark is used when no logo is set.

### Social Media Links
Go to **Appearance → Customize → Social Media Links** to set:
- Facebook Page URL
- LinkedIn Page URL

WhatsApp and Email links are hardcoded from the contact details in `footer.php`.  
The Facebook and LinkedIn icons only appear in the footer once a URL is entered — they are hidden when blank to avoid dead links.

### Google Maps
All map embeds point to the precise coordinates for 54A Sanasa Ideal Shopping Complex, Colombo Road, Gampaha. To use an exact Google Maps embed for the office:
1. Open Google Maps and search for the office address.
2. Click **Share → Embed a map → Copy HTML**.
3. Replace the `<iframe>` `src` attribute in `page-contact.php`, `page-engineering-solutions.php`, `page-it-services.php`, and `page-outlets.php`.

### Images
All images are currently Unsplash placeholders. Replace with actual PrimeLink project photos:
- Upload images via **Media → Add New**
- Replace the `src` URLs in each template file with `wp_get_attachment_image_url()` calls, or use the WordPress editor on a customized version of the templates.

## Template Files

| File | Purpose |
|---|---|
| `front-page.php` | Homepage — hero, stats, about, services, why-us, quote form, testimonials |
| `page-about-us.php` | Company story, mission/vision, expertise, core values |
| `page-services.php` | Engineering, GIS, and software service overview with pricing |
| `page-engineering-solutions.php` | Geotechnical, landslide, GIS, AutoCAD deep-dive + project portfolio |
| `page-it-services.php` | Software solutions, laptop catalog, hardware, repair services |
| `page-outlets.php` | Gampaha office details, hours, expansion plans, map |
| `page-contact.php` | Contact form, info card, map |
| `page.php` | Generic fallback for any page without an assigned template |
| `single.php` | Individual blog post / news article template |
| `search.php` | Search results page |
| `404.php` | Page not found error page |
| `index.php` | Blog/archive fallback with redirect guard |
| `header.php` | Fixed navbar (uses WordPress menu system), mobile drawer, skip link |
| `footer.php` | Contact strip, 4-column footer, social links, scroll-to-top |
| `functions.php` | Assets, AJAX handler, nav walkers, customizer, body classes |
| `inc/setup-wizard.php` | Auto-creates all pages, builds nav menu, sets front page on activation |

## Stats (Single Source of Truth)
Company-wide stats (200+ Projects, 150+ Clients, etc.) are defined **once** at the top of `front-page.php` in the `$pl_stats` array. Update them there and both the hero section and the stats strip update automatically.

## Contact Forms
All forms submit via WordPress AJAX to `info@primelink.com.lk`.  
The nonce is passed via `wp_localize_script` as `PrimeLink.nonce` — no hidden nonce field in the form HTML is needed.  
Ensure your hosting has outgoing mail configured. Install **WP Mail SMTP** if emails are not being delivered.

## Performance Notes
- All images use `loading="lazy"` except the hero image (`loading="eager"`).
- JavaScript is loaded in the footer (no render-blocking).
- No jQuery — pure vanilla JS.
- Google Fonts loaded with `display=swap`.
- Counter animations use `IntersectionObserver` — only trigger when in viewport.

## Recommended Plugins
- **WP Mail SMTP** — ensures contact form emails are delivered reliably
- **Yoast SEO** or **Rank Math** — SEO meta tags and sitemaps
- **Smush** or **ShortPixel** — image compression once real photos are uploaded
- **LiteSpeed Cache** or **W3 Total Cache** — page caching

## Screenshot
Generate `screenshot.png` for the WordPress theme selector:
1. Open `screenshot.svg` in a browser.
2. Screenshot at 1200×900px.
3. Save as `screenshot.png` in the theme root.

---

**Ceylon PrimeLink Holdings (Pvt) Ltd**  
54A, Sanasa Ideal Shopping Complex, Colombo Road, Gampaha 10019, Sri Lanka  
info@primelink.com.lk | +94 775 860 868
