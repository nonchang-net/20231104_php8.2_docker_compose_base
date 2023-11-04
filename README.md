# php学習用docker compose環境

php8.2 + nginx + mysqlによるcomposer導入済みセットアップです。


## php8.2起動までの手順

- docker compose up -d
- docker compose exec app bash
	- php -v

## Laravel導入までの手順

- 参考: https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4#laravel%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E3%81%99%E3%82%8B

```
rm -rf ./*

# laravel10系を入れる。チーム作業目的ならバージョンはpinningした方が良いでしょう
composer create-project --prefer-dist "laravel/laravel=10.*" .
chmod -R 777 storage bootstrap/cache

# laravelバージョン確認
php artisan -V

# .envと.env.exampleのDB設定を変更する。「DB_HOST=db」userは「phper」、passwordは「secret」。

php artisan migrate

```


## 作業用STICKYメモ

- laravel入門記事をDocker構成のローカル環境で試しているので、いくつか作法の違いがある。

- 学習中は、vscodeのターミナルを二つ開いておくのが良さそう。
	- docker compose execを叩くのも面倒なので、make xxでよく使うショートカットを配置しておいた。

- app(php)側コンテナbashに入る
	- make app
	- ここでartisanコマンドとかを実行する。
	- `php artisan migrate`とか多用するので、コンテナ側にもMakefile用意してもいいかもな。。

- db側コンテナbashに入る
	- make db
	- そこからmysqlにログイン
		- mysql -u root -psecret
