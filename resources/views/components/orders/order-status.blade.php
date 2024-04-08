@props(['status'])


@php
$text = null;
$classes = null;

if($status == 'pending') {
    $text = "Pending";
    $classes = 'inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600';
} else if($status == 'accepted') {
    $text = "Accepted";
    $classes = 'inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-600';
} else if($status == 'rejected') {
    $text = "Rejected";
    $classes = 'inline-flex items-center rounded-md bg-orange-100 px-2 py-1 text-xs font-medium text-orange-600';
} else if($status == 'pending_delivery') {
    $text = "Pending Delivery";
    $classes = 'inline-flex items-center rounded-md bg-indigo-100 px-2 py-1 text-xs font-medium text-indigo-600';
} else if($status == 'delivered') {
    $text = "Delivered";
    $classes = 'inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-600';
} else if($status == 'failed') {
    $text = "Fail";
    $classes = 'inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-600';
} else {
    $text = "Error";
    $classes = 'inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600';
}

@endphp


<span {{ $attributes->merge(['class' => $classes]) }}>
    {{$text}}
</span>