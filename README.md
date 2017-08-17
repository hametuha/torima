# Torima

Contributors: Takahashi_Fumiki, hametuha  
Tags: advertisement  
Requires at least: 4.7.0  
Tested up to: 4.8.1  
Stable tag: 1.0.0  
License: GPLv3 or later  
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

WP-CLI command for sample data collection.

## Description

This is a WP-CLI package command. Use like below:

<pre>
# This import all Japanese prefecture as term.
wp torima todoufuken
</pre>

For more detail, just run `wp help torima`.

## Installation

### As Package Command

<pre>
wp package install hametuha/torima
</pre>

### As Plugin

This can be installed as plugin, but requires build process.
[npm](https://www.npmjs.com) and [composer](https://getcomposer.org) are required.

1. Clone this repository `git clone https://github.com/hametuha/torima.git` at your plugin directory.
1. Go to `torima` directory and run `composer install and `
1. Upload the plugin files to the `/wp-content/plugins/taro-ad-fields` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Go to `Ad Field > Position` and create positons. If you set default positions with filters, they will be automatically generated.
4. Register ad posions. The published fields will be displayed.

## Frequently Asked Questions

### How to Contribute

We host our code on [Github](https://github.com/hametuha/torima), so feel free to send PR or issues.

## Changelog

### 0.1.0

* Initial release.
