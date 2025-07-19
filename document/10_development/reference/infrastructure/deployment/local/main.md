# 　ローカル開発環境

## 1. 事前準備

---

### 1.1. 環境変数の定義
プロジェクトルートに.envファイルを配置してください。

.envファイルのサンプルは下記の共有フォルダに格納しています。（基本的にはサンプルを配置して起動いただければ問題ありません。）

* [AssetCompass/infrastructure/01_ローカル開発環境](https://drive.google.com/drive/folders/16F5p7X0yepL_9PuN82hPS9EU14tqNZIG?usp=drive_link)

* 環境変数

	| 環境変数名 								 | 適用されるコンテナ 	| 説明
	| :---       								| :--- 				 	 			| :---
	| LOCAL_ARCH 								| all									| ローカル開発環境を立ち上げるコンピュータのアーキテクチャ（amd64 / arm64 ）
	| SYSTEM_NAME								| all 								| システム名
	| SYSTEM_DOMAIN 						| all 								| システムドメイン名
	| NUXT_ENV									| frontend 						| 起動したい環境名
	| NUXT_PUBLIC_API_URL 			| frontend 						| backendのエンドポイント
	| NUXT_PUBLIC_IS_API_MOCKED | frontend 						| Mock Serverを利用するか（true / false）
	| MYSQL_ROOT_USER						| db									| ローカルで起動する mysql root名
	| MYSQL_ROOT_PASSWORD 			| db									| ローカルで起動する mysql rootパスワード
	| MYSQL_USERNAME					  | db									| ローカルで起動する mysql ユーザー名
	| MYSQL_PASSWORD					  | db									| ローカルで起動する mysql パスワード
	| MYSQL_DATABASE					  | db									| ローカルで起動する mysql データベース名

<br>

### 1.2. 必要ソフトウェアのインストール・機能の有効化
Infrastructure構築用のコンテナの立ち上げに必要な下記のソフトウェアを用意してください。

#### 1.2.1. Windows
WindowsはWSL(Ubuntu) + Docker Desktopを利用します。


* [Docker Desktop](https://www.bing.com/search?qs=HS&pq=Docker&sk=CSYN1&sc=13-6&pglt=2083&q=docker+desktop&cvid=02fa67f8ea97404aa3325ef6f3b5e920&gs_lcrp=EgRlZGdlKgcIABAAGPkHMgcIABAAGPkHMgYIARBFGDkyBggCEAAYQDIGCAMQRRg7MgYIBBAAGEAyBggFEAAYQDIGCAYQABhAMgYIBxBFGDwyBggIEEUYPNIBCDEyMzRqMGoxqAIIsAIB&FORM=ANNTA1&PC=U531)のインストール

* [WSL](https://learn.microsoft.com/ja-jp/windows/wsl/install)の有効化
  * Windows11からはWSLをインストールする前提条件として下記のWindowsの機能を有効化する必要があります。
    * Linux 用 Windows サブシステム
    * Hype-V

* [Ubuntu(WSL distribution)]()のインストール

#### 1.2.2. MAC

* [Docker Desktop](https://www.bing.com/search?qs=HS&pq=Docker&sk=CSYN1&sc=13-6&pglt=2083&q=docker+desktop&cvid=02fa67f8ea97404aa3325ef6f3b5e920&gs_lcrp=EgRlZGdlKgcIABAAGPkHMgcIABAAGPkHMgYIARBFGDkyBggCEAAYQDIGCAMQRRg7MgYIBBAAGEAyBggFEAAYQDIGCAYQABhAMgYIBxBFGDwyBggIEEUYPNIBCDEyMzRqMGoxqAIIsAIB&FORM=ANNTA1&PC=U531)のインストール


#### 1.3. master.keyの配置

   BackEnd/config/にmaster.keyを配置してください。

	 master.keyは下記の共有フォルダに格納しています。

	 * [AssetCompass/infrastructure/01_ローカル開発環境](https://drive.google.com/drive/folders/16F5p7X0yepL_9PuN82hPS9EU14tqNZIG?usp=drive_link)

   


## 2. 構築

---

1. docker-compose build実行

	下記のコマンドを実行します


	```bash
	docker-compose build --no-cache
	```

2. docker-compose up実行

	下記のコマンドを実行します

	```bash
	docker-compose up
	```

	<br>

## 3. テスト

---

### 3.1. コンテナが正常に起動するかの確認

1. 下記のコマンドを実行します。

	```bash
	docker ps -a  
	```

2. 下記のように、「assetcompass_frontend」、「assetcompass_backend」、「assetcompass_db」コンテナがそれぞれ起動していることを確認してください

	```bash
	 parallels@ubuntu-linux-20-04-desktop:/media/psf/AssetCompass$ sudo docker ps -a  
	[sudo] parallels のパスワード: 
	CONTAINER ID   IMAGE                   COMMAND                  CREATED          STATUS          PORTS                                                  NAMES
	abeec4430517   assetcompass_frontend   "entrypoint.sh"          55 minutes ago   Up 49 minutes   0.0.0.0:8000->8000/tcp, :::8000->8000/tcp              assetcompass_frontend_1
	4dd3365aa2c8   assetcompass_backend    "entrypoint.sh"          55 minutes ago   Up 45 minutes   0.0.0.0:3000->3000/tcp, :::3000->3000/tcp              assetcompass_backend_1
	668b024999a4   mysql:8.4               "docker-entrypoint.s…"   15 hours ago     Up 2 hours      0.0.0.0:3306->3306/tcp, :::3306->3306/tcp, 33060/tcp   assetcompass_db_1
	```

	<br>

### 3.2. フロントエンドの起動確認

1. ブラウザから下記のURLにアクセスしてください。
   
	```bash 
	http://localhost:8000/
	```

2. 正常にNindexページが表示されることを確認してください。


### 3.3. バックエンドの起動確認

1. ブラウザから下記のURLにアクセスしてください。
   
	```bash 
	http://localhost:3000/local_deployment_verifications
	```

2. 下記の表示が確認できることを確認してください。

	```bash 
	{"message":"Local deployment api verification successful!"}
	``` 

[READMEトップに戻る](../../../../../README.md)