=== EasyTimetable - Responsive Schedule management system ===
Contributors: stereonomy
Donate link: https://www.paypal.me/stereonomy
Tags: timetable, schedule, week schedule, scheduled activities, drag & drop, responsive, week calendar, jQuery, Ajax, school timetable, schedule management, planning, emploi du temps, Zeitplan, Wochenplan, programma settimanale, orario, empleo del tiempo, horario semanal, programação semanal, horário, dienstregeling
Requires at least: 3.5.0
Tested up to: 5.6
Stable tag: 1.4.13
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

EasyTimetable allows you to build beautiful custom responsive Schedule/Timetable in no time thanks to a user-friendly interface

== Description ==

= EasyTimetable allows you to build beautiful custom responsive Schedule/Timetable in no time thanks to a user-friendly interface using jQuery & Ajax =

* New v 1.4.0: Full access role management: give access to each action (create, manage, delete, duplicate) to a different role
* New v 1.3.0: automatically display the date & the name of the day in the site language for each column
* New v 1.3.0: choose the display period (week number)
* a Single page to manage everything
* fully customizable (backgroung color, font color, image)
* jQuery Drag & Drop system to insert activities in the Schedule
* Insert additionnal informations in the cell of the activity
* Display additionnal informations & activity's image in a tooltip
* Display the full description of the activity in a dialog box

