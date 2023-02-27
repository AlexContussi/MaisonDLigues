    #!/bin/sh
    ssh root@10.10.2.172
    ContussiBreton
    sudo apt-get update
    sudo apt-get install ca-certificates apt-transport-https software-properties-common wget curl lsb-release
    curl -sSL https://packages.sury.org/php/README.txt | sudo bash -x
    apt-get update
    sudo apt-get install libapache2-mod-php8.1
    sudo systemctl restart apache2
    php -v
    wget https://get.symfony.com/cli/installer -O - | bash
    /root/.symfony5/bin/symfony
    export PATH="$HOME/.symfony/bin:$PATH".
    source ~/.bashrc
    php-v
    php -v
    composer
    curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
    apt install symfony-cli
    symfony
    apt install git
    cd bin
    cd /
    cd var
    cd www
    git clone https://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@github.com/AlexContussi/MaisonDLigues.git
    sed -i "s/^\tDocumentRoot \/var\/www\/html/\tDocumentRoot /\var\/www\/public/" /etc/apache2/sites-available/000-default.conf
