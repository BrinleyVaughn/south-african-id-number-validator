=== South African ID Number Validator ===
Contributors: blusilva, Ruan Lueis
Donate link: https://codeblock.co.za/donate/
Tags: validation, south african id, form, shortcode, validator
Requires at least: 5.0
Tested up to: 5.4.1
Requires PHP: 5.6.36
Stable tag: 1.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

South African ID Number Validator is a lightweight plugin that adds a form to any WordPress page or post by means of a shortcode.

== How to Use ==

Simply install the plugin and place the shortcode where you would like the validation form to be displayed.
Use the shortcode [sa_id_validator] to display the form. User the optional parameter show_info=1 to output the age, gender and citizenship status.
eg. [sa_id_validator show_info=1].

== Installation ==

Simply install the plugin and place the shortcode where you would like the validation form to be displayed.
Use the shortcode [sa_id_validator] to display the form. User the optional parameter show_info=1 to output the age, gender and citizenship status.
eg. [sa_id_validator show_info=1].

== Frequently Asked Questions ==

=Is this plugin GDPR compliant?=

South African ID Number Validator does not collect any data and as such, is compliant with any and all privacy laws.
The output displayed is based only on the identity number and no information is gathered from external sources.

=Which Languages Are supported?=

At the moment, only English is supported. A future update will include additional languages.

=Is it possible to add my own CSS styling to the form and the output?=

Absolutely. You can add your own CSS using the default WordPress customiser.

== Changelog ==

= 1.2 =

Changed line that compares expected check digit to actual check digit to prevent errors if the expected check value is 10. 24/06/2020

= 1.1 =

Fixed so script runs with JQuery as dependency.

= 1.0 =

Initial WordPress Plugin Repository release. 28/01/2020