[Read the documentation to see how it is simple and fast](http://www.stereonomy.com/stereonomy-documentation-help-support/easytimetable-products-documentation/category/easytimetable-for-wordpress.html)

=  Get Extended version for more features =
* New v 1.4.13: New shortcode parameter that allows to limit the number of activities displayed in a timetable. This way you can choose to display different activities on different pages with the same timetable. 
* New v 1.4.11: Adaptative mode is available!
* New v 1.4.5: Support the display of multiple schedule on the same page by putting multiple shortcodes on the same page
* New v 1.4.5: New EasyTimetable WIDGET to display timetable in widget positions
* New v 1.4.2: Support Multisites systems
* New v 1.4.0: User as editor: Select a single user as editor for each schedule
* New v 1.3.0: 
    Create as many schedule variations as you need
    Display them on the same page
    and/or alternate schedules weekly
    by choosing a display period (weeks) for each variation

* New v 1.2.2: HTML allowed in activity's description text and text in the cell 
* New v 1.2.0: Delete activity button with 2 options
* New v 1.1.0: Put 2 activities in one cell
* Print schedules
* Duplicate schedules
* Display Activity filters in the Front-end
* Modify the end time for each scheduled activity
* Unlimited schedules - one in the free version
* 99 columns - 7 in the free version
* 99 cells - 10 in the free version
* Unlimited activities - 8 in the free version
* Unlimited duration - 60 mins in the free version

A big huge grateful thanks to the WordPress-fr team for their time and support! Thx guys !

= And soon in the Extended =

* Booking system
* Category system
* Display today or upcoming activities
* Custom each dropped activity with its own tooltip, description, color and image
* Dynamic display of the activities list
* and more...

timetable, schedule, agenda, week calendar, week agenda, week schedule, scheduled activities, school timetable, schedule management, planning, emploi du temps, Zeitplan, Wochenplan, programma settimanale, orario, empleo del tiempo, horario semanal, programação semanal, horário, dienstregeling


== Installation ==

1. Download the EasyTimetable plugin
2. Go to the Plugins page in your website admin, then click on Add new and select the plugin .zip file
3. You can also extract the .zip file content and upload it manually into the wp-content/plugins/easy-timetable folder you should create
4. Click on "activate the plugin"

Requires at least PHP 5.4.x - Works with PHP 5.3.x but without the license system in the Extended version

To update from v 1.2.2 to 1.3.0
You have to edit every timetable and save them right after the page is loaded. This will convert the existing data (activities inserted in the schedule) to the new data system.

== Frequently asked questions ==

= Is there an adaptative mode?
Yes, the Extended version offer two display mode, fixed or adaptative (cell's height according the duration) with a time scale on the left for the adaptative one.

= How can I display the date and the day name in my site's language? =
Just, leave the "Custom column names" field empty (displayed in the Timetable configuration tab or when you just created the timetable).
You can adjust the day name for every single column (if your schedule starts on tuesday for example, or for a week-end schedule)

= Is it possible to print the timetable? =
Yes, it is , with the Extended version you can print even in large format (tested up to A3 format). For the moment, it is possible only if there is one shortcode in a page, but there can be several variations of a timetable.

= Is it possible to put several activities in a single cell? =
It is possible to put 2 activities in one cell with the Extended version

= Is it possible to display several schedules on the same page =
Yes, with the extended edition, you have two possibilities : 
Put one shortcade and create variation for this timetable
or put different shortcodes of different timetables in a page (no print in this case).
You can insert as many schedule as you want inside a page with content above, between and under. The position of the timetable is the same as the shortcode position in the page

= Is it possible display different schedule for a specific week or period =
Yes, with the extended edition, you can display a different schedule each week if you need or display a timetable for odd weeks and another for even weeks. For example, you can display a schedule variation for the school period and a different variation for holidays, with the same timetable item

== Screenshots ==

1. /assets/screenshot-1.png
2. /assets/screenshot-2.png
3. /assets/screenshot-3.png
4. /assets/screenshot-4.png
5. /assets/screenshot-5.png
6. /assets/screenshot-6.png
7. /assets/screenshot-7.png
8. /assets/screenshot-8.png
9. /assets/screenshot-9.png
10. /assets/screenshot-10.png
11. /assets/screenshot-11.png
12. /assets/screenshot-12.png
13. /assets/screenshot-13.png

== Changelog ==
= 1.4.13 =
Bug fix:  53rd week of 2021 issue
= 1.4.11 =
Bug fix:  setting, calls for a file that does not exists in the free version.
= 1.4.10 =
Bug fix:  no table when creating a new timetable.
= 1.4.9 =
Improvement: js script optimization. 3 scripts removed to gain 200ko.
= 1.4.8 =
Bug Fix: change sql install script to avoid installation issue.
= 1.4.7 =
Bug Fix: Problem with dates under column name in the public view.
= 1.4.6 =
Improvement: replace jQuery-UI by UIKIT (for modal description on the frontend) to avoid jQuery-UI conflicts with other theme or plugins
= 1.4.5 =
Bug fix: error after installation for PHP 5.3.x server
= 1.4.4 =
- Bug fix: with some configurations only, draggable was not possible because of a jQueryui conflict.
= 1.4.3 =
- Bug fix: display of the AM/PM informations in the front-end
= 1.4.2 =
- Bug fix : Now compatible with MotoPress Visual builder, SiteOrigin Page Builder and more.
- New: New easier Shortcode system to display a schedule at the right place on the page with content above
- New: New EasyTimetable WIDGET to display timetable in widget positions
= 1.4.1 =
- Bug fix : issue changing year with prev & next button in the front-end, schedule disappeared.
= 1.4.0 =
- New v 1.4.0: Full access role management: give access to each action (create, manage, delete, duplicate) to a different role
- New v 1.4.0: User as editor: Select a single user as editor for each schedule
= 1.3.11 =
- Bug fix : issue with activity name containing single quote
- Responsive : Modal description is now responsive
- New feature : shortcodes allowed in the content above the timetable
= 1.3.10 = 
Bug Fix: compatibility fix with PHP 5.3
= 1.3.9 = 
- Free & Extended: Bug fix - Single and double quotes corrupted activities data. Any characters accepted in the activity title
- Free & Extended: New functionality - It is now possible to put the post or page content ABOVE the timetable. Html layout is displayed correctly with WordPress editor and TinyMCE advanced editor
= 1.3.8 = 
- Free & Extended: Bug fix - sunday and week + 1 days date fixed
= 1.3.7 = 
- Free : Bug fix : Both delete activity options are working fine now
- Free & Extended: Bug fix - change the style and the position of the "Save" notification appearing after deleting an activity
- Free & Extended: Improve code for translation
= 1.3.6 = 
- Free & Extended: bug fix : css conflict with Select-Themes themes
- Extended: Bug fix - Improve Print display
= 1.3.5 = 
- Free & Extended: add credits, prepare for translation
- Extended: Bug fix - Tooltip content issue when multiple schedules in a timetable
= 1.3.4 = 
- Free & Extended: fix css conflicts caused by Slider Revolution
= 1.3.3 =
- Free & Extended: fix css conflicts with BuddyPress and Wordpress 
- Free & Extended: improve styles of the plugin
- Free & Extended: prepare for translation
= 1.3.2 =
- Free & Extended: Bug fix -> css conflict with the BuddyPress activity page
= 1.3.1 =
- Free & Extended: Scroll bar available when opening a dialog box in administration (for small screen compatibility)
- Extended: bug fix -> activity size adjusted when moving the same scheduled activity twice and more
= 1.3.0 =
- Free & Extended: automatically display the date & the name of the day in the site language for each column
- Free & Extended: choose the display period (week number)
- Free & Extended: navigate thru weeks like in a calendar
- Extended: Create as many schedule variations as you need
- Extended: Display schedule variations on the same page and/or alternate schedules weekly
- Extended: Choose a display period (weeks) for each variation
= 1.2.2 =
- HTML allowed in the description text of the extended edition
- Style modification of the description text
- CSS conflict with Wordpress Add new page fixed
- Improve display of long activity's name
= 1.2.1 =
- Improve compatibility with old php version (5.3)
- Improve css for a better display with Divitheme themes
= 1.2.0 =
- Delete button added with two options : Delete every related scheduled activities or delete entirely the activity (with its occurence in the schedule).
= 1.1.0 =
- Prepare the script to put 2 activities per cell
- Fix some minor bugs
= 1.0.3 =
- css classes of the image chooser modified to avoid conflicts with other plugins
- adding a close button to the image chooser in case it's opened but no image chosen
= 1.0.2 =
Change function names to avoid conflicts with other plugins
= 1.0.1 =
Security fix
= 1.0.0 =
First release

== Upgrade notice ==
To update from v 1.2.2 to 1.3.0+
You have to edit every timetable and save them right after the page is loaded. This will convert the existing data (activities inserted in the schedule) to the new data system.

See plugin documentation