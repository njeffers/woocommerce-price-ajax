#!/usr/bin/env sh

# Install WordPress.
wp core install \
  --title="Project" \
  --admin_user="wordpress" \
  --admin_password="wordpress" \
  --admin_email="admin@example.com" \
  --url="http://localhost" \
  --skip-email

# Update permalink structure.
wp option update permalink_structure "/%year%/%monthnum%/%postname%/" --skip-themes --skip-plugins

# Activate plugins.
wp plugin install woocommerce
#wp plugin activate woocommerce
wp plugin activate woocommerce-price-ajax

# Delete the default plugins.
wp plugin delete akismet
wp plugin delete hello