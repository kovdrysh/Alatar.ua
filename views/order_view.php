<div class="container" style="margin-top: 40px;">
    <div class="page">
    <div class="row">
            <div class="col-md-8">
                <h3>Ваше замовлення</h3>
                
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Ім'я:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Телефон:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block" id = "tel-hide"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Інформація для замовлення:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary style-order-button" onmousedown="keyDown(this)" onclick="sendOrder(this)">Відправити</button>
                
            </div>
    </div>


<style>
    #success{
        color:red;
        margin-bottom: 10px;
    }
</style>