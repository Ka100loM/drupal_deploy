# Retrive code
git pull origin master

# Retrive the libraries
composer install

#Update drupal Data Base
drush updb -y

#Export cfg prod
drush csex prod -y

#Import drupal config-sync
drush cim -y

#Clear drupal cash
drush cr