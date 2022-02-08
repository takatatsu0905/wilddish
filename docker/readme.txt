## docker create

docker-compose down
docker-compose up -d
docker-compose exec php-apache bash
 composer install
 php artisan key:generate
 php artisan migrate
 php artisan db:seed

//おまけ
docker-compose exec app php artisan tinker
Psy Shell v0.10.11 (PHP 8.0.9 — cli) by Justin Hileman
>>> App\Models\User::create(['name' => 'suda', 'email' => 'suda@suda.com', 'password' => bcrypt('suda01'),'category'=>1,'gender'=>1,'height'=>170.0,'image'=>' ']);

>>> exit
Exit:  Goodbye
'name' => '管理者',
 'email' => 'admin@yahoo.co.jp',
  'password' => bcrypt('12345Ab'),　→パスワードは12345Ab、です。
  'role' => 1, // 管理者権限分岐
