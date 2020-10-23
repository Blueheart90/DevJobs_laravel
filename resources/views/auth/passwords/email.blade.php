@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white border-2 shadow-md mt-20">
                <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">
                    {{ __('Reset Password') }}
                </div>


                <form class="py-10 px-5" method="POST" action="{{ route('password.email') }}" novalidate>
                    @csrf

                    @if(session('status'))
                        <span class="bg-blue-500 border-l-4 border-blue-700 text-white p-4 w-full my-5 block text-sm" role="alert">
                        <svg class="inline-block fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <strong>{{ session('status') }}</strong>
                        </span>
                    @endif
                    <div class="flex flex-wrap mb-6">
                        <label for="email" class="black text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="p-3 bg-gray-200 rounded form-input w-full @error('email') border-red-500 border @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="flex flex-wrap mb-6">

                        <button 
                            type="submit" 
                            class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold"
                        >
                            {{ __('Send Password Reset Link') }}
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
