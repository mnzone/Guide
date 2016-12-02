<?php

/**
 * 软件产品数据模型
 *
 * Created by PhpStorm.
 * User: Ray
 * Date: 2016/10/23
 * Time: 0:26
 */
class Model_Product extends Model_BaseModel
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'products';

    protected static $_primary_key = array('id');

    /**
     * @var array	defined observers
     */
    protected static $_observers = array(
        'Orm\\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'property' => 'created_at',
            'mysql_timestamp' => false
        ),
        'Orm\\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'property' => 'updated_at',
            'mysql_timestamp' => false
        )
    );

    /**
     * @var array	has_many relationships
     */
    protected static $_has_many = array(
        'locales' => array(
            'model_to' => 'Model_ProductLocale',
            'key_from' => 'id',
            'key_to'   => 'product_id'
        ),
        'downloads' => array(
            'model_to' => 'Model_ProductDownload',
            'key_from' => 'id',
            'key_to'   => 'product_id'
        ),
    );
}