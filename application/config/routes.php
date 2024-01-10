<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// auth
$route['login'] = 'auth/c_login/login';
$route['logout'] = 'auth/c_login/logout';
$route['validate'] = 'auth/c_login/validate';
// $route['registration'] = 'auth/c_login/registration';
// $route['registration/attemp']['POST'] = 'auth/c_login/reg_attemp';

$route['auth/users'] = 'auth/c_users';
$route['auth/users/data'] = 'auth/c_users/data';
$route['auth/users/create']['POST'] = 'auth/c_users/create';
$route['auth/users/get']['POST'] = 'auth/c_users/get';
$route['auth/users/update']['POST'] = 'auth/c_users/update';
$route['auth/users/update_image']['POST'] = 'auth/c_users/update_image';
$route['auth/users/delete']['POST'] = 'auth/c_users/delete';
$route['auth/users/password_update']['POST'] = 'auth/c_users/password_update';

$route['auth/roles'] = 'auth/c_roles';
$route['auth/roles/data'] = 'auth/c_roles/data';
$route['auth/roles/create']['POST'] = 'auth/c_roles/create';
$route['auth/roles/get']['POST'] = 'auth/c_roles/get';
$route['auth/roles/update']['POST'] = 'auth/c_roles/update';
$route['auth/roles/delete']['POST'] = 'auth/c_roles/delete';
$route['auth/roles/has_permissions']['POST'] = 'auth/c_roles/has_permissions';
$route['auth/roles/permissions_update']['POST'] = 'auth/c_roles/permissions_update';

$route['auth/permissions'] = 'auth/c_permissions';
$route['auth/permissions/data'] = 'auth/c_permissions/data';
$route['auth/permissions/create']['POST'] = 'auth/c_permissions/create';
$route['auth/permissions/get']['POST'] = 'auth/c_permissions/get';
$route['auth/permissions/update']['POST'] = 'auth/c_permissions/update';
$route['auth/permissions/delete']['POST'] = 'auth/c_permissions/delete';

//data
$route['data/players'] = 'data/c_players';
$route['data/players/data'] = 'data/c_players/data';
$route['data/players/create']['POST'] = 'data/c_players/create';
$route['data/players/get']['POST'] = 'data/c_players/get';
$route['data/players/update']['POST'] = 'data/c_players/update';
$route['data/players/update_image']['POST'] = 'data/c_players/update_image';
$route['data/players/delete']['POST'] = 'data/c_players/delete';

//main

$route['home'] = 'dash/c_home';

$route['profile'] = 'auth/c_profile';
$route['profile/update']['POST'] = 'auth/c_profile/update';
$route['profile/update_password']['POST'] = 'auth/c_profile/update_password';
$route['profile/update_image']['POST'] = 'auth/c_profile/update_image';

$route['game'] = 'dash/c_game';
$route['game/create_round']['POST'] = 'dash/c_game/create_round';
$route['game/member/(:num)'] = 'dash/c_game/member/$1';
$route['game/add_member']['POST'] = 'dash/c_game/add_member';
$route['game/delete_member']['POST'] = 'dash/c_game/delete_member';
$route['game/game_plus']['POST'] = 'dash/c_game/game_plus';
$route['game/game_minus']['POST'] = 'dash/c_game/game_minus';
$route['game/win_plus']['POST'] = 'dash/c_game/win_plus';
$route['game/win_minus']['POST'] = 'dash/c_game/win_minus';
$route['game/point_plus']['POST'] = 'dash/c_game/point_plus';
$route['game/point_minus']['POST'] = 'dash/c_game/point_minus';


// end

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

