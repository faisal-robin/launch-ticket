<?php
include('header.php');
?>

<section class="abh-breadcrumb-area" style="background-image:url(./assets/img/banner-testimonial.jpg)">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

      <!-- Checkout Page Area Start -->
      <section class="checkout-page-area section_70">
         <div class="container">
             
             <div class="row">
               <div class="col-lg-8">
                  <div class="checkout-left-box">
                     <h3>Passenger Details</h3>
                     <form>
                        <div class="row checkout-form">
                           <div class="col-md-6">
                              <label for="name23">First Name</label>
                              <input type="text" name="firstname" id="name23">
                           </div>
                           <div class="col-md-6">
                              <label for="name22">Last Name</label>
                              <input type="text" name="lastname" id="name22">
                           </div>
                        </div>
                        <div class="row checkout-form">
                           <div class="col-md-12">
                              <label for="addr2">Address</label>
                              <input type="text" name="address" id="addr2">
                           </div>
                        </div>
                        <div class="row checkout-form">
                           <div class="col-md-6">
                              <label for="info2">Email Address *</label>
                              <input type="email" name="info2" id="info2">
                           </div>
                           <div class="col-md-6">
                              <label for="info2">Mobile Number *</label>
                              <input type="text" name="info2" id="info12">
                           </div>
                        </div>
                        <div class="row checkout-form">
                           <div class="col-md-12">
                              <label for="info2">Order Note *</label>
                              <textarea name="ordernote"></textarea>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="order-summury-box color_1">
                     <h3>Journey Details</h3>
                     <table>
                        <tbody>
                           <tr>
                              <td>Dhaka - Barisal</td>
                           </tr>
                           <tr>
                              <td>Manami</td>
                           </tr>
                           <tr>
                              <td>Tue, 29 Dec 2020, 08:00 PM</td>
                           </tr>
                           <tr>
                              <td>Cabin No(s): 353 SA</td>
                           </tr>
                           <tr>
                              <td>Boarding at Sadarghat, 08:00 PM</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="order-summury-box color_3 mt-3">
                     <h3>Fare Details</h3>
                     <table>
                        <tbody>
                           <tr>
                              <td>Ticket Price</td>
                              <td>৳ 1000</td>
                           </tr>
                           <tr>
                              <td>Launch Ticket Fee</td>
                              <td>৳ 50</td>
                           </tr>
                           <tr>
                              <td>Delivery Charge</td>
                              <td>৳ 0</td>
                           </tr>
                           <tr>
                              <td>Discount</td>
                              <td>৳ 0</td>
                           </tr>
                           <tr>
                              <td>Total</td>
                              <td>৳ 1050</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="booking-right">
                     <div class="abh-payment clearfix">
                        <div class="payment">
                           <input type="radio" id="ss-option" name="selector">
                           <label for="ss-option">BKash</label>
                           <div class="check">
                              <div class="inside"></div>
                           </div>
                           <p>Your ticket(s) would be reserved and inactive for 30 minutes from the time of booking. Pay through bKash and confirm your transaction ID within 30 minutes to get the confirmed ticket.</p>
                        </div>
                        <div class="payment">
                           <input type="radio" id="s-option" name="selector">
                           <label for="s-option">Credit Card</label>
                           <div class="check">
                              <div class="inside"></div>
                           </div>
                           <img src="assets/img/master-card.jpg" alt="credit card">
                        </div>
                        
                     </div>
                     <div class="action-btn">
                        <a href="#" class="abh-btn">Proceed to Pay</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Checkout Page Area End -->


<?php include('footer.php'); ?>