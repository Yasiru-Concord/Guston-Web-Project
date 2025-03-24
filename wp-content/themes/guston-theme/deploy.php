<?php

namespace Deployer;

require 'recipe/common.php';

define('PROJECT_NAME', 'maya-wp');

define('DB_NAME', 'test');
define('DB_USERNAME', 'simpleblogadmin');
define('DB_PASSWORD', '\$simpleblogadmin\$@243hxxx');

define('SITE_TITLE', 'Your Site Title');
define('SITE_URL', 'test.blazeclone.xyz');
define('SITE_ADMIN_USERNAME', 'root');
define('SITE_ADMIN_PASSWORD', 'sandev123');
define('SITE_ADMIN_EMAIL', 'sandevabeykoon123@gmail.com');

define('WORDPRESS_THEME', 'git@github.com:BlazeIsClone/maya-wp.git');

/** Project Configuration */
set('application', PROJECT_NAME);

set('shared_files', []);

set('shared_dirs', [
	'wp-content'
]);

set('writable_dirs', [
	'wp-content'
]);

host('staging')
	->set('branch', 'main')
	->set('deploy_path', '/var/www/' . PROJECT_NAME)
	->set('remote_user', 'root')
	->set('identity_file', '~/.ssh/id_rsa')
	->set('keep_releases', 0);

host('production')
	->set('branch', 'main')
	->set('deploy_path', '/var/www/' . PROJECT_NAME)
	->set('remote_user', 'root')
	->set('identity_file', '~/.ssh/id_rsa')
	->set('keep_releases', 0);

/** Tasks */
desc('Install WordPress');

task('wordpress:install', function () {

	run('cd {{ release_path }} && wp core download' .
		' --locale=en_US' .
		' --allow-root');

	run('cd {{ release_path }} && wp core config' .
		' --dbname=' . DB_NAME .
		' --dbuser=' . DB_USERNAME .
		' --dbpass=' . DB_PASSWORD .
		' --allow-root');

	run('cd {{ release_path }} && wp core install ' .
		' --title="' . SITE_TITLE . '"' .
		' --url=' . SITE_URL .
		' --admin_user=' . SITE_ADMIN_USERNAME .
		' --admin_password=' . SITE_ADMIN_PASSWORD .
		' --admin_email=' . SITE_ADMIN_EMAIL .
		' --allow-root');
});

desc('Setup custom WordPress theme');

task('wordpress:theme', function () {

	run('cd {{ release_path }}/wp-content/themes &&'
		. ' git clone ' .  WORDPRESS_THEME);

	run('cd {{ release_path }}/wp-content/themes/maya-wp &&' .
		' composer install --no-interaction');
});

/** Task Queue */
desc('Deploy project');

task('deploy', [
	'deploy:info',
	'deploy:setup',
	'deploy:lock',
	'deploy:release',
	'deploy:shared',
	'deploy:writable',
	'wordpress:install',
	'wordpress:theme',
	'deploy:clear_paths',
	'deploy:symlink',
	'deploy:unlock',
	'deploy:cleanup',
	'deploy:success',
]);

/** Hooks */
after('deploy:failed', 'deploy:unlock');
