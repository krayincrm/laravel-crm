@extends('secondarysales::layouts.master')

@section('page_title')
Create Order
@endsection

@section('content')

{{-- create a 2 button  --}}

<div class="flex items-center gap-x-2.5">
    <div class="flex items-center gap-x-2.5">

        Secondary sales index

    </div>
</div>


@endsection


@push('styles')

@endpush


@push('scripts')

<script>
    console.log('create order');

</script>

@endpush
