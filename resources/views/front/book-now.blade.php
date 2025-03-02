@extends('layouts.front')
@section('content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-6 offset-3">
                <p class="text-success fs-5">Your Booking is Avaliable.</p>
            </div>
            <div class="row mt-3">
                <div class="col-3 offset-3">
                    <p>Room</p>
                </div>
                <div class="col-5">
                    <p>: {{$room_names->name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3 offset-3">
                    <p>Qty</p>
                </div>
                <div class="col-3">
                    <p>: {{$qty}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3 offset-3">
                    <p>Price</p>
                </div>
                <div class="col-3">
                    <p>: {{$room_names->price * $qty * $nights}} MMK</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <hr>
                </div>
            </div>
            
            <form action="{{route('bookSuccessful')}}" method="post" enctype="multipart/form-data">  
            @csrf  
                <div class="row">
                    <div class="form-check col-2 offset-3">
                        <input class="form-check-input" type="radio" name="cash" value="cash" id="cashCheckbox">
                        <label class="form-check-label" for="cash">Cash</label>
                    </div>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="transfer" value="transfer" id="transferCheckbox">
                        <label class="form-check-label" for="transfer">Transfer</label>
                    </div>
                </div>
                <div class="row" id="cashBox">
                    <div class="col-6 offset-3 mt-3">
                        <p class="text-success">You can pay by cash, when you check in.</p>
                    </div>
                </div>
                <div class="row" id="transferBox">
                    <div class="col-md-6 mt-3 offset-3 d-inline-block">
                        <label for="payment_method">Payment Method :</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="" select>Choose Payment Method</option>
                            @foreach($payments as $payment)
                                <option value="{{$payment->id}}" data-id="{{$payment->id}}">{{$payment->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mt-3 offset-3 d-inline-block">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="account_no" class="form-label">Account No</label>
                                <select id="account_no" name="account_no" class="form-select">
                                <option value="" select></option>
                                @foreach($payments as $payment)
                                    <option value="{{$payment->id}}" data-id="{{$payment->id}}">{{$payment->acc_name}} - {{$payment->acc_no}}</option>
                                @endforeach
                                </select>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6 mt-3 offset-3 d-inline-block">
                        <label for="payment_slip" >Payment Slip :</label>
                        <input type="file" name="payment_slip" id="payment_slip" class="form-control">
                    </div>
                </div>
                <div>
                    <input type="hidden" name="name" value="{{$name}}">
                    <input type="hidden" name="phone" value="{{$phone}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="adult" value="{{$adult}}">
                    <input type="hidden" name="child" value="{{$child}}">
                    <input type="hidden" name="room" value="{{$room}}">
                    <input type="hidden" name="qty" value="{{$qty}}">
                    <input type="hidden" name="checkin" value="{{$checkin}}">
                    <input type="hidden" name="checkout" value="{{$checkout}}">
                    <input type="hidden" name="message" value="{{$message}}">
                </div>
                <div class="col-6 offset-3 mt-3">
                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection
@section('script')

<script>
    $(document).ready(function(){
        // စက္ကန့်ပိုင်း transferBox နဲ့ cashBox ကို ဖျောက်ထားပါ
        $('#transferBox').hide();
        $('#cashBox').hide();

        // Cash checkbox ကို check လုပ်ရင် cashBox ကိုပြမယ်၊ transferBox ကိုဖျောက်မယ်
        $('#cashCheckbox').change(function() {
            if ($(this).is(':checked')) {
                $('#cashBox').show();
                $('#transferBox').hide();
                $('#transferCheckbox').prop('checked', false);
            } else {
                $('#cashBox').hide();
            }
        });

        // Transfer checkbox ကို check လုပ်ရင် transferBox ကိုပြမယ်၊ cashBox ကိုဖျောက်မယ်
        $('#transferCheckbox').change(function() {
            if ($(this).is(':checked')) {
                $('#transferBox').show();
                $('#cashBox').hide();
                $('#cashCheckbox').prop('checked', false);
            } else {
                $('#transferBox').hide();
            }
        });

        // When an option is selected in the first select
        $('#payment_method').change(function() {
            // Get the selected option's data-id
            var selectedId = $(this).find('option:selected').data('id');

            // Find and select the corresponding option in the second select
            $('#account_no').find('option').each(function() {
                if ($(this).data('id') == selectedId) {
                    $(this).prop('selected', true);
                    return false; // Exit the loop
                }
            });
        });
    })
    
</script>

@endsection