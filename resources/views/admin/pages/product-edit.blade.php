@extends('admin.layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif
    <form action="{{ $product->id ? route('admin.products.update', $product) : route('admin.products.store') }}"
        method="post">
        @csrf
        @method($product->id ? 'PUT' : 'POST')
        @include('admin.partials.input', ['name' => 'name', 'label' => 'Name', 'value' => $product->name])
        @include('admin.partials.input', ['name' => 'slug', 'label' => 'Slug', 'value' => $product->slug])
        @include('admin.partials.input', [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'value' => $product->price,
        ])
        @include('admin.partials.textarea', [
            'name' => 'description',
            'label' => 'Description',
            'value' => $product->description,
        ])
        @php($branch_id = old('branch_id', $product->branch_id))
        @foreach ($branches as $branch)
            <div class="form-check">
                <input class="form-check-input" type="radio" value="{{ $branch->id }}" id="branch-{{ $branch->id }}"
                    name="branch_id" @if ($branch_id === $branch->id) checked @endif>
                <label class="form-check-label" for="branch-{{ $branch->id }}">{{ $branch->name }}</label>
            </div>
        @endforeach
        <div class="mt-3">
            @include('admin.partials.input', [
                'name' => 'images[]',
                'label' => 'Image 1',
                'value' => $product->images[0],
            ])
            @include('admin.partials.input', [
                'name' => 'images[]',
                'label' => 'Image 2',
                'value' => $product->images[1],
            ])
            @include('admin.partials.input', [
                'name' => 'images[]',
                'label' => 'Image 3',
                'value' => $product->images[2],
            ])
            @include('admin.partials.input', [
                'name' => 'images[]',
                'label' => 'Image 4',
                'value' => $product->images[3],
            ])
        </div>
        <button class="btn btn-primary mt-3" type="submit">Save</button>
    </form>
@endsection
