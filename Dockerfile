# I choose apline linux for my containers because is the lightest distro
FROM alpine:3.8

# Install system dependencies
RUN apk add --update wget

####
# Copy all the assignment scripts
####
COPY ./scripts /code
WORKDIR /code

# ####
# # Python
# ####

# # Install python 2.7 ecosystem
# RUN apk add python2





# ####
# # JS
# ####

# # Install nodejs 8.11 ecosystem
# RUN apk add nodejs npm

# # Install code dependencies
# RUN npm --prefix js/ install

# # Run Unit Tests
# RUN npm --prefix js/ test


# ####
# # PHP
# ####

# # Install php 7.2 ecosystem
# RUN apk add php7 php7-json php7-mbstring php7-phar php7-openssl

# # Install phpunit with phar
# RUN wget -O phpunit https://phar.phpunit.de/phpunit-7.phar && mkdir /code/php/bin && mv phpunit /code/php/bin && chmod +x /code/php/bin/phpunit

# # Run Unit Tests
# RUN ./php/bin/phpunit ./php/tests
