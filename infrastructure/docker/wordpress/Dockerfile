FROM amazonlinux:2023

ENV TZ=Asia/Tokyo

RUN dnf -y update --allowerasing && \
    dnf -y install \
      sudo \
      python3 \
      python3-pip \
      tar \
      gzip \
      unzip \
      git \
      curl \
      procps-ng \
      shadow-utils --allowerasing && \
    pip3 install ansible && \
    dnf clean all

RUN ansible --version

WORKDIR /workspace

CMD ["tail", "-f", "/dev/null"]
