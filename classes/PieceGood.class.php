<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 24.02.2021
 * Time: 0:08
 */

class PieceGood extends Good
{
    protected $quantity;

    /**
     * Финальная стоимость
     * @return float|int|mixed
     */
    function finalCost()
    {
        return $this->quantity * $this->price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }
}
