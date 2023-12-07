# TKU 學士服租借系統

## 安裝

### 全新安裝

```shell script
mkdir project
git clone https://github.com/Laradock/laradock

# 設定你的設定
cd laradock
cp env-example .env
vim .env
docker-compose up -d nginx mysql phpmyadmin
docker-compose exec workspace zsh
# 更新權限以及 vendor
chown -R laradock:laradock /var/www
composer update
exit

git clone https://github.com/allen0099/TKU-graduate-gown larvel
```

### Laradock

- 更新容器

```shell script
docker-compose build xxx
docker-compose up --force-recreate -d xxx
```


## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
