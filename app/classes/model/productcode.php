<?php

/**
 * 软件产品数据模型
 *
 * Created by PhpStorm.
 * User: Ray
 * Date: 2016/10/23
 * Time: 0:26
 */
class Model_ProductCode extends Model_BaseModel
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'products_codes';

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

    protected static $_belongs_to = array(
        'product' => array(
            'model_to' => 'Model_Product',
            'key_from' => 'product_id',
            'key_to'   => 'id'
        ),
        'category' => array(
            'model_to' => 'Model_ProductCodeCategory',
            'key_from' => 'category_id',
            'key_to'   => 'id'
        )
    );

}