<?php 

return [
	// Đường dẫn Admin
	'admin_dir' => env('ADMIN_DIR', 'admin'),

	// Các trạng thái chung trên toàn trang
	'status' => [
		'1' => 'Hoạt động',
		'0' => 'Không hoạt động',
	],

	'page_size' => [ 10, 30, 50, 100 ],
];