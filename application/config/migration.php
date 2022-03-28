<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['migration_enabled'] = true;
$config['migration_type'] = 'timestamp';
$config['migration_table'] = 'migration';
$config['migration_auto_latest'] = true;

$config['migration_version'] = 20220223095159;
$config['migration_path'] = APPPATH.'migrations/';
