FROM mysql:5.7
COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN apt-get -qq update && \
    apt-get -y install vim git unzip libzip-dev libicu-dev libonig-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
