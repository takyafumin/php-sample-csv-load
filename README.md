phpでのTSVファイル読み込みサンプル
====================

環境
----------

* php: 7.4.3
* composer: 1.10.1


ディレクトリ構造
----------

```bash
# exa -T --git-ignore

.
├── composer.json
├── composer.lock
├── README.md
├── resources
│  └── sample.tsv
├── src
│  └── index.php
└── vendor
```


使い方
----------

リポジトリをcloneして、index.phpを実行してください

```bash
# git clone
git clone [リポジトリURL]
cd php-sample-csv-load

# composer install
composer install

# exec php file
php src/index.php
```


おまけ
----------

### PHP-CS-FIXERの使い方

ソースコードのフォーマットチェックとフォーマット修正が行えます

```bash
# チェック(dry run)
./vendor/bin/php-cs-fixer fix --dry-run --diff ./src

# 修正
./vendor/bin/php-cs-fixer fix ./src
```
