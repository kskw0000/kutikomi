FROM php:7.4-cli

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# ワーキングディレクトリを設定
WORKDIR /app

# 依存関係をインストール
COPY . /app
RUN composer install --no-dev

# ポート8080を開放
EXPOSE 8080

# サーバーを起動
CMD php -S 0.0.0.0:8080 -t public
