FROM php:8.3.2-cli-bookworm

RUN apt update -q \
    && apt install -y \
    git \
    zip
