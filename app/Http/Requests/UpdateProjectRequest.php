<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'description' => 'required',
            'repository' => 'required',
            'start_date' => 'required',
            'status' => 'required|max:20',
            'image' => 'nullable|image|max:4084',
            'type_id' => 'nullable'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Title is required',
            'title.max' => 'Max characters length is 50',
            'description.required' => 'Description is required',
            'repository.required' => 'Link is required',
            'start_date.required' => 'Start date is required',
            'status.required' => 'Status is required',
            'status.max' => 'Max characters length is 20',
            'image.image' => 'File must be a image',
            'image.max' => 'Image is too big',
        ];
    }
}
