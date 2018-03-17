# Apache Changes
# ------

# Add ServerName to httpd.conf
echo "ServerName localhost" > /etc/apache2/httpd.conf

# Setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/var/www/html"
  ServerName localhost
  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
  <Directory "/var/www/html">
    AllowOverride All
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default

# Enable mod_rewrite
a2enmod rewrite

# Restart apache
service apache2 restart
