<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/JavLG14/To-Do-DAW.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('3.235.223.250')
    ->set('remote_user', 'sa04-deployer')
    ->set('identity_file', '~/.ssh/id_rsa')
    ->set('deploy_path', '/var/www/es-cipfpbatoi-deployer/html');

// Tasks
task('reload:php-fpm', function () {
    run('sudo /etc/init.d/php8.3-fpm restart');
});

task('upload:env', function () {
    upload('.env.production', '{{deploy_path}}/shared/.env');
})->desc('Environment setup');

before('deploy:symlink', 'artisan:migrate');
before('deploy:shared', 'upload:env');
after('deploy:failed', 'deploy:unlock');
after('deploy', 'reload:php-fpm');