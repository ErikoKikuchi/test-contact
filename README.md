# アプリケーション名
　Contact Form

##　環境構築
　**Dockerビルド**
　・git clone git@github.com:ErikoKikuchi/test-contact.git
　・cd test-contact
　・docker-compose up -d --build

　**Laravel環境構築**
　・docker-compose exec php bash
　・composer install
　・composer create-project "laravel/laravel=8.*" . --prefer-dist
　・開発環境ではAsia/Tokyoに設定済
　・cp .env.example .env 環境変数を通常変更
　・php artisan key:generate
　・php artisan migrate
　・php artisan db:seed

　**開発環境**
　・お問い合わせフォーム入力画面：http://localhost
　　＊画面フロー：入力確認画面→サンクス画面（フォーム送信経由で遷移）
　・ユーザー登録：http://localhost/register
　・ログイン：http://localhost/login
　　＊画面フロー：管理画面→詳細画面（モーダル表示）（画面内ボタン押下により遷移）
　・phpMyAdmin:http://localhost:8080
　・テスト用ログインアカウント
　　＊メール: test@gmail.com
　　＊パスワード: coachtech1106

##　使用技術（実行環境）
　・php:8.1-fpm（Dockerfile）
　・Laravel：8.75
　・MySQL:8.0.26
　・nginx:1.21.1

##　ER図
![ER図](contact.drawio.png)