@component('mail::message')
# News

Your blog has been posted!

Thank you!

#Section 2

Here's the message for this section

@component('mail::promotion')
This is the promotion component
@endcomponent

@component('mail::subcopy')
This is the subcopy component
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8000/blog'])
View Blogs
@endcomponent

@component('mail::panel', ['url' => ''])
This is the panel component.
@endcomponent

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@component('mail::footer')
Here is some footer shit
@endcomponent

@endcomponent
