@if (count($errors) > 0)
    <div class="alert bg-red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                {{getSet}}
            @endforeach
        </ul>
    </div>
@endif
