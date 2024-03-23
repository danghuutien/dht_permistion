<?php

namespace Package\AdminUser\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminUserSeedCommand extends Command {

    protected $signature = 'admin_users:seeds';

    protected $description = 'Khởi tạo dữ liệu cho tài khoản quản trị';

    public function handle() {
        $this->users();
    }

    public function echoLog($string) {
        $this->info($string);
        Log::info($string);
    }

    public function users() {
    	DB::table('users')->truncate();
    	DB::table('password_reset_tokens')->truncate();
    	$created_at = $updated_at = date('Y-m-d H:i:s');
    	$user_name_array = [
    		[
    			'name' => 'dev',
    			'email' => 'dev@danghuutien.vn',
    			'password' => 12082001,
    		],
    		[
    			'name' => 'fake',
    			'email' => 'fake@danghuutien.vn',
    			'password' => 12082001,
    		]
    	];
    	$users = [];
    	foreach ($user_name_array as $value) {
    		$users[] = [
	            'name' => $value['name'],
	            'email' => $value['email'],
	            'password' => bcrypt($value['password']),
	            'status' => 1,
	            'created_at' => $created_at,
	            'updated_at' => $updated_at
    		];
    	}
        DB::table('users')->insert($users);
        $this->echoLog('Tai khoan quan tri da duoc tao tu dong:');
        foreach ($user_name_array as $value) {
        	$this->echoLog($value['name'].' - '.$value['password']);
        }
    }

}