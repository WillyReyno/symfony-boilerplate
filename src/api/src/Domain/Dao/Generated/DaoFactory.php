<?php
/**
 * This file has been automatically generated by TDBM.
 * DO NOT edit this file, as it might be overwritten.
 */

declare(strict_types=1);

namespace App\Domain\Dao\Generated;

/**
 * The DaoFactory provides an easy access to all DAOs generated by TDBM.
 */
class DaoFactory
{

    /**
     * @var \Psr\Container\ContainerInterface
     */
    private $container = null;

    /**
     * @var \App\Domain\Dao\CompanyDao|null
     */
    private $companyDao = null;

    /**
     * @var \App\Domain\Dao\DoctrineMigrationVersionDao|null
     */
    private $doctrineMigrationVersionDao = null;

    /**
     * @var \App\Domain\Dao\OrderDao|null
     */
    private $orderDao = null;

    /**
     * @var \App\Domain\Dao\ProductDao|null
     */
    private $productDao = null;

    /**
     * @var \App\Domain\Dao\ResetPasswordTokenDao|null
     */
    private $resetPasswordTokenDao = null;

    /**
     * @var \App\Domain\Dao\UserDao|null
     */
    private $userDao = null;

    public function __construct(\Psr\Container\ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getCompanyDao() : \App\Domain\Dao\CompanyDao
    {
        if (!$this->companyDao) {
            $this->companyDao = $this->container->get('App\\Domain\\Dao\\CompanyDao');
        }

        return $this->companyDao;
    }

    public function setCompanyDao(\App\Domain\Dao\CompanyDao $companyDao) : void
    {
        $this->companyDao = $companyDao;
    }

    public function getDoctrineMigrationVersionDao() : \App\Domain\Dao\DoctrineMigrationVersionDao
    {
        if (!$this->doctrineMigrationVersionDao) {
            $this->doctrineMigrationVersionDao = $this->container->get('App\\Domain\\Dao\\DoctrineMigrationVersionDao');
        }

        return $this->doctrineMigrationVersionDao;
    }

    public function setDoctrineMigrationVersionDao(\App\Domain\Dao\DoctrineMigrationVersionDao $doctrineMigrationVersionDao) : void
    {
        $this->doctrineMigrationVersionDao = $doctrineMigrationVersionDao;
    }

    public function getOrderDao() : \App\Domain\Dao\OrderDao
    {
        if (!$this->orderDao) {
            $this->orderDao = $this->container->get('App\\Domain\\Dao\\OrderDao');
        }

        return $this->orderDao;
    }

    public function setOrderDao(\App\Domain\Dao\OrderDao $orderDao) : void
    {
        $this->orderDao = $orderDao;
    }

    public function getProductDao() : \App\Domain\Dao\ProductDao
    {
        if (!$this->productDao) {
            $this->productDao = $this->container->get('App\\Domain\\Dao\\ProductDao');
        }

        return $this->productDao;
    }

    public function setProductDao(\App\Domain\Dao\ProductDao $productDao) : void
    {
        $this->productDao = $productDao;
    }

    public function getResetPasswordTokenDao() : \App\Domain\Dao\ResetPasswordTokenDao
    {
        if (!$this->resetPasswordTokenDao) {
            $this->resetPasswordTokenDao = $this->container->get('App\\Domain\\Dao\\ResetPasswordTokenDao');
        }

        return $this->resetPasswordTokenDao;
    }

    public function setResetPasswordTokenDao(\App\Domain\Dao\ResetPasswordTokenDao $resetPasswordTokenDao) : void
    {
        $this->resetPasswordTokenDao = $resetPasswordTokenDao;
    }

    public function getUserDao() : \App\Domain\Dao\UserDao
    {
        if (!$this->userDao) {
            $this->userDao = $this->container->get('App\\Domain\\Dao\\UserDao');
        }

        return $this->userDao;
    }

    public function setUserDao(\App\Domain\Dao\UserDao $userDao) : void
    {
        $this->userDao = $userDao;
    }
}
