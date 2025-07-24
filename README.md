# template-wordpress-aws-basic

AWSのEC2上に WordPress 環境を迅速に構築するためのテンプレートプロジェクトです。  
Ansible, Docker, MariaDB, Apache, PHP, WordPress を活用し、ローカル開発環境と本番環境を統一的に管理します。
（Cloud Formation / TerraformによるAWSリソースの構築コードは追って追加予定 2025/07/24）

## ディレクトリ構成概要

```bash
├── ansible/ # サーバ構成管理（本番/開発/ステージング対応）
├── docker-compose.yml # ローカル開発用Docker構成
├── infrastructure/ # Apache/PHP/MySQL等の構成管理（Ansible）
├── wordpress/ # WordPress本体
├── database/ # MySQL初期設定・永続化
└── document/ # 要件・設計・運用ドキュメント
```


## ローカル開発環境の構築手順

```bash
# イメージビルド
docker-compose build

# 起動（バックグラウンド）
docker-compose up -d

# WordPress にアクセス
http://localhost:8080

```

## Ansible による構築

```bash
cd /workspace/ansible

# 開発環境
ansible-playbook -i hosts development.yml

# ステージング環境
ansible-playbook -i hosts staging.yml

# 本番環境
ansible-playbook -i hosts production.yml
```

## 変数の切り替え

```bash
# group_vars/production.yml の例
env_file: "../../.env.production.yml"
use_ssm: true
use_systemd: true

```
