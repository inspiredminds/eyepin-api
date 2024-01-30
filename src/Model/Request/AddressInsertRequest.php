<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi\Model\Request;

use InspiredMinds\EyepinApi\Model\AddressList;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\SerializedPath;

final class AddressInsertRequest
{
    #[SerializedName('@key')]
    public string $key = 'email';

    #[SerializedName('@save-empty-fields')]
    public bool $saveEmptyFields = false;

    #[SerializedName('@overrule-blacklist')]
    public bool $overruleBlacklist = false;

    public string $email;

    public string $salutation;

    public string $salutationtext;

    public string $title;

    public string $firstname;

    public string $lastname;

    public string $street;

    public string $zip;

    public string $city;

    public string $country;

    public string $phone;

    public string $fax;

    public string $mobile;

    public string $internet;

    public string $company;

    public string $function;

    public string $attribute1;

    public string $attribute2;

    public string $attribute3;

    public string $attribute4;

    public string $attribute5;

    public string $attribute6;

    public string $attribute7;

    public string $attribute8;

    public string $attribute9;

    public string $attribute10;

    public string $attribute11;

    public string $attribute12;

    public string $attribute13;

    public string $attribute14;

    public string $attribute15;

    public string $attribute16;

    public string $attribute17;

    public string $attribute18;

    public string $attribute19;

    public string $attribute20;

    public string $language;

    public string $newsletterformat;

    public string $status;

    public string $datesignin;

    public string $typesignin;

    public string $datesignout;

    public string $typesignout;

    /**
     * @var list<AddressList>
     */
    #[SerializedPath('[lists][list]')]
    public array $lists;

    public string $handleoptin;

    public string $handleoptout;

    public string $accountmanagerid;

    /**
     * @param array<string, mixed> $data
     */
    public function setData(array $data): self
    {
        foreach ($data as $k => $v) {
            try {
                $this->{$k} = $v;
            } catch (\Throwable) {
                // noop
            }
        }

        return $this;
    }
}
