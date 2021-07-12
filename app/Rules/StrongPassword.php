<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StrongPassword implements Rule
{
    private bool $containsUpperCaseLetters = true;

    private bool $containsLowerCaseLetters = true;

    private bool $containsNumbers = true;

    private bool $containsSpecialCharacters = true;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $containsUpperCaseLetters = ((bool) preg_match('/[A-Z]/', $value));
        $containsLowerCaseLetters = ((bool) preg_match('/[a-z]/', $value));
        $containsNumbers = ((bool) preg_match('/[0-9]/', $value));
        $containsSpecialCharacters = ((bool) preg_match('/[^A-Za-z0-9]/', $value));

        return
            $containsUpperCaseLetters &&
            $containsLowerCaseLetters &&
            $containsNumbers &&
            $containsSpecialCharacters;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return match(true) {

            ! $this->containsNumbers &&
            ! $this->containsUpperCaseLetters &&
            ! $this->containsLowerCaseLetters &&
            ! $this->containsSpecialCharacters => 'The :attribute must contain at least one lowercase character, one uppercase character, one number, and one special character.',

            $this->containsNumbers &&
            ! $this->containsUpperCaseLetters &&
            ! $this->containsLowerCaseLetters &&
            ! $this->containsSpecialCharacters => 'The :attribute must contain at least one lowercase character, one uppercase character, and one special character.',


            ! $this->containsNumbers &&
            $this->containsUpperCaseLetters &&
            ! $this->containsLowerCaseLetters &&
            ! $this->containsSpecialCharacters => 'The :attribute must contain at least one lowercase character, and one special character and one number.',

            ! $this->containsNumbers &&
            ! $this->containsUpperCaseLetters &&
            $this->containsLowerCaseLetters &&
            ! $this->containsSpecialCharacters => 'The :attribute must contain at least one uppercase character, and one special character and one number.',

            ! $this->containsNumbers &&
            ! $this->containsUpperCaseLetters &&
            ! $this->containsLowerCaseLetters &&
            $this->containsSpecialCharacters => 'The :attribute must contain at least one lowercase character, one uppercase character and one number.',

            $this->containsNumbers &&
            $this->containsUpperCaseLetters &&
            ! $this->containsLowerCaseLetters &&
            ! $this->containsSpecialCharacters => 'The :attribute must contain at least one lowercase character and one special character.',

            $this->containsNumbers &&
            ! $this->containsUpperCaseLetters &&
            $this->containsLowerCaseLetters &&
            ! $this->containsSpecialCharacters => 'The :attribute must contain at least one uppercase character and one special character.',

            $this->containsNumbers &&
            ! $this->containsUpperCaseLetters &&
            ! $this->containsLowerCaseLetters &&
            $this->containsSpecialCharacters => 'The :attribute must contain at least one uppercase character and one special character.',

            ! $this->containsNumbers &&
            $this->containsUpperCaseLetters &&
            $this->containsLowerCaseLetters &&
            ! $this->containsSpecialCharacters => 'The :attribute must contain at least one special character and one number.',

            ! $this->containsNumbers &&
            $this->containsUpperCaseLetters &&
            ! $this->containsLowerCaseLetters &&
            $this->containsSpecialCharacters => 'The :attribute must contain at least one lowercase character and one number.',

            ! $this->containsNumbers &&
            ! $this->containsUpperCaseLetters &&
            $this->containsLowerCaseLetters &&
            $this->containsSpecialCharacters => 'The :attribute must contain at least one uppercase character and one number.',

            ! $this->containsNumbers &&
            $this->containsUpperCaseLetters &&
            $this->containsLowerCaseLetters &&
            $this->containsSpecialCharacters => 'The :attribute must contain at least one number.',

            $this->containsNumbers &&
            ! $this->containsUpperCaseLetters &&
            $this->containsLowerCaseLetters &&
            $this->containsSpecialCharacters => 'The :attribute must contain at least one uppercase character.',

            $this->containsNumbers &&
            $this->containsUpperCaseLetters &&
            ! $this->containsLowerCaseLetters &&
            $this->containsSpecialCharacters => 'The :attribute must contain at least one lowercase character.',

            $this->containsNumbers &&
            $this->containsUpperCaseLetters &&
            $this->containsLowerCaseLetters &&
            ! $this->containsSpecialCharacters => 'The :attribute must contain at least one special character.',

        };
    }
}
