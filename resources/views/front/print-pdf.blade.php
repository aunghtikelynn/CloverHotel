<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .data {
            padding-left: 180px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row ">
        <div class="col-12">
            <p style="">Booking Confirmation</p>
            <p style="color: green">Your Booking has been Confirmed</p>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <table cellpadding="15">
            <tbody>
                <tr>
                    <td style="font-size: 20px">Booking No</td>
                    <td class="data" style="font-size: 20px">: {{$name}}</td>
                </tr>
                <tr>
                    <td>Guest Name</td>
                    <td class="data">: {{$booking_no}}</td>
                </tr>
                <tr>
                    <td>Number of Adults (>13 Yrs)</td>
                    <td class="data">: {{$adult}}</td>
                </tr>
                <tr>
                    <td>Number of Childs</td>
                    <td class="data">: {{$child}}</td>
                </tr>
                <tr>
                    <td>Check-in Date</td>
                    <td class="data">: {{$check_in}}</td>
                </tr>
                <tr>
                    <td>Check-out Date</td>
                    <td class="data">: {{$check_out}}</td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td class="data">: {{$qty}}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td class="data">: {{$total}}</td>
                </tr>
                <tr>
                    <td>Option</td>
                    <td class="data">
                        @if($payment_type == 'transfer')
                            : Paid 
                        @else
                            : No Paid 
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 20px">Hotel Name</td>
                    <td class="data" style="font-size: 20px">: Clover Hotel</td>
                </tr>
                <tr>
                    <td>Hotel Address</td>
                    <td class="data">: 123 Street, New York, USA</td>
                </tr>
                <tr>
                    <td>Room</td>
                    <td class="data">: {{$room->name}}</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td class="data">: {{$type->name}}</td>
                </tr>
                <tr>
                    <td>Check-in Time</td>
                    <td class="data">: After 14:00 on the check-in date</td>
                </tr>
                <tr>
                    <td>Check-out Time</td>
                    <td class="data">: Before 12:00 on the check-out date</td>
                </tr>
                <tr>
                    <td>Services</td>
                    <td class="data">: {{$type->service}}</td>
                </tr>
                <tr>
                    <td>Meals</td>
                    <td class="data">: Breakfast Included</td>
                </tr>
            </tbody>
        </table>
        
        
        
    </div>
</div>
</body>
</html>