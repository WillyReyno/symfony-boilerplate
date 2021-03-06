<?php
/**
 * This file has been automatically generated by TDBM.
 *
 * DO NOT edit this file, as it might be overwritten.
 * If you need to perform changes, edit the Product class instead!
 */

declare(strict_types=1);

namespace App\Domain\Model\Generated;

use App\Domain\Model\Company;
use App\Domain\Model\Order;
use TheCodingMachine\TDBM\AbstractTDBMObject;
use TheCodingMachine\TDBM\ResultIterator;
use TheCodingMachine\TDBM\AlterableResultIterator;
use Ramsey\Uuid\Uuid;
use JsonSerializable;
use TheCodingMachine\TDBM\Schema\ForeignKeys;
use TheCodingMachine\GraphQLite\Annotations\Field as GraphqlField;

/**
 * The BaseProduct class maps the 'products' table in database.
 */
abstract class BaseProduct extends \TheCodingMachine\TDBM\AbstractTDBMObject implements JsonSerializable
{

    /**
     * @var \TheCodingMachine\TDBM\Schema\ForeignKeys
     */
    private static $foreignKeys = null;

    /**
     * The constructor takes all compulsory arguments.
     *
     * @param \App\Domain\Model\Company $company
     * @param string $name
     * @param float $price
     */
    public function __construct(\App\Domain\Model\Company $company, string $name, float $price)
    {
        parent::__construct();
        $this->setCompany($company);
        $this->setName($name);
        $this->setPrice($price);
        $this->setId(Uuid::uuid1()->toString());
    }

    /**
     * The getter for the "id" column.
     *
     * @return string
     * @GraphqlField (outputType = "ID")
     */
    public function getId() : string
    {
        return $this->get('id', 'products');
    }

    /**
     * The setter for the "id" column.
     *
     * @param string $id
     */
    public function setId(string $id) : void
    {
        $this->set('id', $id, 'products');
    }

    /**
     * Returns the Company object bound to this object via the company_id column.
     *
     * @GraphqlField
     */
    public function getCompany() : \App\Domain\Model\Company
    {
        return $this->getRef('from__company_id__to__table__companies__columns__id', 'products');
    }

    /**
     * The setter for the Company object bound to this object via the company_id
     * column.
     */
    public function setCompany(\App\Domain\Model\Company $object) : void
    {
        $this->setRef('from__company_id__to__table__companies__columns__id', $object, 'products');
    }

    /**
     * The getter for the "name" column.
     *
     * @return string
     * @GraphqlField
     */
    public function getName() : string
    {
        return $this->get('name', 'products');
    }

    /**
     * The setter for the "name" column.
     *
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->set('name', $name, 'products');
    }

    /**
     * The getter for the "price" column.
     *
     * @return float
     * @GraphqlField
     */
    public function getPrice() : float
    {
        return $this->get('price', 'products');
    }

    /**
     * The setter for the "price" column.
     *
     * @param float $price
     */
    public function setPrice(float $price) : void
    {
        $this->set('price', $price, 'products');
    }

    /**
     * The getter for the "pictures" column.
     *
     * @return array|null
     * @GraphqlField
     */
    public function getPictures() : ?array
    {
        return $this->get('pictures', 'products');
    }

    /**
     * The setter for the "pictures" column.
     *
     * @param array|null $pictures
     */
    public function setPictures(?array $pictures) : void
    {
        $this->set('pictures', $pictures, 'products');
    }

    /**
     * Returns the list of Order pointing to this bean via the product_id column.
     *
     * @return Order[]|\TheCodingMachine\TDBM\AlterableResultIterator
     * @GraphqlField
     */
    public function getOrders() : \TheCodingMachine\TDBM\AlterableResultIterator
    {
        return $this->retrieveManyToOneRelationshipsStorage('orders', 'from__product_id__to__table__products__columns__id', ['orders.product_id' => $this->get('id', 'products')]);
    }

    /**
     * Internal method used to retrieve the list of foreign keys attached to this bean.
     */
    protected static function getForeignKeys(string $tableName) : \TheCodingMachine\TDBM\Schema\ForeignKeys
    {
        if ($tableName === 'products') {
            if (self::$foreignKeys === null) {
                self::$foreignKeys = new ForeignKeys([
                    'from__company_id__to__table__companies__columns__id' => [
                        'foreignTable' => 'companies',
                        'localColumns' => [
                            'company_id'
                        ],
                        'foreignColumns' => [
                            'id'
                        ]
                    ]
                ]);
            }
            return self::$foreignKeys;
        }
        return parent::getForeignKeys($tableName);
    }

    /**
     * Serializes the object for JSON encoding.
     *
     * @param bool $stopRecursion Parameter used internally by TDBM to stop embedded
     * objects from embedding other objects.
     * @return array
     */
    public function jsonSerialize(bool $stopRecursion = false)
    {
        $array = [];
        $array['id'] = $this->getId();
        if ($stopRecursion) {
            $array['company'] = ['id' => $this->getCompany()->getId()];
        } else {
            $array['company'] = $this->getCompany()->jsonSerialize(true);
        }
        $array['name'] = $this->getName();
        $array['price'] = $this->getPrice();
        $array['pictures'] = $this->getPictures();
        return $array;
    }

    /**
     * Returns an array of used tables by this bean (from parent to child
     * relationship).
     *
     * @return string[]
     */
    public function getUsedTables() : array
    {
        return [ 'products' ];
    }

    /**
     * Method called when the bean is removed from database.
     */
    public function onDelete() : void
    {
        parent::onDelete();
        $this->setRef('from__company_id__to__table__companies__columns__id', null, 'products');
    }

    public function __clone()
    {
        parent::__clone();
        $this->setId(Uuid::uuid1()->toString());
    }
}
