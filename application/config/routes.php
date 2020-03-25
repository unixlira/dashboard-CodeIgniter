<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'alunos';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Routes API Alunos
$route['alunos'] = 'alunos';
$route['alunos/create']['post'] = 'alunos/create';
$route['alunos/view/(:id)'] = 'alunos/view/$1';
$route['alunos/update/(:id)']['put'] = 'alunos/update/$1';
$route['alunos/delete/(:id)'] = 'alunos/delete/$1';
$route['uniformes'] = 'alunos/uniformes';
$route['relatorio'] = 'alunos/exportCsv';

