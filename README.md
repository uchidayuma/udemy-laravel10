## ブランチ対応表
各レクチャーごとにブランチを切っているため、適宜ブランチを切り替えながら確認したいソースコードを御覧ください。

| レクチャー名        |  ブランチ名  |
|--------------|-----------|
| 完成版 | basic-master |
| Section3 | 会員登録・ログイン |
| Laravel Breezeのインストール | breeze |
| パスワードリセットの有効化 | password-reset |
| Section4 | データベースの準備 |
| マイグレーションファイルの作成 | create-migration  |
| Seederファイルの作成 | create-seeder  |
| Section5 | 共通パーツの作成 |
| 共通ヘッダーの作成 | header1 |
| 共通ヘッダー2の作成 | header2 |
|  |  |
|  |  |
|  |  |
|  |  |


# 開発環境の構築

## 実行したコマンド

- docker run -it -v $(pwd):/opt -w /opt laravelsail/php81-composer:latest /bin/bash
- composer create-project 'laravel/laravel:10.*' sail-example
- cd sail-example
- php artisan sail:install
- exit
- ./vendor/bin/sail up -d
- sudo chown -R ユーザー名:ユーザー名 .

■ docker desktop for Windowsでpermittion denidedエラーの出る方
- sudo addgroup --system docker
- sudo adduser $USER docker
- newgrp docker
- sudo chown root:docker /var/run/docker.sock
- sudo chmod g+w /var/run/docker.sock

# 会員登録・ログイン機能の開発

## 実行したコマンド

- sail composer require laravel/breeze --dev
- sail php artisan breeze:install
- sail php artisan migrate

# 💭 データベースの準備

> テーブル構造
> 
> 1. **`users`テーブル**:
>     - **`id`**: ユーザーID (プライマリキー)
>     - **`username`**: ユーザー名
>     - **`email`**: メールアドレス
>     - **`password`**: パスワード (ハッシュ化)
>     - **`created_at`**: 作成日時
>     - **`updated_at`**: 更新日時
> 2. **`recipes`テーブル**:
>     - **`id`**: レシピID (プライマリキー)
>     - **`user_id`**: ユーザーID (外部キー)
>     - **`title`**: レシピのタイトル
>     - **`description`**: レシピの説明
>     - **`image`**: 画像のパスまたはURL
>     - **`created_at`**: 作成日時
>     - **`updated_at`**: 更新日時
>     - **`deleted_at`**: 削除日時
> 3. **`ingredients`テーブル**:
>     - **`id`**: 材料ID (プライマリキー)
>     - **`recipe_id`**: レシピID (外部キー)
>     - **`name`**: 材料名
>     - `**quontity**`: 量
> 4. **`steps`テーブル**:
>     - **`id`**: 手順ID (プライマリキー)
>     - **`recipe_id`**: レシピID (外部キー)
>     - **`step_number`**: 手順の順番
>     - **`description`**: 手順の説明
> 5. **`reviews`テーブル**:
>     - **`id`**: レビューID (プライマリキー)
>     - **`user_id`**: ユーザーID (外部キー)
>     - **`recipe_id`**: レシピID (外部キー)
>     - **`rating`**: 評価 (例: 1-5)
>     - **`comment`**: コメント
>     - **`created_at`**: 作成日時
>     - **`updated_at`**: 更新日時
>     - **`deleted_at`**: 削除日時

[A Free Database Designer for Developers and Analysts](https://dbdiagram.io/d/CookpadLaravel10-6517b108ffbf5169f0c5f3c0)

- 

---

## 実行したコマンド

- sail php artisan make:migration create_categories_table
- sail php artisan make:migration create_recipes_table
- sail php artisan make:migration create_ingredients_table
- sail php artisan make:migration create_steps_table
- sail php artisan make:migration create_reviews_table

- sail composer require goldspecdigital/laravel-eloquent-uuid:^10.0

- sail php artisan migrate:rollback
- sail php artisan migrate

- sail php artisan make:seeder UsersTableSeeder
- sail php artisan make:seeder CategoriesTableSeeder
- sail php artisan make:seeder RecipesTableSeeder
- sail php artisan make:seeder IngredientsTableSeeder
- sail php artisan make:seeder StepsTableSeeder
- sail php artisan make:seeder ReviewsTableSeeder

## 当アプリケーションのカラー定義
- メインカラー: #FF3366
- 文字カラー: text-gray-600
- 見出しカラー: text-gray-800
- 背景カラー: #ede8d2
- アクセントカラー: green-700