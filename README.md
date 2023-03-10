# ninja-shortcuts

<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://user-images.githubusercontent.com/25423296/163456776-7f95b81a-f1ed-45f7-b7ab-8fa810d529fa.png">
  <source media="(prefers-color-scheme: light)" srcset="https://user-images.githubusercontent.com/25423296/163456779-a8556205-d0a5-45e2-ac17-42d089e3c3f8.png">
  <img alt="Shows an illustrated sun in light mode and a moon with stars in dark mode." src="https://user-images.githubusercontent.com/25423296/163456779-a8556205-d0a5-45e2-ac17-42d089e3c3f8.png">
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
