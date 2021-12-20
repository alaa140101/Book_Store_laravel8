@if ($errors->any())
    <div {{ $attributes }} dir="rtl" style="text-align: right">
        <div class="font-medium text-red-600">{{ __('يوجد خطأ اصلحه وحاول مره أخرى') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
