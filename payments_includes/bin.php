


<br/>


<div class="row">

    <div class="row col-10">
        <h2><strong>Purchase a Bin</strong></h2>
    </div>

    <div class="row m-1 shadowCard d-flex justify-content-center" style="padding-bottom: 90px;">
        <div class="row col-10 justify-content-center p-4">
            <h4>Utilizing a proper waste bin is important!</h4>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-10">
                <img src="images/bin2.svg" class="img-fluid mb-4 p-4">
            </div>
            <div class="col-lg-6 col-sm-10 p-4 d-flex justify-content-center" >
                <div class="col-lg-12 col-sm-12 my-auto">

                    <div id="register_selection_alert" class="alert alert-success">
                        
                    </div>

                    <h4>Total Bill:  <strong id="total_bill">0.0</strong> naira</h4> <br/>

                    <div class="form-group" id="num_of_bins">
                        <label for="num_of_bins">Number of Bins:</label>
                        <select  id="num_of_bins" type="num_of_bins" class="form-control " name="num_of_bins">
                            <option value=""><----Select a Value----></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    <div class="form-group" id="payment_type">
                        <label for="payment_type">How would you like to pay?:</label>
                        <select  id="payment_type" type="payment_type" class="form-control " name="payment_type">
                            <option value=""><----Select a Value----></option>
                            <option value="paystack">Pay with Paystack</option>
                            <option value="card">Card Payment</option>
                            <option value="points">Use your ASWAMA Points</option>
                            <option value="transfer">Direct Bank Transfer</option>
                        </select>
                    </div>

                    
                    <a href="./pay-success" class="btn myBtn text-light" id="checkout_btn">Checkout</a>
                    

                    
                    <div id="loader_div" style="display: none; text-align: center;">
                        <img style="width: 50px; height: 50px; " src="images/loader.gif" >
                    </div>



                </div>
            </div>
        </div>
    </div>

    



</div> <br/><br/>