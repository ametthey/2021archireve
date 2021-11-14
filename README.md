#======= THIS IS THE README TO USE THIS THEME ========

1. change url of .local project in gulpfile (line 57)
2. change text of same name in package.json

#======= INSTALLED DEPENDENCIES ========

lazysizes

#======= VENDORS IN SCSS ========

normalize.scss
reset.scss
wordpresss-core.scss

#======= STRUCTURE OF THE DIFFERENT FOLDER & FILES  ========

#### index.php
includes:
-> content-post.php

#### home.php

includes:
-> content-post.php

#### single.php

includes:
-> content-audio.php
-> content-gallery.php
-> content-quote.php
-> content-video.php

#### singular.php

includes:
-> content-page.php


#======= Differents types of Template Tags =======

https://developer.wordpress.org/themes/references/list-of-template-tags/


1. Include tags
2. General tags
 1_ Include tags

 2_ Login tags
    wp_loginout()
    wp_logout_url()
    wp_login_url()
    wp_login_form()
    wp_lostpassword_url()
    wp_register()
    is_user_logged_in()

 3_ bloginfo()

 4_ Archive tags
    single_post_title() // can be use outside the loop
    post_type_archive_title() // for custom post type
    single_cat_title()
    single_tag_title()
    single_term_title()
    single_month_title()
    get_archive_link()
    wp_get_archives()
 5_ Calendar tags
 6_ Misc General tags

3. Navigation tags
    wp_nav_menu();

4_. Post tags
 1_ Date Tags
    https://wordpress.org/support/article/formatting-date-and-time/
    the_date();
    the_modified_date();
    the_time();
    the_modified_time();

 2_ Attachment Tags
   is_attachment();
   wp_attachment_is_image();
   wp_get_attachment_image();
   wp_get_attachment_image_src();
   wp_get_attachment_metadata();


 3_ Less Common Tags
   the_title_attribute();
   the_shortlink();
   wp_get_shortlink();
   the_meta();
   get_post_meta();
   the_permalink();
   get_the_permalink();

 4_ get_ Tags

5. Post Thumbnail tags
 has_post_thumbnail();
 the_post_thumbnail();
 get_the_post_thumbnail();
 get_post_thumbnail_id();


6. Link tags
 the_permalink();
 get_permalink()
 get_post_permalink()
 get_page_link()
 get_attachment_link()
 edit_post_link()
 get_edit_post_link()
 get_delete_post_link()
 edit_comment_link()
 edit_tag_link()

 home_url()
 site_url()
 get_home_url()
 get_site_url()
 get_admin_url()
 get_search_link()
 get_search_query()
 the_feed_link()


7. Comment tags
    comments_template() // loads comment.php (copy this from a default wordpress theme as twentytwenty)
    comments.php - Template for comment code
    get_comments_number() - Total number of comments
    wp_list_comments() - List comments
    comment_form() - Display the comment form

    comment_class()
    comment_author()
    comment_author_link()
    comment_date()/ _time()
    comment_text()
    comment_ID()
    get_avatar()
    comment_author_email()
    comments_link()
    comment_reply_link()
    paginate_comments_links()
    comments_open()

8. Author tags
    the_author()
    the_author_link()
    the_author_posts_link()
    the_author_meta()
        ID
        user_login
        user_pass
        user_nicename
        user_email
        user_url
        display_name
        nickname
        first_name
        last_name
        description
        user_level

    get_the_author_meta()
    get_avatar_url()
    get_edit_user_link()
    wp_list_authors()
    wp_dropdown_users()

9. Category tags
10. Bookmark tags
11. Conditional Tags
    https://developer.wordpress.org/themes/basics/conditional-tags/
    is_front_page()
    is_home()
    is_single()
    is_singular()
    get_post_type()
    has_excerpt()
    is_page()
    is_page_template()
    comments_open()
    is_category()
    is_tag()
    is_archive()
    is_user_logged_in()
    current_user_can()
        https://developer.wordpress.org/plugins/users/roles-and-capabilities/
    in_the_loop()

12. Sanitization, Escaping & Localization
    Sanitization is the process of cleaning or filtering your input data
    -> from the user to the database
    Escaping is the process of securing output by stripping out unwanted data
    -> cleaning data from the database to the user
    Localization is the process of translating text based on user language or local

    Sanitization
        sanitize_text_field()
        sanitize_title()
        sanitize_email()
        sanitize_email()
        sanitize_html_class()
        esc_url_raw()
        sanitize_user()
        sanitize_option()
        sanitize_meta()

    Escaping
        esc_html()
        esc_url()
        esc_js()
        esc_attr()
        esc_textarea()

    Localization
        https://developer.wordpress.org/apis/handbook/internationalization/localization/
        esc_html_e()
        esc_html__()
        esc_attr_e()
        _e()
        __()


#======= Differents types of Hooks =======

**Action Hooks**
- When a certain WordPress lifecycle event occurs
- Run your code

- do_action() _create an action hook_
- add_action() _Hook in code_
- remove_action() _Unhook in code_

**Filter Hooks**
- Get WordPress data
- Modify the data
- Return the modified data
Hooks are a way for us to add our own code to customize default Wordpress behavior
Filter hooks let us get data from WordPress, modify it and return it back customized.

**Wordpress Action Runtime Lifecycle**
2. Admin Area Life Cycle
1. Common Frond End Life Cycle

list and all hooks & lifecycle
https://codex.wordpress.org/Plugin_API/Action_Reference

global hook functions
$wp_actions (trigger on page load)
$wp_filter (see what is hooked with $wp_actions)
$wp_filter[ 'action_name' ];

### Debug Hooks with R_Debug
**R_Debug::list_hooks();**

**to show certain hooks***
R_Debug::list_hooks("content");
R_Debug::list_live_hooks();

https://codex.wordpress.org/Plugin_API/Filter_Reference
