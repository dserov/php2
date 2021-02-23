<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 24.02.2021
 * Time: 0:13
 */

class DigitalGood extends Good
{
    /**
     * Финальная стоимость
     * @return float|int
     */
    function finalCost()
    {
        return $this->price * Good::DIGITAL_TO_PIECE_RELATION;
    }
}
