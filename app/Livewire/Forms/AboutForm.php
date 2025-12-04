<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AboutForm extends Form
{
    public $aboutId, $image, $established, $location, $players, $fans, $contact, $years, $description;

    public function rules()
    {
        return [

            'image' => $this->aboutId ? 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'established' => 'required|date',
            'location' => 'required|string|max:100',
            'players' => 'required|numeric|min:0',
            'fans' => 'required|numeric|min:0',
            'contact' => 'required|numeric|digits_between:6,11',
            'years' => 'required|numeric|min:0',
            'description' => 'required|string|max:4000',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only jpeg, png, or jpg images are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',

            'established.required' => 'Established field is required.',
            'established.date' => 'Please provide a valid date format.',

            'location.required' => 'Please enter the location.',
            'location.string' => 'Location must be a valid string.',
            'location.max' => 'Location cannot exceed 100 characters.',

            'players.required' => 'Please enter the number of players.',
            'players.numeric' => 'Players must be a numeric value.',
            'players.min' => 'Players cannot be less than 0.',

            'fans.required' => 'Please enter the number of fans.',
            'fans.numeric' => 'Fans must be a numeric value.',
            'fans.min' => 'Fans cannot be less than 0.',

            'contact.required' => 'Contact field is required.',
            'contact.numeric' => 'Contact must be a numeric value.',
            'contact.digits_between' => 'Contact number must be between 6 and 11 digits.',

            'years.required' => 'Year field is required.',
            'years.numeric' => 'Year must be a numeric value.',
            'years.min' => 'Year cannot be less than 0.',

            'description.required' => 'Description field is required.',
            'description.string' => 'Description must be text.',
            'description.max' => 'Description cannot exceed 4000 characters.',
        ];
    }
}
