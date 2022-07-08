# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT
# Install dependencies
apt-add-repository ppa:ondrej/php
apt-get update
apt-get install -y apache2 curl php8.1 php8.1-pgsql php8.1-curl php8.1-zip postgresql postgresql-contrib zip unzip php-xml


# Configure Apache
echo "<VirtualHost *:80>
    ServerName dev
    DocumentRoot /var/www/public
    SetEnv "APP_ENV" "dev"

	<Directory /var/www/public>
		AllowOverride All
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

#Setup xDebug
sudo apt-get install php-xdebug
echo "
zend_extension=xdebug.so
xdebug.remote_enable=true
xdebug.remote_connect_back=true
xdebug.idekey=PHPSTORM
" > xdebug /etc/php/8.1/mods-available/xdebug.ini


a2enmod rewrite
service apache2 restart



# If you get an error like "github.com Connection timed out", try to use this config:   git config --global url."https://".insteadOf git://
git config --global url."https://".insteadOf git://

if [ -e /usr/local/bin/composer ]; then
    /usr/local/bin/composer self-update
else
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

# Reset home directory of vagrant user
if ! grep -q "cd /var/www" /home/vagrant/.profile; then
    echo "cd /var/www" >> /home/vagrant/.profile
fi

echo "Visit http://localhost:8066 in your browser for to view the application **"

SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'bento/ubuntu-22.04'
  config.vm.network "forwarded_port", guest: 80, host: 8066, auto_correct: true
  config.vm.synced_folder '.', '/var/www', SharedFoldersEnableSymlinksCreate: true
  config.vm.provision 'shell', inline: @script
  config.ssh.insert_key = false


  config.vm.provider "virtualbox" do |vb|
    vb.gui = false
    vb.customize ["modifyvm", :id, "--memory", "2048"]
    vb.customize ["modifyvm", :id, "--name", "yarlo-dev"]
    vb.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
  end
end
