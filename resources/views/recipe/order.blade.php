@extends('layout.items')
@section('title','Order Food')
@section('banner')
    <!-- Bannner section starts -->
    <section class="banner page-banner position-relative pb-0">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="page-title text-center position-relative py-11">
                <h2 class="text-white">Order Food</h2>
            </div>
        </div>
    </section>
    <!--Banner Section end-->

    <!--Book now Section start-->
    <section class="ticket-booking">
        <div class="container">
            <div class="booking-form w-lg-75 m-auto px-2">
                <div class="form-title mb-4">
                    <h2 class="mb-2"><span class="pink"></span> Order Food</h2>
                    <p>Order your food right here !!!</p>
                </div>
                <div class="form-content">
                    <form id="booking-form">
                        <div class="name-email">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="name">
                                        <label for="full-name" class="mb-2">Full Name:</label>
                                        <input type="text" placeholder="Full Name" id="full-name" class="py-4 mb-4" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="name">
                                        <label for="email" class="mb-2">Email:</label>
                                        <input type="email" placeholder="Email Address" id="email" class="py-4 mb-4" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="phone-address">
                            <div class="row justify-content-around">
                                <div class="col-lg-6 col-md-6">
                                    <div class="phone-no">
                                        <label for="phone" class="mb-2">Phone No:</label>
                                        <input type="tel" placeholder="Phone No." id="phone" class="py-4 mb-4" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="address">
                                        <label for="address" class="mb-2">Address:</label>
                                        <input type="text" placeholder="Address" id="address" class="py-4 mb-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-date-textarea">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="event-list">
                                        <label for="event-list" class="mb-2 mb-4">Food</label>
                                        <select id="event-list" class="py-4 mb-4" required>
                                            <option value="">--Please choose a preferred event--</option>
                                            @foreach($recipe as $lists)
                                                <option value="{{$lists->id}}" data-price="{{$lists->price}}">{{$lists->food_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="quantity">
                                        <label for="quantity" class="mb-2">Quantity:</label>
                                        <input type="number" id="quantity" name="quantity" min="1" class="py-4 mb-4" required>
                                    </div>
                                    <div class="total-price">
                                        <label for="total" class="mb-2">Total Price:</label>
                                        <input type="text" id="total" class="py-4 mb-4" readonly>
                                    </div>
                                    <div class="event-date">
                                        <label for="event-date" class="mb-2">Day Order:</label>
                                        <input type="date" id="event-date" name="eventdate" class="py-4 mb-4" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="textarea">
                                        <textarea placeholder="Any message you want to add?" class="py-4" rows="10" id="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn" id="sub-btn">Book Now</button>
                    </form>
                </div>
                <script src="{{asset('js/order.js')}}"></script>
            </div>
        </div>
    </section>
    <!--Book now Section end-->
@endsection

