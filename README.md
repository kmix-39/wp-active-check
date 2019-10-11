# WP Active Check

## About

A library for WordPress that check if the theme or plugin is active.

## Install
```
$ composer require kmix39/wp-active-check
```

## How to use

### Themes check

True if any of the themes to check is active.

```
<?php
$active_check = new Kmix39\WP_Active_Check\Bootstrap();
$result = $active_check->is_theme_active( [
	'twentynineteen' => [ '1.4', '>=' ],
	'twentyseventeen' => [ '2.2', '>=' ],
	'twentysixteen' => [ '2.0', '>=' ],
] );
```

### Plugin check

True if any of the plugins to check is active.

```
<?php
$active_check = new Kmix39\WP_Active_Check\Bootstrap();
$result = $active_check->is_plugin_active( [
	'hello-dolly/hello.php' => [ '1.7.2', '>=' ],
] );
```

### Plugins check

True if all the plugins to check are active.

```
<?php
$active_check = new Kmix39\WP_Active_Check\Bootstrap();
$result = $active_check->is_plugins_active( [
	'hello-dolly/hello.php' => [ '1.7.2', '>=' ],
] );
```
