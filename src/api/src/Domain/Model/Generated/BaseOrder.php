<?php
/**
 * This file has been automatically generated by TDBM.
 *
 * DO NOT edit this file, as it might be overwritten.
 * If you need to perform changes, edit the Order class instead!
 */

declare(strict_types=1);

namespace App\Domain\Model\Generated;

use App\Domain\Model\User;
use App\Domain\Model\Product;
use TheCodingMachine\TDBM\AbstractTDBMObject;
use TheCodingMachine\TDBM\ResultIterator;
use TheCodingMachine\TDBM\AlterableResultIterator;
use Ramsey\Uuid\Uuid;
use JsonSerializable;
use TheCodingMachine\TDBM\Schema\ForeignKeys;
use TheCodingMachine\GraphQLite\Annotations\Field as GraphqlField;

/**
 * The BaseOrder class maps the 'orders' table in database.
 */
abstract class BaseOrder extends \TheCodingMachine\TDBM\AbstractTDBMObject implements JsonSerializable
{

    /**
     * @var \TheCodingMachine\TDBM\Schema\ForeignKeys
     */
    private static $foreignKeys = null;

    /**
     * The constructor takes all compulsory arguments.
     *
     * @param \App\Domain\Model\User $user
     * @param \App\Domain\Model\Product $product
     * @param int $quantity
     * @param float $unitPrice
     */
    public function __construct(\App\Domain\Model\User $user, \App\Domain\Model\Product $product, int $quantity, float $unitPrice)
    {
        parent::__construct();
        $this->setUser($user);
        $this->setProduct($product);
        $this->setQuantity($quantity);
        $this->setUnitPrice($unitPrice);
        $this->setId(Uuid::uuid1()->toString());
        $this->setInvoice('tmp');
    }

    /**
     * The getter for the "id" column.
     *
     * @return string
     * @GraphqlField (outputType = "ID")
     */
    public function getId() : string
    {
        return $this->get('id', 'orders');
    }

    /**
     * The setter for the "id" column.
     *
     * @param string $id
     */
    public function setId(string $id) : void
    {
        $this->set('id', $id, 'orders');
    }

    /**
     * Returns the User object bound to this object via the user_id column.
     *
     * @GraphqlField
     */
    public function getUser() : \App\Domain\Model\User
    {
        return $this->getRef('from__user_id__to__table__users__columns__id', 'orders');
    }

    /**
     * The setter for the User object bound to this object via the user_id column.
     */
    public function setUser(\App\Domain\Model\User $object) : void
    {
        $this->setRef('from__user_id__to__table__users__columns__id', $object, 'orders');
    }

    /**
     * Returns the Product object bound to this object via the product_id column.
     *
     * @GraphqlField
     */
    public function getProduct() : \App\Domain\Model\Product
    {
        return $this->getRef('from__product_id__to__table__products__columns__id', 'orders');
    }

    /**
     * The setter for the Product object bound to this object via the product_id
     * column.
     */
    public function setProduct(\App\Domain\Model\Product $object) : void
    {
        $this->setRef('from__product_id__to__table__products__columns__id', $object, 'orders');
    }

    /**
     * The getter for the "quantity" column.
     *
     * @return int
     * @GraphqlField
     */
    public function getQuantity() : int
    {
        return $this->get('quantity', 'orders');
    }

    /**
     * The setter for the "quantity" column.
     *
     * @param int $quantity
     */
    public function setQuantity(int $quantity) : void
    {
        $this->set('quantity', $quantity, 'orders');
    }

    /**
     * The getter for the "unit_price" column.
     *
     * @return float
     * @GraphqlField
     */
    public function getUnitPrice() : float
    {
        return $this->get('unit_price', 'orders');
    }

    /**
     * The setter for the "unit_price" column.
     *
     * @param float $unitPrice
     */
    public function setUnitPrice(float $unitPrice) : void
    {
        $this->set('unit_price', $unitPrice, 'orders');
    }

    /**
     * The getter for the "invoice" column.
     *
     * @return string
     */
    public function getInvoice() : string
    {
        return $this->get('invoice', 'orders');
    }

    /**
     * The setter for the "invoice" column.
     *
     * @param string $invoice
     */
    public function setInvoice(string $invoice) : void
    {
        $this->set('invoice', $invoice, 'orders');
    }

    /**
     * Internal method used to retrieve the list of foreign keys attached to this bean.
     */
    protected static function getForeignKeys(string $tableName) : \TheCodingMachine\TDBM\Schema\ForeignKeys
    {
        if ($tableName === 'orders') {
            if (self::$foreignKeys === null) {
                self::$foreignKeys = new ForeignKeys([
                    'from__product_id__to__table__products__columns__id' => [
                        'foreignTable' => 'products',
                        'localColumns' => [
                            'product_id'
                        ],
                        'foreignColumns' => [
                            'id'
                        ]
                    ],
                    'from__user_id__to__table__users__columns__id' => [
                        'foreignTable' => 'users',
                        'localColumns' => [
                            'user_id'
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
            $array['user'] = ['id' => $this->getUser()->getId()];
        } else {
            $array['user'] = $this->getUser()->jsonSerialize(true);
        }
        if ($stopRecursion) {
            $array['product'] = ['id' => $this->getProduct()->getId()];
        } else {
            $array['product'] = $this->getProduct()->jsonSerialize(true);
        }
        $array['quantity'] = $this->getQuantity();
        $array['unitPrice'] = $this->getUnitPrice();
        $array['invoice'] = $this->getInvoice();
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
        return [ 'orders' ];
    }

    /**
     * Method called when the bean is removed from database.
     */
    public function onDelete() : void
    {
        parent::onDelete();
        $this->setRef('from__user_id__to__table__users__columns__id', null, 'orders');
        $this->setRef('from__product_id__to__table__products__columns__id', null, 'orders');
    }

    public function __clone()
    {
        parent::__clone();
        $this->setId(Uuid::uuid1()->toString());
    }
}
