# ninja-shortcuts


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
