@extends('admin.layout')

@section('content')
    <table class="table table-bordered">
        <colgroup>
            <col width="50px">
            <col>
            <col width="150px">
            <col width="180px">
            <col width="70px">
        </colgroup>
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Last updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $product)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('admin.products.edit', $product) }}">{{ $product->id }}</a>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->updated_at->format('Y-m-d h:i:s') }}</td>
                    <td>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->links() !!}
@endsection
