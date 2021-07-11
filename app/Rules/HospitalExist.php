<?php

namespace App\Rules;

use App\Models\Hospital;
use Illuminate\Contracts\Validation\Rule;

class HospitalExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $hospital = Hospital::where('name',$value)->get();
        $return = $hospital->count() ? true : false;

        return $return;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute entered does not exist';
    }
}
