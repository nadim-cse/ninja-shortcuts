# ninja-shortcuts

<picture>
  <img alt="Shows an illustrated sun in light mode and a moon with stars in dark mode." src="https://github.com/nadim-cse/ninja-shortcuts/blob/main/assets/download.png">
  <source media="(prefers-color-scheme: dark)" srcset="https://github.com/nadim-cse/ninja-shortcuts/blob/main/assets/download.png">
</picture>

Filter hook to add new menu item:

<code>apply_filters('ns_addon/add_menu_items', $menu_items);</code>

Usage:
<code>
add_filter('ns_addon/add_menu_items', function($menu){
	$items = [
		 'nadim-bhai' => [
                'parent'     => 'ninja-support-shortcuts-menu',
                'title'      => 'Nadim Bhai',
                'url'        => 'admin.php?page=nadim_bhai',
         ]
	];
	return array_merge($menu, $items);
}, 10, 1);
</code>
