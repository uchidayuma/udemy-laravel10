## ブランチ対応表
各レクチャーごとにブランチを切っているため、適宜ブランチを切り替えながら確認したいソースコードを御覧ください。

| レクチャー名        |  ブランチ名  |
|--------------|-----------|
| 完成版 | basic-master |
| Section3 | 会員登録・ログイン |
| Laravel Breezeのインストール | [breeze](https://github.com/uchidayuma/udemy-laravel10/tree/breeze) |
| パスワードリセットの有効化 | [password-reset](https://github.com/uchidayuma/udemy-laravel10/tree/password-reset) |
| Section4 | データベースの準備 |
| マイグレーションファイルの作成 | [create-migration](https://github.com/uchidayuma/udemy-laravel10/tree/create-migration)  |
| Seederファイルの作成 | [create-seeder](https://github.com/uchidayuma/udemy-laravel10/tree/create-seeder)  |
| Section5 | 共通パーツの作成 |
| 共通ヘッダーの作成 | [header1](https://github.com/uchidayuma/udemy-laravel10/tree/header1) |
| 共通ヘッダー2の作成 | [header2](https://github.com/uchidayuma/udemy-laravel10/tree/header2) |
| 共通フッターの作成 | [footer](https://github.com/uchidayuma/udemy-laravel10/tree/footer) |
| Section6 | HOME画面の開発 |
| コントローラーとモデルファイルの作成 | [create-controller-model](https://github.com/uchidayuma/udemy-laravel10/tree/create-controller-model) |
| homeビューの作成 | [create-home-view](https://github.com/uchidayuma/udemy-laravel10/tree/create-home-view) |
| homeビュー用のデータを取得 | [home-view-select](https://github.com/uchidayuma/udemy-laravel10/tree/home-view-select) |
| homeビューにレシピカードを表示する | [home-view-recipe-card](https://github.com/uchidayuma/udemy-laravel10/tree/home-view-recipe-card) |
| Section7 | レシピ一覧機能の開発 |
| レシピ一覧用のデータを取得 | [index-select](https://github.com/uchidayuma/udemy-laravel10/tree/index-select) |
| レシピをカード形式で表示 | [index-layout](https://github.com/uchidayuma/udemy-laravel10/tree/index-layout) |
| 絞り込み検索フォームを開発 | [index-form](https://github.com/uchidayuma/udemy-laravel10/tree/index-form) |
| 絞り込み検索フォームを改良 | [index-form2](https://github.com/uchidayuma/udemy-laravel10/tree/index-form2) |
| レシピの絞り込みを実装 |  |
| ページネーションを追加 | [index-paginate] |
|  |  |
|  |  |
|  |  |
|  |  |
| Section8 | レシピ閲覧機能の開発 |
|  |  |
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

# レシピ閲覧機能の開発

## 実行したコマンド
- sail php artisan make:controller RecipeController --resource
- sail php artisan make:model Recipe
- sail php artisan make:model Review
- sail php artisan make:model Category
- sail php artisan make:model Ingredient
- sail php artisan make:model Step

## Tailwind CSS grid
- [Tailwind CSS grid](https://tailwindcss.com/docs/grid-template-columns)

## アイコンはこちらから
- [HeroesIcon](https://heroicons.com/)

## ページネーションのドキュメント
- [Laravel 10.x Pagination - Laravel](https://readouble.com/laravel/10.x/ja/pagination.html)