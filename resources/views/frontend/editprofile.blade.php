<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" type="text/css" href="test.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Edit your profile</h2>

        <div class="avatar col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <img src="img/user.png" style="margin-top: 45px" class="center-block">
            <button type="submit" id="btnsubmit" onclick="validate()" class="center-block btn btn-default" style="margin-top: 15px">Change</button>
        </div>

        <div class="info col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <form name='my-form' method="post" style="margin-top: 40px">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="name">Display name<span class="req">*</span></p></label>
                        <input type="text" id='name' class="form-control" />
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="name">First name<span class="req">*</span></p></label>
                        <input type="text" id='name' class="form-control" />
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="name">Last name<span class="req">*</span></p></label>
                        <input type="text" id='name' class="form-control" />
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="city">City</label>
                        <input type="text" id='name' class="form-control" />
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="country">Country</label>
                        <input type="text" id='name' class="form-control" />
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label for="address">Day</label>
                        <select name="address" id="address" class="form-control">
                        <option value="Day">--</option>
                        <option value="bd01">01</option>
                        <option value="bd02">02</option>
                        <option value="bd03">03</option>
                        <option value="bd04">04</option>
                        <option value="bd05">05</option>
                        <option value="bd06">06</option>
                        <option value="bd07">07</option>
                        <option value="bd08">08</option>
                        <option value="bd09">09</option>
                        <option value="bd10">10</option>
                        <option value="bd11">11</option>
                        <option value="bd12">12</option>
                        <option value="bd13">13</option>
                        <option value="bd14">14</option>
                        <option value="bd15">15</option>
                        <option value="bd16">16</option>
                        <option value="bd17">17</option>
                        <option value="bd18">18</option>
                        <option value="bd19">19</option>
                        <option value="bd20">20</option>
                        <option value="bd21">21</option>
                        <option value="bd22">22</option>
                        <option value="bd23">23</option>
                        <option value="bd24">24</option>
                        <option value="bd25">25</option>
                        <option value="bd26">26</option>
                        <option value="bd27">27</option>
                        <option value="bd28">28</option>
                        <option value="bd29">29</option>
                        <option value="bd30">30</option>
                        <option value="bd31">31</option>
                    </select>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label for="address">Month</label>
                        <select name="address" id="address" class="form-control">
                        <option value="Month">--</option>
                        <option value="m01">January</option>
                        <option value="m02">Febuary</option>
                        <option value="m03">March</option>
                        <option value="m04">April</option>
                        <option value="m05">May</option>
                        <option value="m06">June</option>
                        <option value="m07">July</option>
                        <option value="m08">August</option>
                        <option value="m09">September</option>
                        <option value="m10">October</option>
                        <option value="m11">November</option>
                        <option value="m12">December</option>
                    </select>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label for="name">Year</label>
                        <input type="text" id='name' class="form-control" />
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <button type="submit" id="btnsubmit" onclick="validate()" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        
    </div>
    <!-- <script src="./test.js"></script> -->
</body>

</html>