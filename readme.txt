=== BP Profile Gallery Widget ===
Contributors: slushman
Donate link: http://slushman.com/
Tags: buddypress, widget, gallery, photo, photos, slideshow, Flickr, Picasa, Photobucket, embed, profile
Requires at least: 2.9.1
Tested up to: 3.2.1
Stable tag: 0.15
License: GPLv2

The BP Profile Gallery Widget allows users to embed a slideshow of photos from Flickr, Picasa, or Photobucket on the sidebar of the user’s profile page using custom profile fields from their profile form.

== Description ==

*** THIS PLUGIN IS NO LONGER UNDER DEVELOPMENT! ***

I haven't discontinued development of this plugin in favor of the newer version - BP Profile Widgets. Please install that plugin instead of this one.



The BP Profile Gallery Widget was originally developed for the Towermix Network at Belmont University‘s Curb College of Entertainment and Music Business. The BP Profile Gallery Widget allows users to embed a slideshow of photos from Flickr, Picasa, or Photobucket on the sidebar of the user’s profile page using custom profile fields from their profile form.

Features

* Users can embed one of the following slideshow players: Flickr, Picasa, Photobucket.
* The user enters their unique ID in a custom profile field on their profile form.
* Widget options for width and height of the slideshow.
* A description field is included allowing the user to explain their role in the photos presented.
* Multiple Instances are possible.

== Installation ==

1. Upload the BP Profile Gallery Widget folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create the appropriate extended profile fields
4. Drag the BP Profile Gallery Widget to a sidebar on the 'Widgets' page under the 'Appearance' menu

== Frequently Asked Questions ==

= What Custom Profile Fields do I need for this plugin to work properly? =

Each of the following fields are not required and are all text boxes, except for Description, which is a Multi-line Text Box:

Field Title: Flickr Username
Field Description: What is your username on Flickr?

Field Title: Flickr Set ID
Field Description: The set ID # is the long number after "/sets/".

Field Title: Picasa Username
Field Description: What is your username on Picasa?

Field Title: Picasa Album ID
Field Description: The album ID can be found by clicking on the album you want to share, then click the RSS link on the right side, which will open a page of gibberish. In the URL, the album ID is the long number between "/albumid/" and "?alt=rss".

Field Title: Photobucket Album URL
Field Description: The album URL can be copied from the "Direct Link" field in the Share This Album widget on the album's page.

Field Title: Photobucket RSS URL
Field Description: The RSS URL can be found at the bottom left corner of the album page, right-click the "Feed for this album" link, and copy the link location.

Field Title: Gallery Description
Field Description: Describe your role in the gallery.

= How do I hide these custom profile fields so they don't show on people's profile pages? =

Install the plugin BP Profile Privacy.  For each of the custom profile fields created for this plugin, select User instead of Everyone.

= How do I make this widget only appear on the user's profile page? =

Install the plugin Widget Logic. At the bottom, each widget will have another field called Widget Logic. Paste in the following:

bp_is_user_profile() && !is_page(array('About', 'News', 'Interviews')) && !is_home()

This code shows this widget only on the BuddyPress user profile page (but nowhere else in BuddyPress), and explicitly not on the WordPress home page or any other WordPress page. You'll need to change the !is_page array to reflect the pages on your site.

= I filled out all the fields, but I'm only seeing one gallery; what gives? =

The gallery cascades, meaning: if you fill out the form for the first gallery, that will be the one that shows, whether or not you fill out the others. So, if you don't fill out the Flickr account, it will look for the Picasa info. If not the Picasa, then Photobucket. If not Photobucket, it will say: "This user has not activated their photo gallery."

== Screenshots ==

1. Widget options
2. Flickr Slideshow
3. Picasa Slideshow
4. Photobucket Slideshow
5. Custom profile fields

== Changelog ==

= 0.2 =
Discontinuing development of this plugin.
Notifying users of the new plugin - BP Profile Widgets

= 0.15 =
Added support for BuddyPress 1.5

= 0.1 =
Plugin created.

== Upgrade Notice ==

= 0.2 = 
This plugin is now discontinued, please install BP Profile Widgets instead.

= 0.15 =
Added support for BuddyPress 1.5.

= 0.1 =
Plugin released.