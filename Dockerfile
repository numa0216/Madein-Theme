FROM wordpress:latest

# wp-cliのインストール ※注意:ここでwp-cliインストールしないとWordPressが正常にインストールできない
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/local/bin/wp \
  && wp --info

  

# 「docker exec -it 【WordPressのコンテナ名】 /bin/bash」 でコンテナに入る

#     $ docker exec -it madein-wordpress /bin/bash

# 「chmod +x /tmp/wp-install.sh」 で実行権限を付与
# シェルスクリプトに実行権限を付与して実行できるようにします

#     $ chmod +x /tmp/wp-install.sh

# 「/tmp/wp-install.sh」 でWP-CLI実行

#     $ /tmp/wp-install.sh