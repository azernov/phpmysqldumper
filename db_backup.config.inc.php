<?php

$dbase = 'INSERT YOUR DB NAME';
$database_dsn = 'mysql:host=localhost;dbname='.$dbase.';charset=utf8';
$database_user = 'INSERT YOUR DB USER';
$database_password = 'INSERT YOUR DB USER PASSWORD';
$driver_options = [];

return [
    'db_name' => $dbase,
    'db_dsn' => $database_dsn,
    'db_user' => $database_user,
    'db_password' => $database_password,
    'db_options' => $driver_options,

    //Общие параметры подключения
    'options' => [
        '--user='.$database_user,
        '--password='.$database_password,
        '--extended-insert=FALSE',
        '--dump-date=FALSE',
        '--skip-tz-utc',
    ],

    //Параметры для импорта структуры
    'structureOptions' => [
        '--skip-opt',
        '--skip-comments',
        '--add-drop-table', # for add DROP TABLE before CREATE TABLE (p.s. NOT USE —compact!]
        '--create-options', # add current AUTO_INCREMENT and other options
        '--routines', # add stored procedures
        '--triggers', # add triggers
        '--no-data', # skip data
    ],

    //Параметры для импорта данных
    'dataOptions' => [
        '--skip-opt',
        '--skip-comments',
        '--disable-keys', # creating indexes after load data (for acceleration]
        '--replace', # for ignoring double rows and replace existing
        '--skip-triggers',
        '--default-character-set=utf8',
        '--set-charset',
        '--no-create-info', # skip structure
    ],

    //Список таблиц, которые мы игнорируем при экспорте структуры
    'ignoreStructure' => [
        //'site_content',
    ],

    //Список таблиц, которые мы игнорируем при экспорте данных
    'ignoreData' => [
        //'site_authors',
    ]
];