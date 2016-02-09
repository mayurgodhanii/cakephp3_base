<?php
echo "<pre>";
print_r($_REQUEST);
exit;
$data = array();
$data['draw'] = 6;
$data['recordsTotal'] = 57;
$data['recordsFiltered'] = 57;
$data['data'][0][] = 'Tiger';
$data['data'][0][] = 'Nixon';
$data['data'][1][] = 'Tiger';
$data['data'][1][] = 'Nixon';
$data['data'][2][] = 'Tiger';
$data['data'][2][] = 'Nixon';
$data['data'][3][] = 'Tiger';
$data['data'][3][] = 'Nixon';
$data['data'][4][] = 'Tiger';
$data['data'][4][] = 'Nixon';
$data['data'][5][] = 'Tiger';
$data['data'][5][] = 'Nixon';
$data['data'][6][] = 'Tiger';
$data['data'][6][] = 'Nixon';

echo json_encode($data);
exit;
