<?php

use Livewire\Component;

new class extends Component
{
  public int $count = 0;

  public string $name = 'sharif';

  public function increment(){
    $this->count++;
  }
  public function decrement(){
   $this->count = max(0,$this->count - 1);

  }

  public function bariyedao(){

    $this->count +=10;
  }

  public function namporiborton (){
    $this->name ='nurmoni';
  }


};
?>

<div style="max-width: 560px; margin: 32px auto; font-family:system-ui; padding: :16px; border:1px solid #eee;border-radius:12px;">

<h2 style="margin: 0 0 8px">লাইভওয়ার কাউনটার⚡</h2>
<p style="font-size:18px;margin:0 0 16px;">
    Count:<strong style="font-size: 22px;">{{ $count }}</strong>
</p>
{{ $name }}

<button type="button" wire:click="increment">+বাড়াও</button>
<button type="button" wire:click="decrement" style="margin-left:8px">-কমাও</button>
<button type="button" wire:click="bariyedao">+10 বাড়াও</button>
<button type="button" wire:click="namporiborton">নাম পরিবর্তন কর</button>
<p style="opacity:.7; margin-top:16px ;">
    মজা:এটা সেই কাউনটার-যেটা "বসে আছে" তবু কাজ করে</p>
</div>

