<h2>Booking Confirmation</h2>
<p>Dear {{ auth()->user()->name}}</p>
<p>We are pleased to inform you that your booking has been successfully completed. Below are the details of your booking:</p>

<p><strong>Here is your booking link</strong> {{ route('bookings.show', $booking->id) }}</p>

<p><strong>Booking ID:</strong>{{ $booking->id }}</p>
<p><strong>Start Date:</strong> {{ $booking->start_date }}</p>
<p><strong>End Date:</strong> {{ $booking->end_date }}</p>
<p><strong>Amount:</strong> {{ $booking->amount }}</p>
<p><strong>Duration:</strong> {{ $booking->duration }} days</p>

<img src="{{ asset($car->img_url) }}" style="max-width: 100px;">

<p>Thank you for choosing our service. If you have any questions or need further assistance, please feel free to contact us.</p>

<p>Best regards,<br>Your Booking Team</p>