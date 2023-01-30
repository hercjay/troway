


<br/>


<div class="row">

    <div class="row col-10">
        <h2><strong>Pay ASWAMA Levy</strong></h2>
    </div>

    <div class="row m-1 shadowCard d-flex justify-content-center" style="padding-bottom: 90px;">
        <div class="row col-10 justify-content-center p-4">
            <h4>Prompt payment of your Waste Levy is important!</h4>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-10">
                <img src="images/pay2.svg" class="img-fluid mb-4 p-4">
            </div>
            <div class="col-lg-6 col-sm-10 p-4 d-flex justify-content-center" >
                <div class="col-lg-12 col-sm-12 my-auto">

                    <div id="register_selection_alert" class="alert alert-success">
                        
                    </div>

                    <h4>Total Bill:  <strong id="levy_total_bill">0.0</strong> naira</h4> <br/>

                    <div class="form-group" id="num_of_months">
                        <label for="num_of_months">Number of Months:</label>
                        <select  id="num_of_months" type="num_of_months" class="form-control " name="num_of_months">
                            <option value=""><----Select a Value----></option>
                            <option value="1">1 month</option>
                            <option value="2">2 months</option>
                            <option value="3">3 months</option>
                            <option value="4">4 months</option>
                            <option value="5">5 months</option>
                            <option value="6">6 months</option>
                            <option value="7">7 months</option>
                            <option value="8">8 months</option>
                            <option value="9">9 months</option>
                            <option value="10">10 months</option>
                            <option value="11">11 months</option>
                            <option value="12">12 months (1 year)</option>
                            <option value="24">24 months (2 years)</option>
                            <option value="48">48 months (4 years)</option>
                        </select>
                    </div>

                    <div class="form-group" id="levy_payment_type">
                        <label for="levy_payment_type">How would you like to pay?:</label>
                        <select  id="levy_payment_type" type="levy_payment_type" class="form-control " name="levy_payment_type">
                            <option value=""><----Select a Value----></option>
                            <option value="paystack">Pay with Paystack</option>
                            <option value="card">Card Payment</option>
                            <option value="points">Use your ASWAMA Points</option>
                            <option value="transfer">Direct Bank Transfer</option>
                        </select>
                    </div>

                    
                    <a href="./pay-success" class="btn myBtn text-light" id="levy_checkout_btn">Checkout</a>
                    

                    
                    <div id="loader_div" style="display: none; text-align: center;">
                        <img style="width: 50px; height: 50px; " src="images/loader.gif" >
                    </div>



                </div>
            </div>
        </div>
    </div>

    



</div> <br/><br/>