# Laravel

「[PHPフレームワークLaravel入門 第2版](https://www.amazon.co.jp/dp/4798060992/)」を使った勉学のために作成しました。

## 使用技術
- PHP 8.0.7(cli)
- Laravel v8.42.0
- MYSQL Ver 14.14 Distrib 5.7.31, for Linux(x86_64)

## 必要要件

- Docker
- Docker Compose

## インストール
必要要件に記載している環境を整えた上で、ターミナルで下記コマンドを実行して下さい。

```
git clone https://github.com/the-bears-field/Laravel.git
```
```
cd Laravel
```
```
docker-compose build --no-cache
```
```
docker-compose up -d
```
```
docker-compose exec app /bin/bash
```
```
cd myapp && cp .env.example .env && composer install && php artisan key:generate
