------------------------------------------------------------------------------------------------------------
For support please visit: http://www.pixxels.at/

You will find the theme's page on: http://keiran.pixxels.at
------------------------------------------------------------------------------------------------------------



/****************
* THEME LICENSE *
****************/

Keiran is released under the GNU general public license. 
That means you can use this theme on all of your pages - for personal or commercial purposes



/***************
* INSTALLATION *
***************/

   1. Automatic Installation
      Go to WP-Admin > Appearance > Themes > Install Themes > Upload and choose the theme zip folder.

   2. Manual Installation
      Upload the theme files to your wordpress theme folder wp-content/themes and activate the theme in
      your wordpress admin panel.

To find out more about installing WordPress themes please also see the WordPress documentation.



/********************
* CHANGE THE LAYOUT *
********************/

To change this layout you have the following possibilities:

- use a custom color: click on Appearance / Keiran Options
- use a custom logo: click on Appearance / Keiran Options
- use a custom favicon: click on Appearance / Keiran Options
- use featured images


/*************
* SHORTCODES *
*************/

Boxes:
------

[white_box]White Box[/white_box]
[blue_box]Blue Box[/blue_box]
[yellow_box]Yellow Box[/yellow_box]
[orange_box]Orange Box[/orange_box]
[red_box]Red Box[/red_box]
[pink_box]Pink Box[/pink_box]
[green_box]Green Box[/green_box]
[grey_box]Grey Box[/grey_box]
[brown_box]Brown Box[/brown_box]

Highlight:
----------

[highlight]Text[\highlight]

Columns:
--------

[one_half]Content[/one_half]
[one_half_last]Content[/one_half_last]

[two_third]Content[/two_third]
[one_third_last]Content[/one_third_last]

[three_fourth]Content[/three_fourth]
[one_fourth_last]Content[/one_fourth_last]

[one_third]Content[/one_third]
[one_third]Content[/one_third]
[one_third_last]Content[/one_third_last]


/***************
* RESTRICTIONS *
****************/

1. The navigation menus are limited to two-levels deep.

2. The description text to an image is limited to 140 chars.




Google Web fonts used are Acme, Amethysta and The Girl Next Door.



Changelog:
------------------------------------------------------------------------------------------------------------

Version 1.1.1 - 24th September 2012
--------------------------------
- changes line-height for #copyright
- removed backwards compatibility for custom-background and header-image


Version 1.1.0 - 29th August 2012
--------------------------------
- style.css: added padding-top to .page-link, added word-wrap: break-word; to #content h1 and #branding #main-menu ul ul, added styles for .entry-header p a, #comments table and #comment blockquote, removed border from #branding #main-menu ul ul
- footer.php: removed link to homepage and to wordpress.org
- functions.php: put the content width on the top before any functions, moved "add_action( 'widgets_init', 'keiran_widgets_init' );" outside of the keiran_theme_setup function
- theme-options.php: line 108: echo instead of esc_attr, and line 111: echo instead of esc_url 
- added custom-header.php for better custom header admin page
- changed styles for comments navigation, added clear:both; to #comments #respond and #comments ol.commentlist
- added image navigation in gallery: added image.php and some styles (style.css, and theme-options.php function keiran_insert_custom_color)

Version 1.0.0 - 03rd August 2012
--------------------------------
Keiran release date.


