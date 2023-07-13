<?php

namespace App\Models\Traits;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

trait MobileNumberTrait
{
    public function setFullMobileNumber()
    {
        if (!$mobileNumber = $this->phone_number) {
            return;
        }

        if (!$iso = $this->mobile_number_country) {
            return;
        }

        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $phoneNumber = $phoneUtil
                ->parse(
                    $mobileNumber,
                    $iso
                );

            $this->phone_number = $phoneUtil
                ->format(
                    $phoneNumber,
                    PhoneNumberFormat::E164
                );
        } catch (NumberParseException $e) {
            return false;
        }
    }

    /**
     * Formats the user's phoneNumber
     *
     * @return string
     */
    public function getPhoneNumberNationalAttribute()
    {
        if (!$this->phone_number) {
            return false;
        }

        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $phoneNumber = $phoneUtil->parse($this->phone_number, $this->mobile_number_country);

            return $phoneUtil->format($phoneNumber, PhoneNumberFormat::NATIONAL);
        } catch (NumberParseException $e) {
            return trans('form.invalid_number', ['number' => $this->phone_number]);
        }
    }
}
