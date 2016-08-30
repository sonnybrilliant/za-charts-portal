<?php

// All Deployer recipes are based on `recipe/common.php`.
require 'recipe/symfony3.php';

// Define a server for deployment.
// Let's name it "prod" and use port 22.
server('dev', '104.236.224.120', 22)
    ->user('root')
    ->identityFile('~/.ssh/id_rsa.pub', '~/.ssh/id_rsa', 'sunny')
    ->stage('production')
    ->env('deploy_path', '/var/www/html/wwwdev.za-charts.portal'); // Define the base path to deploy your project to.


set('keep_releases', 3);

// Symfony shared dirs
set('shared_dirs', ['var/logs', 'web/uploads']);

// Symfony shared files
set('shared_files', ['app/config/parameters.yml']);
// Symfony writable dirs
set('writable_dirs', ['var/cache', 'var/logs' , 'web/uploads','var/sessions']);

// Assets
set('assets', ['web/assets/css', 'web/assets/images', 'web/asets/js', 'web/assets/fonts']);

// Environment vars
env('composer_options', 'install  --verbose --prefer-dist --optimize-autoloader --no-progress --no-interaction');
set('composer_command', '/usr/local/bin/composer');
set('repository', 'git@github.com:sonnybrilliant/za-charts-portal.git');