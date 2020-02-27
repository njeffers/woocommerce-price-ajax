# woocommerce-price-ajax
 
This plugin allows for a realtime update of pricing on Woocommerce product pages. This is essentially product price * quantity.
Also updates the cart without the need to click the update cart button. Initially created as a simple Docker example for my fellow developer and good friend Chad.

## Docker Setup

#### 1) Start Containers
```docker-compose up -d```

#### 2) Wait 30 seconds or so for your environment, and access your site at http://localhost

#### 3) Install Wordpress
```docker-compose run --rm wp-cli install-wp```

#### 4) Login username/password is wordpress/wordpress


## Basic Installation

#### Download the latest 'woocommerce-price-ajax.zip' file from https://github.com/njeffers/woocommerce-price-ajax/releases/latest and unpack it in your /wp-content/plugins/ folder.
