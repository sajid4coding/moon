<div>
    <div class="row">
        @if ($size_button_visibility == TRUE)
            <div class="col col-md-6">
                <div class="select_option clearfix" wire:model="size_button_visibility">
                    <h4 class="input_title">Size *</h4>
                    <select class="form-select" wire:model="selectsize">
                        <option data-display="- Please select -">Choose A Size</option>
                        @foreach ($selectinventories as $selectinventory)
                            <option value="{{ $selectinventory->relationwithsize->id }}">{{ $selectinventory->relationwithsize->size }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
        @if ($colors)
            <div class="col col-md-6">
                <div class="select_option clearfix">
                    <h4 class="input_title">Color *</h4>
                    <select class="form-select" wire:model="selectcolor">
                        <option data-display="- Please select -" selected>Choose A Color</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->relationwithcolor->color_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
        <div class="quantity_wrap {{ $card_button_visibility }}">
            <div class="quantity_input">
                <button wire:click="decrement" class="input_number_decrement"><i class="fal fa-minus"></i></button>
                    <input class="input_number" type="number" value="{{ $count }}">
                <button wire:click="increment" class="input_number_increment"><i class="fal fa-plus"></i></button>
            </div>
            @if ($unit_price)
                <div class="total_price">Total: {{ $unit_price }}</div>
            @else
                <div class="total_price">Total: {{ $total_price }}</div>
            @endif
        </div>

        <ul class="default_btns_group ul_li {{ $card_button_visibility }}">
            @auth
                <li><a class="btn btn_primary addtocart_btn" wire:click="addtocartbtn">Add To Cart</a></li>
            @else
                <li><a class="btn btn_primary addtocart_btn" id='not_logged_in' >Add To Cart</a></li>
            @endauth
            <span class="color-danger">Available Stock: {{ $stock }}</span>
        </ul>
    </div>
</div>

@section ('footer_script')
    <script>
        $('document').ready(function(){
            $("#not_logged_in").click(function(){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You Need To Login',
                footer: '<a href="{{ route('customer_register') }}">Login or Registation From Here</a>'
                })
            })
        })
    </script>
@endsection
