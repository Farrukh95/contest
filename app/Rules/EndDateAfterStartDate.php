<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EndDateAfterStartDate implements Rule
{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $startDate = request()->input('date_start');
        $endDate = $value;

        $startDate = \Carbon\Carbon::parse($startDate);
        $endDate = \Carbon\Carbon::parse($endDate);

        return $endDate->diffInDays($startDate) >= 6;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return 'Дата окончания должна быть больше даты начала на 6 дней.';
    }
}
