# システム設計仕様書

## 1. システム概要

AssetCompassは、rayventryやskyseaなどのインベントリ管理ツールから取得したハードウェア・ソフトウェア情報を加工・管理するシステムです。

マルチテナント対応を前提とし、スタンドアロンでの運用から分散システムへの移行も考慮した設計となっています。

## 2. システムアーキテクチャ

### 2.1 全体構成

システムは以下の2つのコアコンポーネントで構成されています：

1. Supervisor Core
   - システム全体の監視・管理機能
   - テナント管理
   - インベントリソース管理
   - 統合監視ダッシュボード

2. Tenant Core
   - 個別テナントのアセット管理機能
   - インベントリデータの収集・正規化
   - ハードウェア/ソフトウェア管理
   - ユーザー管理

### 2.2 デプロイメントモデル

#### 2.2.1 スタンドアロンモード（初期フェーズ）
- 単一のデータベース / ECS環境下でTenant Core および Supervisor Coreを運用
- 環境変数 `SUPERVISOR_CORE=true` で管理機能を有効化
- スタンドアロンでも完全な機能を提供

#### 2.2.2 分散モード（将来フェーズ）
- Supervisor CoreとTenant Coreを別インスタンスとして運用
- 複数のTenant Coreインスタンスをサポート
- Supervisor Coreによる統合管理

## 3. データベース設計

### 3.1 Supervisor Core Database

### 3.2 Tenant Core Database


## 4. 運用設計

### 4.1 環境変数による制御

- `SUPERVISOR_CORE`
  - true: スーパーバイザー機能を有効化
  - false: テナント機能のみ有効

- `SYSTEM_ENV`
  - production: 本番環境
  - development: 開発環境
  - test: テスト環境

### 4.2 アクセス制御

- 本番環境（`SYSTEM_ENV=production`）では：
 - `SUPERVISOR_CORE=true`の場合のみスーパーバイザー機能にアクセス可能

### 4.3 データ同期

- Supervisor CoreとTenant Core間でのインベントリソース情報の同期
- テナントごとの設定情報の管理
- 障害時のスタンドアロン動作保証

## 5. 拡張性

### 5.1 新規インベントリソース追加
- typeフィールドの拡張
- 接続設定のJSON Schema定義
- データ正規化ルールの追加

### 5.2 スケーリング
- Tenant Coreインスタンスの追加
- 負荷分散設定
- データベースのレプリケーション

## 6. 監視・運用

### 6.1 システム状態監視
- コンポーネント稼働状況
- インベントリソース接続状態
- データ同期状態

### 6.2 パフォーマンス監視
- リソース使用状況
- レスポンスタイム
- データ処理量

### 6.3 バックアップ・リストア
- データベースバックアップ
- 設定情報のエクスポート
- リストア手順

## 7. セキュリティ

### 7.1 認証・認可
- ロールベースアクセス制御
- APIトークン管理
- セッション管理

### 7.2 データ保護
- 通信の暗号化
- 機密情報の保護
- 監査ログ

## 8. 今後の展開

### 8.1 Phase 1（現在）
- スタンドアロンモードでの基本機能提供
- 単一テナントでの運用確立
- 基本的なインベントリ管理機能

### 8.2 Phase 2
- マルチテナント対応
- Supervisor Core分離
- 高度な分析機能追加

### 8.3 Phase 3
- 完全分散システム化
- リアルタイムモニタリング
- AI/ML機能の統合
