# Cloud Formation stack 更新

## 1. インフラ構築環境へのログイン
### 1.1. 概要
この項目では、前項で構築したインフラ実行環境へログインし、構築したい環境情報（production / stagin / test）に応じた環境変数を設定します。


### 1.2. インフラ実行環境へのログイン

1. ログイン

    プロジェクトルートより、下記のコマンドを実行しインフラ実行環境へログインしてください。

    ```bash 
    sudo docker exec -it assetcompass_infrastructure /bin/bash
    ```

    <br>
    <br>

### 1.3. 環境変数の設定

1. システム環境変数の設定
  
   次のシェルを実行し、システム環境変数を設定します。環境名称にはproduction / staging / testのいずれかを入力してください。

    ```bash
    source /usr/bin/set_env.sh <環境名称>
    ```
    
    <br>
    <br>

## 2. Cloud Formationでの変更の適用
### 2.1. 概要
この項目では変更・追加するCloud Formation管理下のリソースがある場合にコードを修正後、下記のコマンドを実行し、その変更を適用します。

1. カレントディレクトリの移動

    以下のコマンドを実行し、カレントディレクトリをスタックテンプレートのあるディレクトリに移動します。

    ```bash
    cd $INFRASTRUCTURE_HOME/cloudformation
    ```

2. Cloud Formationの実行
   
   以下のコマンドを実行し、Cloud Formationを実行してください。

   ```bash
   aws cloudformation update-stack \
   --stack-name $STACK_NAME \
   --template-body $STACK_TEMPLATE \
   --parameters \
   ParameterKey='SystemName',ParameterValue=$SYSTEM_NAME \
   ParameterKey='SystemDomain',ParameterValue=$SYSTEM_DOMAIN \
   ParameterKey='SystemEnv',ParameterValue=$SYSTEM_ENV

   ```

   実行後、下記のような出力があり、Cloud Formation のStack IDが表示されます。
   こちらのIDをを控えておいてください。（次点の確認事項で必要となります。）


    ```bash 
    {
     "StackId": "arn:aws:cloudformation:ap-northeast-1:<AWS Acoount ID>:stack/production-rehacare-tech-terraform-preparation/85fe5260-35e3-11ef-8966-06fa51718c71"
    }

    ```

3. Cloud Formation 実行スタックが正しく完了しているかの確認

   以下のコマンドを実行し、先程実行したスタックが正しく完了していることを確認してください。

    ```bash 
    aws cloudformation list-stacks
    ```

    「StackStatus」が「CREATE_COMPLETE」になっていれば正常に完了しています。

    異常がある場合はAWS Consoleから確認してください。