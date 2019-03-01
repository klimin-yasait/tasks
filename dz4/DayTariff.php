<?php

class DayTariff extends AbstractТariff
{
    protected $result;
    protected $days;
    protected $dayPrice = 1000;
    protected $kmPrice = 1;

    public function dayCalculate($km, $time)
    {
        $km = (int)$km;
        $time = (int)$time;
        if ($time != 0) {
            if (($time % 1440) > 30) {
                $this->days = ceil($time / 1440);
            } else {
                $this->days = floor($time / 1440);
            }
            $this->result = ($this->days * $this->dayPrice) + ($km * $this->kmPrice) * $this->increaser; // (60 мин * 24 часа) + 30 мни
        } else {
            $this->result = 0;
        }
    }

    public function getDayCalculate()
    {
        return $this->result;
    }
}