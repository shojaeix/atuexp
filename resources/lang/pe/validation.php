<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'between'              => [
        'numeric' => 'مقدار :attribute باید بین  :min و :max باشد.',
        'file'    => 'فایل
         :attribute
           باید بین 
            :min و :max کیلوبایت باشد.',
        'string'  => ':attribute حداقل :min و حداکثر :max حرف باشد.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'date'                 => 'مقدار
     :attribute نامعتبر است.',
    'date_format'          => 'ساختار
     :attribute با ساختار مشخص شده همخوانی ندارد (:format).',
    'digits'               => 'مقدار 
    :attribute باید :digits عدد باشد.',
    'digits_between'       => 'مقدار :attribute 
     باید بین 
     :min و :max عدد باشد.',
    'email'                => 'ایمیل وارد شده در :attribute نامعتبر است.',
    'file'                 => ' :attribute باید یک فایل باشد.',
    'gt'                   => [
        'numeric' => 'مقدار 
         :attribute باید بیشتر از :value باشد.',
    ],
    'in'                   => 'مقدار انتخاب شده برای 
    :attribute نامعتبر است.',
    'in_array'             => 'مقدار
     :attribute در لیست مقادیر مجاز (:other) وجود ندارد.',
    'integer'              => 'مقدار
     :attribute باید عدد باشد.',
    'lt'                   => [
        'numeric' => 'مقدار
         :attribute باید کمتر از :value باشد.',
    ],
    'lte'                  => [
        'numeric' => 'مقدار
         :attribute باید کمتر یا مساوی با  :value باشد.',
    ],
    'max'                  => [
        'numeric' => 'مقدار
         :attribute نمیتواند از :max بیشتر باشد.',
    ],
    'min'                  => [
        'numeric' => 'مقدار
         :attribute باید حداقل  :min باشد.',
        'string'  => 'طول
         :attribute نمیتواند کمتر از :min حرف باشد.',
    ],
    'numeric'              => 'مقدار:attribute باید عددی باشد.',
    'required'             => 'وارد کردن :attribute الزامی است.',
    'size'                 => [
        'numeric' => 'مقدار
         :attribute باید :size باشد.',
        'string'  => ':attribute باید :size حرف باشد.',
    ],
    'string'               => 'مقدار :attribute باید یک رشته باشد.',
    'unique'               => ':attribute وارد شده تکراری است.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'post_code' => 'کد پستی',
        'email' => 'ایمیل',
        'address' => 'آدرس',
        'phone' => 'شماره تلفن',
        'title' => 'عنوان',
        'full_name' => 'نام و نام خانوادگی',
        'image' => 'تصویر',
        'birth_date' => 'تاریخ تولد',
        'national_code' => 'کد ملی',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'grade' => 'مقطع تحصیلی',
        'major' => 'رشته تحصیلی',
    ],
];