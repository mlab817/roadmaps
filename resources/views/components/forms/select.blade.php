<select {{ $attributes->merge(['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) }}>
    <option value="" @if($selected == '') {{ 'selected' }} @endif>Select one</option>
    @foreach($options as $option)
        <option value="{{ $option->value }}" @if($selected == $option->value) {{ 'selected'  }} @endif>{{ $option->label }}</option>
    @endforeach
</select>
