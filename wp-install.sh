#!/bin/bash

# WordPressセットアップ admin_user,admin_passwordは管理画面のログインID,PW
wp core install \
--url='http://127.0.0.1:8080' \
--title='Madein' \
--admin_user='naganuma' \
--admin_password='Protect0216' \
--admin_email='info@test.com' \
--allow-root

# 日本語化
wp language core install ja --activate --allow-root

# タイムゾーンと日時表記
wp option update timezone_string 'Asia/Tokyo' --allow-root
wp option update date_format 'Y-m-d' --allow-root
wp option update time_format 'H:i' --allow-root

# キャッチフレーズの設定 (空にする)
wp option update blogdescription '' --allow-root

# プラグインの削除 (不要な初期プラグインを削除)
wp plugin delete hello.php --allow-root
wp plugin delete akismet --allow-root

# プラグインのインストール (必要に応じてコメントアウトを外す)
wp plugin install wp-multibyte-patch --activate --allow-root
# wp plugin install backwpup --activate --allow-root
# wp plugin install siteguard --activate --allow-root
wp plugin install contact-form-7 --activate --allow-root
# wp plugin install wp-mail-smtp --activate --allow-root
# wp plugin install all-in-one-seo-pack --activate --allow-root
# wp plugin install broken-link-checker --activate --allow-root
# wp plugin install addquicktag --activate --allow-root

# テーマの削除
wp theme activate Wordpress-Theme --allow-root
wp theme delete twentytwentyone --allow-root
wp theme delete twentytwentytwo --allow-root
wp theme delete twentytwentythree --allow-root

# パーマリンク更新
wp option update permalink_structure /%postname%/ --allow-root