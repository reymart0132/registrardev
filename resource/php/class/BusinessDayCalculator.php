<?php

class BusinessDaysCalculator {

    const MONDAY    = 1;
    const TUESDAY   = 2;
    const WEDNESDAY = 3;
    const THURSDAY  = 4;
    const FRIDAY    = 5;
    const SATURDAY  = 6;
    const SUNDAY    = 7;

    /**
     * @param DateTime   $startDate       Date to start calculations from
     * @param DateTime[] $holidays        Array of holidays, holidays are no conisdered business days.
     * @param int[]      $nonBusinessDays Array of days of the week which are not business days.
     */
    public function __construct(DateTime $startDate, array $holidays, array $nonBusinessDays =null) {
        $this->date = $startDate;
        $this->holidays = $holidays;
        $this->nonBusinessDays = $nonBusinessDays;
    }

    public function addBusinessDays($howManyDays) {
        $i = 0;
        while ($i < $howManyDays) {
            $this->date->modify("+1 day");
            if ($this->isBusinessDay($this->date)) {
                $i++;
            }
        }
        return $this->date;
    }

    public function getDate() {
        return $this->date;
    }

    private function isBusinessDay(DateTime $date) {
        if (in_array((int)$date->format('N'), $this->nonBusinessDays)) {
            return false; //Date is a nonBusinessDay.
        }
        foreach ($this->holidays as $day) {
            if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
                return false; //Date is a holiday.
            }
        }
        return true; //Date is a business day.
    }
}
