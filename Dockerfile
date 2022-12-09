FROM ubuntu:22.04

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

WORKDIR /work

RUN apt-get update && apt-get install -y \
    gnupg2 \
    curl \
    software-properties-common \
    apt-transport-https \
    unixodbc \
    unixodbc-dev \
    freetds-common \
    git

RUN add-apt-repository ppa:ondrej/php -y

RUN apt-get update && apt-get install -y \
    php8.1 \
    php8.1-curl \
    php8.1-cli \
    php8.1-odbc \
    php8.1-sybase \
    php8.1-mbstring \
    php8.1-xml \
    php8.1-xsl \
    php8.1-zip \
    php8.1-xdebug

# instalar composer a partir do outro container
COPY --from=composer:2.3.10 /usr/bin/composer /usr/bin/composer

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "src/"]