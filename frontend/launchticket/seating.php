<?php include('header.php'); ?>

<section class="abh-breadcrumb-area">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Cabin</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Cabin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="seats">
    <div class="container">
    <div class="seats-wrapper">
        <p class="div-header-content">Cabin-wise seat availability</p>
        <div class="seat-availability-starts">
            <div class="content-starts">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <p class="div-header-shortnote">Maximum of 2 cabins can be booked per ticket.</p>
                        <table class="price-list">
                            <tr style="background-color: #f97250;">
                                <td width="40%">Cabin Type</td>
                                <td width="10%">Seats</td>
                                <td width="30%">Cabin Fare</td>
                                <td width="20%">Availability</td>
                            </tr>
                            <tr>
                                <td width="40%">Single AC</td>
                                <td width="10%">1</td>
                                <td width="30%">1000</td>
                                <td width="20%">12</td>
                            </tr>
                            <tr>
                                <td width="40%">Single Non AC</td>
                                <td width="10%">1</td>
                                <td width="30%">900</td>
                                <td width="20%">11</td>
                            </tr>
                            <tr>
                                <td width="40%">Double AC</td>
                                <td width="10%">2</td>
                                <td width="30%">1800</td>
                                <td width="20%">5</td>
                            </tr>
                            <tr>
                                <td width="40%">Double Non AC</td>
                                <td width="10%">2</td>
                                <td width="30%">1600</td>
                                <td width="20%">5</td>
                            </tr>
                            <tr>
                                <td width="40%">Family AC</td>
                                <td width="10%">3</td>
                                <td width="30%">2700</td>
                                <td width="20%">5</td>
                            </tr>
                            <tr>
                                <td width="40%">Family Non AC</td>
                                <td width="10%">3</td>
                                <td width="30%">2400</td>
                                <td width="20%">5</td>
                            </tr>
                            <tr>
                                <td width="40%">VIP Single</td>
                                <td width="10%">1</td>
                                <td width="30%">4000</td>
                                <td width="20%">11</td>
                            </tr>
                            <tr>
                                <td width="40%">VIP Double</td>
                                <td width="10%">2</td>
                                <td width="30%">5000</td>
                                <td width="20%">2</td>
                            </tr>
                            <tr>
                                <td width="40%">VIP Family</td>
                                <td width="10%">3</td>
                                <td width="30%">5500</td>
                                <td width="20%">4</td>
                            </tr>

                        </table>
                    </div>

                    <div class="col-lg-5 align-self-center">
                        <div class="cabin-details">
                            <div class="row">
                                <div class="col">
                                    <form>
                                        <label>Cabin type</label>
                                        <select class="wide" name="" id="">
                                            <option value="">Select Cabin</option>
                                            <option value="">VIP</option>
                                            <option value="">Semi VIP</option>
                                            <option value="">Normal</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col">
                                    <form>
                                        <label>Cabin type</label>
                                        <select name="" id="">
                                            <option value="">Select Cabin</option>
                                            <option value="">VIP</option>
                                            <option value="">Semi VIP</option>
                                            <option value="">Normal</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form>
                                        <label for="cabin-type">Boarding Point*</label>
                                        <select class="wide">
                                            <option selected>Boarding Point</option>
                                            <option value="1">Sadarghat</option>
                                            <option value="2">Others</option>

                                        </select>
                                    </form>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col">
                                <div style="background-color:#ddd;text-align: center;width: auto; height: 60px;padding: 15px; font-weight:700; font-size:24px;">
                                    ৳1000
                                </div>
                                </div>
                                <br>
                                <div class="col">
                                <a href="#" type="submit" class="search-button btn transition-effect">Continue
                                                        </a>
                                </div>

                            </div>
                            <br>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php include('footer.php'); ?>
