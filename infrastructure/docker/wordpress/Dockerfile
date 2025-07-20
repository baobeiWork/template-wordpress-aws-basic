# infrastructure/docker/wordpress/Dockerfile

FROM amazonlinux:2023

# ローカルタイム設定など（オプション）
ENV TZ=Asia/Tokyo

# 必要パッケージのインストール（Ansible実行に必要な最低限）
RUN dnf -y update && \
    dnf -y install \
      sudo \
      python3 \
      python3-pip \
      tar \
      gzip \
      unzip \
      git \
      curl \
      shadow-utils && \
    pip3 install --upgrade pip && \
    pip3 install ansible && \
    dnf clean all

# Ansibleのバージョン確認
RUN ansible --version

# WordPressファイル配置場所（マウント対象）
WORKDIR /var/www/html

# 実行コマンドは空（ansibleで環境構築）
CMD ["/bin/bash"]
