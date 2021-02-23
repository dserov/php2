<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 24.02.2021
 * Time: 0:16
 */

class WeigthGood extends Good
{
    /**
     * Вес в килограммах
     * @var float
     */
    protected $weigth;

    /**
     * Финальная стоимость
     * @return float|int
     */
    function finalCost()
    {
        return $this->weigth * $this->price;
    }

    /**
     * @return float
     */
    public function getWeigth(): float
    {
        return $this->weigth;
    }

    /**
     * @param float $weigth
     */
    public function setWeigth(float $weigth): void
    {
        $this->weigth = $weigth;
    }
}