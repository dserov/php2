<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 24.02.2021
 * Time: 0:06
 */

abstract class Good
{
    const DIGITAL_TO_PIECE_RELATION = 0.5;
    const TRADE_MARGIN = 0.1; // доход с продажи

    /**
     * Код товара
     * @var int
     */
    protected $id;

    /**
     * Наименование товара
     * @var string
     */
    protected $name;

    /**
     * Цена товара
     * @var int
     */
    protected $price;

    /**
     * Product constructor.
     * @param int $id
     * @param string $name
     * @param double $price
     */
    public function __construct($id, $name, $price = 0.0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param double $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Финальная стоимость
     * @return mixed
     */
    abstract public function finalCost();

    /**
     * Расчет доходности
     * @return mixed
     */
    public function calcIncome() {
        // нет смысла делать ее абстрактной. $this->finalCost() будет для каждого товара свой
        return self::TRADE_MARGIN * $this->finalCost();
    }
}
