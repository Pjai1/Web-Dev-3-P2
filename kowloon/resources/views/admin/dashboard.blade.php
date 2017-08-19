@extends('layouts.app')

@include('admin.adminnav')
@section('content')
<div class="faq-page">
    <div class="main-content">
        <h1>Dashboard</h1>
        @if ($errors->all())
            <div class="alert alert-warning"><span>Something went wrong, recheck the submission.</span></div>
        @endif
        @if (Session::has('hotitems_update'))
            <div class="alert alert-success successMsg"><span>{{ session('hotitems_update') }}</span></div>
        @endif
            <div class="search-result admin">
                <h3 class="title">Faqs</h3>
                <a href="/admin/faqs">Faqs Dashboard</a>
            </div>

            <div class="search-result admin">
                <h3 class="title">Products</h3>
                <a href="/admin/products">Products Dashboard</a>
            </div>

            <div class="search-result admin">
                <h3 class="title">Hot Items</h3>
                <form action="/admin/hotitems" method="POST">
                    {{ Form::token() }}
                    @foreach ($hotitems as $ht)
                        <div class="admin-hot-items">
                            <h4>Hot Item {{$ht->id}}</h4>
                            <select name="hotitems[]">
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}" {{ ($ht->product->id ? "selected=selected" : "") }}>{{$product-> {LaravelLocalization::getCurrentLocale()."_name"} }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                    <div class="form-group" style="margin-top: 20px;">
                        <input type="submit" class="button" value="Update">
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection