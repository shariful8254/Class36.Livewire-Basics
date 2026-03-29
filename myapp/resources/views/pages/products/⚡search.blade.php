<?php

use Livewire\Component;
use App\Models\Product;

new class extends Component
{
    public string $search = '';

    #[Livewire\Attributes\Computed]
    public function results()
    {

     $term = trim($this->search);
     if($term === '' || mb_strlen($term) < 2){
         return collect();
     }
    $safe = addcslashes($term, '%_\\');

    return Product::query()
    ->where('name', 'like', "%{$safe}%")
    ->orderBy('name')
    ->limit(10)
    ->get();

    }
};
?>

<div style="max-width: 760px; margin: 32px auto; font-family: system-ui; padding: 16px; border: 1px solid #eee; border-radius: 12px;">
<h1 style="margin: 0 0 6px">লাইভ সার্চ</h1>
<p style="margin: 0 0 16px; opacity: .75;">
    কমপক্ষে ২ অক্ষর টাইপ কর-তারপর দেখো কিভাবে রেজাল্ট উপডেট হয়।
</p>

<input
    type="text"
    placeholder="Try: phone,chair,book..."
    style="width: 100%; padding: 12px;  border: 1px solid #ccc; border-radius: 10px;"
    wire:model.live.debounce.300ms="search"/>
<div wire:loading  style="margin-top: 10px; opacity: .7; ">
    খুঁজছি... একটু ধৈর্য ধরো!

</div>

<div style="margin-top: 16px">

@if (trim($search) === '' && mb_strlen(trim($search)) < 2)
    <p style="opacity: .75;">আরও ১ টা অক্ষর দাও-তারপর সার্চ শুরু হবে</p>

@endif
@if(mb_strlen(trim($search)) >= 2 )
    <p style="opacity: .75; margin-bottom: 10px;">
       "<strong>{{ $search }}</strong>" এর জন্য Top {{$this-> results->count() }}
         রেজাল্ট:
    </p>

    <ul style="list-style: none; padding: 0;margin:0">
     @forelse( $this->results as $product)
        <li wire:key="product-{{ $product->id }}"
            style="padding:  12px; border: 1px solid #eee; border-radius: 10px;
            margin-bottom: 10px;">
           <div style="font-weight: 700;">{{ $product->name }}</div>

              <div style="opacity: .75; font-size: 14px; margin-top: 4px;">
                Price: ${{ number_format($product->price_cents / 100, 2) }}
                . Stock: {{ $product->stock }}
            </div>

        </li>
       @empty

     <li style="padding: 12px; opacity: 0.75;">
        কিছুই পাওয়া যায়নি-নতুন শব্দ টাই করো!
     </li>
        @endforelse
    </ul>

@endif

</div>



</div>

