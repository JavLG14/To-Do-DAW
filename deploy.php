<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/JavLG14/To-Do-DAW.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('44.197.249.158')
    ->set('remote_user', 'sa04-deployer')
    ->set('identity_file', '~/.ssh/id_rsa')
    ->set('deploy_path', '~/var/www/es-cipfpbatoi-deployer/html');

// Hooks

after('deploy:failed', 'deploy:unlock');

/* before('deploy:symlink', 'artisan:migrate'); */
