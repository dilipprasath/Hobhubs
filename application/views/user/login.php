<div class="container">
  <div class="row">
    <div class="lp-login-box margin-t20">
      <h4>Login</h4>
      <?php  echo validation_errors() ?>
      <form accept-charset="UTF-8" role="form"  method="post">
        <fieldset>
          <div class="form-group">
            <input class="form-control lp-input-text" placeholder="Email / Username" name="username" type="text">
          </div>
          <div class="form-group">
            <input class="form-control lp-input-text" placeholder="Password" name="password" type="password" value="">
          </div>
          <div class=""> <a href="<?php echo base_url('user/account_recovery') ?>">Can't access your account?</a> </div>
          <div class="checkbox margin-t20">
            <label>
              <input name="PersistentCookie" type="checkbox" value="yes" checked="checked">
              keep me logged in </label>
          </div>
          <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
        </fieldset>
      </form>
      <h4 class="margin-t30">Sign Up</h4>
      <img src="<?php echo asset_url('img/fb-tw-logo.jpg') ?>" width="250" height="37" border="0" usemap="#Map" class="fb_tw_logo">
      <map name="Map">
        <area shape="rect" coords="1,3,128,40" href="<?php echo base_url('user/facebook_request'); ?>" target="_blank" alt="Facebook Sign Up">
        <area shape="rect" coords="130,2,253,38" href="<?php echo base_url('user/google_request'); ?>" alt="Twitter Sign Up">
      </map>
      <div><br>
        <button class="btn btn-primary btn-lg btn-signup-email margin-t20 center-block" data-toggle="modal" data-target="#myModal"> Sign Up With Email </button>
        <!-- Popup -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Sign up with Email</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="<?php echo base_url('user/auth') ?>" method="post" accept-charset="utf-8" class="form" role="form">
                      <div class="row">
                        <div class="col-xs-6 col-md-6">
                          <input type="text" name="firstname" value="" class="form-control input-sm lp-input-text" placeholder="First Name" required />
                        </div>
                        <div class="col-xs-6 col-md-6">
                          <input type="text" name="lastname" value="" class="form-control input-sm lp-input-text " placeholder="Last Name" required />
                        </div>
                      </div>
                      <input type="email" name="email" value="" class="form-control input-sm lp-input-text margin-t10" placeholder="Your Email" required />
                      <input type="password" name="password" value="" class="form-control input-sm lp-input-text margin-t10" placeholder="Password" required />
                      <input type="password" name="passconf" value="" class="form-control input-sm margin-t10 lp-input-text" placeholder="Confirm Password" required />
                      <label class="margin-t10">Birthday</label>
                      <div class="row margin-t10">
                        <div class="col-xs-4 col-md-4">
                          <select name="birthday_month" class ="form-control input-sm" required>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                          </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                          <select name="birthday_day" class = "form-control input-sm" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                          </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                          <select name="birthday_year" class = "form-control input-sm" required>
                            <option value="1935">1935</option>
                            <option value="1936">1936</option>
                            <option value="1937">1937</option>
                            <option value="1938">1938</option>
                            <option value="1939">1939</option>
                            <option value="1940">1940</option>
                            <option value="1941">1941</option>
                            <option value="1942">1942</option>
                            <option value="1943">1943</option>
                            <option value="1944">1944</option>
                            <option value="1945">1945</option>
                            <option value="1946">1946</option>
                            <option value="1947">1947</option>
                            <option value="1948">1948</option>
                            <option value="1949">1949</option>
                            <option value="1950">1950</option>
                            <option value="1951">1951</option>
                            <option value="1952">1952</option>
                            <option value="1953">1953</option>
                            <option value="1954">1954</option>
                            <option value="1955">1955</option>
                            <option value="1956">1956</option>
                            <option value="1957">1957</option>
                            <option value="1958">1958</option>
                            <option value="1959">1959</option>
                            <option value="1960">1960</option>
                            <option value="1961">1961</option>
                            <option value="1962">1962</option>
                            <option value="1963">1963</option>
                            <option value="1964">1964</option>
                            <option value="1965">1965</option>
                            <option value="1966">1966</option>
                            <option value="1967">1967</option>
                            <option value="1968">1968</option>
                            <option value="1969">1969</option>
                            <option value="1970">1970</option>
                            <option value="1971">1971</option>
                            <option value="1972">1972</option>
                            <option value="1973">1973</option>
                            <option value="1974">1974</option>
                            <option value="1975">1975</option>
                            <option value="1976">1976</option>
                            <option value="1977">1977</option>
                            <option value="1978">1978</option>
                            <option value="1979">1979</option>
                            <option value="1980">1980</option>
                            <option value="1981">1981</option>
                            <option value="1982">1982</option>
                            <option value="1983">1983</option>
                            <option value="1984">1984</option>
                            <option value="1985">1985</option>
                            <option value="1986">1986</option>
                            <option value="1987">1987</option>
                            <option value="1988">1988</option>
                            <option value="1989">1989</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                          </select>
                        </div>
                      </div>
                      <label class="margin-t10">Gender : </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="1" id=male  required/>
                        Male </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="2" id=female required />
                        Female </label>
                      <br />
                      <div class="row margin-t10">                      
                      <button type="button" class="btn btn-primary col-lg-5 margin-l20" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary col-lg-5 margin-l20">Signin</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class=""> </div>
          </div>
        </div>
      </div>
      <!-- Popup --> 
    </div>
  </div>
</div>