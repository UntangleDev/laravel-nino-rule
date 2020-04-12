<?php

namespace UntangleDev\LaravelNinoRule;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;

class NationalInsuranceNumber implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return (bool) preg_match($this->regex(), $value);
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return Lang::trans('laravel-nino-rule::messages.nino');
    }

    /**
     * @return string
     */
    protected function regex(): string
    {
        return '/^\s*[a-zA-Z]{2}(?:\s*\d\s*){6}[a-zA-Z]?\s*$/';
    }
}
